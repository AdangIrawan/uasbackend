<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AntrianController extends Controller {
    public function create() {
        $polis = Poli::all();
        return view('antrian', compact('polis'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
            'poli_id' => 'required|exists:polis,id',
        ]);

        $tanggal = Carbon::now()->toDateString();
        $poli_id = $request->poli_id;

        
        $nomor_antrian_terakhir = Antrian::where('poli_id', $poli_id)
            ->where('tanggal', $tanggal)
            ->max('nomor_antrian');

        
        $nomor_antrian = $nomor_antrian_terakhir ? $nomor_antrian_terakhir + 1 : 1;

        
        Antrian::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'poli_id' => $poli_id,
            'tanggal' => $tanggal,
            'nomor_antrian' => $nomor_antrian,
        ]);

        $nama_poli = Poli::find($poli_id)->nama;

        return redirect()->route('antrian.create')->with([
            'success' => 'Antrian berhasil ditambahkan',
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'poli_name' => $nama_poli, 
            'nomor_antrian' => $nomor_antrian
        ]);
    }
    public function index() {
        $antrians = Antrian::with('poli')->get();
        return view('admin.antrians', compact('antrians'));
    }

    
    public function destroy($id) {
        $antrian = Antrian::findOrFail($id);
        $antrian->delete();

        return redirect()->route('admin.antrians')->with('success', 'Antrian berhasil dihapus');
    }
}
