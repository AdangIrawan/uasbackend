<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenaga Medis</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" id="search" class="form-control" placeholder="Tenaga Medis...">
            </div>
            <div class="col-md-6 mb-3">
                <select id="filter" class="form-control">
                    <option value="">Semua Spesialisasi</option>
                    <option value="Dokter Umum">Dokter Umum</option>
                    <option value="Atlm">Atlm</option>
                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                    <option value="Kesehatan Lingkungan">Kesehatan Lingkungan</option>
                    <option value="Farmasi">Farmasi</option>
                </select>
            </div>
        </div>

        <div class="row" id="doctor-list">
            @foreach($doctors as $doctor)
                <div class="col-md-4 doctor-item" data-specialization="{{ $doctor->specialization }}">
                    <div class="doctor-card">
                        @if ($doctor->image)
                            <img src="{{ asset('images/' . $doctor->image) }}" alt="{{ $doctor->name }}">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="Default Image">
                        @endif
                        <h3>{{ $doctor->name }}</h3>
                        <p><strong>Email:</strong> {{ $doctor->email }}</p>
                        <p><strong>Spesialisasi:</strong> {{ $doctor->specialization }}</p>
                        <p><strong>Jam Kerja:</strong> {{ $doctor->working_hours }}</p>
                        <p><strong>Alamat:</strong> {{ $doctor->address }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var doctors = @json($doctors);

            function displayDoctors(doctorsToShow) {
                var doctorList = $('#doctor-list');
                doctorList.empty();

                doctorsToShow.forEach(function(doctor) {
                    var card = `
                        <div class="col-md-4 doctor-item" data-specialization="${doctor.specialization}">
                            <div class="doctor-card">
                                <img src="${doctor.image ? '{{ asset('images/') }}/' + doctor.image : '{{ asset('images/default.jpg') }}'}" alt="${doctor.name}">
                                <h3>${doctor.name}</h3>
                                <p><strong>Email:</strong> ${doctor.email}</p>
                                <p><strong>Spesialisasi:</strong> ${doctor.specialization}</p>
                                <p><strong>Jam Kerja:</strong> ${doctor.working_hours}</p>
                                <p><strong>Alamat:</strong> ${doctor.address}</p>
                            </div>
                        </div>
                    `;
                    doctorList.append(card);
                });
            }

            displayDoctors(doctors);

            $('#search').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                var selectedSpecialization = $('#filter').val().toLowerCase();

                var filteredDoctors = doctors.filter(function(doctor) {
                    var nameMatch = doctor.name.toLowerCase().indexOf(searchTerm) !== -1;
                    var specializationMatch = selectedSpecialization === '' || doctor.specialization.toLowerCase() === selectedSpecialization;
                    return nameMatch && specializationMatch;
                });

                displayDoctors(filteredDoctors);
            });

            $('#filter').on('change', function() {
                var searchTerm = $('#search').val().toLowerCase();
                var selectedSpecialization = $(this).val().toLowerCase();

                var filteredDoctors = doctors.filter(function(doctor) {
                    var nameMatch = doctor.name.toLowerCase().indexOf(searchTerm) !== -1;
                    var specializationMatch = selectedSpecialization === '' || doctor.specialization.toLowerCase() === selectedSpecialization;
                    return nameMatch && specializationMatch;
                });

                displayDoctors(filteredDoctors);
            });
        });
    </script>
</body>
</html>
