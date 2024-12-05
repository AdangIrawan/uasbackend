<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
    <link rel="stylesheet" href="{{ asset('css/medicine.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
   
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" id="search" class="form-control" placeholder="Search by name...">
            </div>
            <div class="col-md-6">
                <select id="sort" class="form-control">
                    <option value="a-z">Sort by name: A-Z</option>
                    <option value="z-a">Sort by name: Z-A</option>
                    <option value="low-high">Sort by price: Low to High</option>
                    <option value="high-low">Sort by price: High to Low</option>
                </select>
            </div>
        </div>

       
        <div class="row" id="medicine-list">
            @foreach($medicines as $medicine)
                <div class="col-md-4 medicine-item" data-name="{{ $medicine->name }}" data-price="{{ $medicine->price }}">
                    <div class="medicine-card">
                        @if ($medicine->image)
                            <img src="{{ asset('images/' . $medicine->image) }}" alt="{{ $medicine->name }}">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default Image">
                        @endif
                        <h3>{{ $medicine->name }}</h3>
                        <p><strong>Deskripsi:</strong> {{ $medicine->description }}</p>
                        <p><strong>Stock:</strong> {{ $medicine->stock }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($medicine->price, 0, ',', '.') }}</p>
                        <button class="btn btn-primary buy-btn" data-medicine-id="{{ $medicine->id }}" data-price="{{ $medicine->price }}">Buy</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Form Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="buyForm">
                        @csrf 
                        <div class="form-group">
                            <label for="buyerName">Nama</label>
                            <input type="text" class="form-control" id="buyerName" name="buyerName" required>
                        </div>
                        <div class="form-group">
                            <label for="buyerPhone">No HP</label>
                            <input type="text" class="form-control" id="buyerPhone" name="buyerPhone" required>
                        </div>
                        <div class="form-group">
                            <label for="buyerAddress">Alamat</label>
                            <textarea class="form-control" id="buyerAddress" name="buyerAddress" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Obat</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="totalPrice">Total Harga</label>
                            <input type="text" class="form-control" id="totalPrice" name="totalPrice" readonly>
                        </div>
                        <input type="hidden" id="medicineId" name="medicineId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="buySubmit">Buy</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        function attachBuyEvent() {
            
            $('.buy-btn').off('click').on('click', function() {
                var medicineId = $(this).data('medicine-id');
                var price = $(this).data('price');
                $('#medicineId').val(medicineId);
                $('#buyModal').modal('show');

                $('#quantity').off('input').on('input', function() {
                    var quantity = $(this).val();
                    var totalPrice = quantity * price;
                    $('#totalPrice').val('Rp ' + totalPrice.toLocaleString());
                });
            });
        }

        function sortMedicines() {
            var sortValue = localStorage.getItem('sortValue');
            if (sortValue) {
                $('#sort').val(sortValue);
                var $medicines = $('.medicine-item');

                if (sortValue === 'a-z') {
                    $medicines.sort(function(a, b) {
                        return $(a).data('name').localeCompare($(b).data('name'));
                    });
                } else if (sortValue === 'z-a') {
                    $medicines.sort(function(a, b) {
                        return $(b).data('name').localeCompare($(a).data('name'));
                    });
                } else if (sortValue === 'low-high') {
                    $medicines.sort(function(a, b) {
                        return $(a).data('price') - $(b).data('price');
                    });
                } else if (sortValue === 'high-low') {
                    $medicines.sort(function(a, b) {
                        return $(b).data('price') - $(a).data('price');
                    });
                }

                $('#medicine-list').html($medicines);
                attachBuyEvent(); 
            }
        }

        attachBuyEvent();
        sortMedicines();

        
        $('#buySubmit').click(function() {
            var formData = $('#buyForm').serialize();
            $.ajax({
                url: '{{ route('buyMedicine') }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    $('#buyModal').modal('hide');
                    alert('Pembelian berhasil!');
                    location.reload(); 
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat melakukan pembelian.');
                }
            });
        });

        
        $('#search').on('input', function() {
            var searchValue = $(this).val().toLowerCase();
            $('.medicine-item').each(function() {
                var medicineName = $(this).data('name').toLowerCase();
                if (medicineName.includes(searchValue)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        
        $('#sort').change(function() {
            var sortValue = $(this).val();
            localStorage.setItem('sortValue', sortValue); // Save sort state
            var $medicines = $('.medicine-item');

            if (sortValue === 'a-z') {
                $medicines.sort(function(a, b) {
                    return $(a).data('name').localeCompare($(b).data('name'));
                });
            } else if (sortValue === 'z-a') {
                $medicines.sort(function(a, b) {
                    return $(b).data('name').localeCompare($(a).data('name'));
                });
            } else if (sortValue === 'low-high') {
                $medicines.sort(function(a, b) {
                    return $(a).data('price') - $(b).data('price');
                });
            } else if (sortValue === 'high-low') {
                $medicines.sort(function(a, b) {
                    return $(b).data('price') - $(a).data('price');
                });
            }

            $('#medicine-list').html($medicines);
            attachBuyEvent(); 
        });
    });
</script>
</body>
</html>
