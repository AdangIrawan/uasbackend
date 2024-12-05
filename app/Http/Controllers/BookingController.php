<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Doctor;

class BookingController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all(); // Ambil semua data dokter
        return view('booking', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'tenaga_kerja' => 'required|string|max:50',
        ]);

        $selectedDate = $request->date;
        $today = date('Y-m-d');

        // Cek apakah tanggal yang dipilih adalah hari ini atau sebelumnya
        if ($selectedDate <= $today) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Tanggal booking tidak valid. Anda tidak dapat memilih hari ini atau hari sebelumnya.');
        }

        // Cek jumlah booking pada tanggal tertentu
        $bookingCount = Booking::where('date', $request->date)->count();

        if ($bookingCount >= 5) {
            return redirect()->back()->with('error', 'Jumlah booking untuk tanggal tersebut sudah penuh. Silakan pilih tanggal lain.');
        }

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'tenaga_kerja' => $request->tenaga_kerja,
        ]);

        return redirect()->back()->with('success', 'Booking berhasil!');
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }
    
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus');
    }
}
