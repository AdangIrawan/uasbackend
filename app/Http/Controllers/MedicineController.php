<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Purchase;

class MedicineController extends Controller
{
    // Public method to display medicines
    public function publicIndex()
    {
        $medicines = Medicine::all();
        return view('medicine', compact('medicines'));
    }

    // Admin panel to manage medicines
    public function adminIndex()
    {
        $medicines = Medicine::all();
        return view('admin.medicines', compact('medicines'));
    }

    // Store new medicine
    // Store new medicine
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required|integer',
        'price' => 'required|numeric|min:0.01',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Konversi format ribuan/ratusan ke float sebelum menyimpan
    $price = str_replace('.', '', $request->input('price'));  // Hilangkan titik (ribuan)
    $price = str_replace(',', '.', $price);  // Ganti koma dengan titik (untuk pecahan)

    $imageName = null;

    // Proses upload gambar
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    $medicine = new Medicine();
    $medicine->name = $request->input('name');
    $medicine->description = $request->input('description');
    $medicine->stock = $request->input('stock');
    $medicine->price = (float) $price;  // Simpan sebagai float
    $medicine->image = $imageName;

    $medicine->save();

    return redirect()->route('admin.medicines')->with('success', 'Obat berhasil ditambahkan');
}

// Update medicine
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'stock' => 'required|integer',
        'price' => 'required|numeric|min:0.01',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Konversi format ribuan/ratusan ke float sebelum menyimpan
    $price = str_replace('.', '', $request->input('price'));  // Hilangkan titik (ribuan)
    $price = str_replace(',', '.', $price);  // Ganti koma dengan titik (untuk pecahan)

    $medicine = Medicine::findOrFail($id);
    $medicine->name = $request->input('name');
    $medicine->description = $request->input('description');
    $medicine->stock = $request->input('stock');
    $medicine->price = (float) $price;  // Simpan sebagai float

    if ($request->hasFile('image')) {
        if ($medicine->image) {
            $imagePath = public_path('images/' . $medicine->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $medicine->image = $imageName;
    }

    $medicine->save();

    return redirect()->route('admin.medicines')->with('success', 'Obat berhasil di-update');
}

public function buyMedicine(Request $request)
{
    $request->validate([
        'medicineId' => 'required|exists:medicines,id',
        'buyerName' => 'required',
        'buyerPhone' => 'required',
        'buyerAddress' => 'required',
        'quantity' => 'required|integer|min:1',
    ]);

    $medicine = Medicine::findOrFail($request->input('medicineId'));

    // Hitung total harga
    $totalPrice = $medicine->price * $request->input('quantity');

    // Validasi stok cukup
    if ($medicine->stock < $request->input('quantity')) {
        return response()->json(['error' => 'Stok tidak mencukupi.'], 400);
    }

    // Proses pembelian
    $medicine->stock -= $request->input('quantity');
    $medicine->save();

    $purchase = new Purchase();
    $purchase->medicine_id = $medicine->id;
    $purchase->buyer_name = $request->input('buyerName');
    $purchase->buyer_phone = $request->input('buyerPhone');
    $purchase->buyer_address = $request->input('buyerAddress');
    $purchase->quantity = $request->input('quantity');
    $purchase->total_price = $totalPrice;
    $purchase->save();

    // Return response sukses
    return response()->json(['message' => 'Pembelian berhasil.', 'totalPrice' => $totalPrice]);
}



    // Delete medicine
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        if ($medicine->image) {
            $imagePath = public_path('images/' . $medicine->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $medicine->delete();

        return redirect()->route('admin.medicines')->with('success', 'Obat berhasil dihapus');
    }
}

