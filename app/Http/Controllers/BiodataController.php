<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        return view('biodata.index', ['data' => Biodata::latest()->get()]);
    }

    public function create()
    {
        return view('biodata.form', ['biodata' => new Biodata]);
    }

    public function store(Request $r)
    {
        $d = $this->validasi($r);
        if ($r->hasFile('foto')) {
            $d['foto'] = $r->file('foto')->store('foto', 'public');
        }
        $b = Biodata::create($d);
        Aktivitas::create(['aksi' => 'Tambah', 'keterangan' => 'Menambah biodata ' . $b->nama]);
        return redirect()->route('biodata.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Biodata $biodata)
    {
        return view('biodata.show', compact('biodata'));
    }

    public function edit(Biodata $biodata)
    {
        return view('biodata.form', compact('biodata'));
    }

    public function update(Request $r, Biodata $biodata)
    {
        $d = $this->validasi($r);
        if ($r->hasFile('foto')) {
            if ($biodata->foto) Storage::disk('public')->delete($biodata->foto);
            $d['foto'] = $r->file('foto')->store('foto', 'public');
        }
        $biodata->update($d);
        Aktivitas::create(['aksi' => 'Ubah', 'keterangan' => 'Mengubah biodata ' . $biodata->nama]);
        return redirect()->route('biodata.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Biodata $biodata)
    {
        if ($biodata->foto) Storage::disk('public')->delete($biodata->foto);
        Aktivitas::create(['aksi' => 'Hapus', 'keterangan' => 'Menghapus biodata ' . $biodata->nama]);
        $biodata->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function cv(Biodata $biodata)
    {
        $biodata->load('riwayat');
        Aktivitas::create(['aksi' => 'Lihat', 'keterangan' => 'Melihat CV ' . $biodata->nama]);
        return view('biodata.cv', compact('biodata'));
    }

    private function validasi(Request $r)
    {
        return $r->validate([
            'nama' => 'required',
            'profesi' => 'nullable',
            'profil' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable',
            'agama' => 'nullable',
            'kewarganegaraan' => 'nullable',
            'telepon' => 'nullable',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
            'skills' => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ]);
    }
}
