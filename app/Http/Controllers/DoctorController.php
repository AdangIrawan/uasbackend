<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    // Public method to display doctors
    public function publicIndex()
    {
        $doctors = Doctor::all();
        return view('doctor', compact('doctors'));
    }

    // Admin panel to manage doctors
    public function adminIndex()
    {
        $doctors = Doctor::all();
        return view('admin.doctors', compact('doctors'));
    }

    // Store new doctor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'specialization' => 'required',
            'address' => 'required',
            'working_hours' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->specialization = $request->input('specialization');
        $doctor->address = $request->input('address');
        $doctor->working_hours = $request->input('working_hours');
        $doctor->image = $imageName; // Simpan nama file gambar ke dalam field image

        $doctor->save();

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil ditambahkan');
    }

    // Update dokter
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'specialization' => 'required',
            'address' => 'required',
            'working_hours' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->specialization = $request->input('specialization');
        $doctor->address = $request->input('address');
        $doctor->working_hours = $request->input('working_hours');


        if ($request->hasFile('image')) {
            // Delete existing image file if exists
            if ($doctor->image) {
                $imagePath = public_path('images/' . $doctor->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Upload new image
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil di-update');
    }

    // Delete doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctors')->with('success', 'Dokter berhasil dihapus');
    }
}
