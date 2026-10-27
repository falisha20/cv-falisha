<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    private function rules()
    {
        return [
            'jenis' => 'required|in:pendidikan,pekerjaan,magang',
            'instansi' => 'required',
            'lokasi' => 'nullable',
            'periode' => 'nullable',
            'deskripsi' => 'nullable',
        ];
    }

    public function store(Request $r, Biodata $biodata)
    {
        $biodata->riwayat()->create($r->validate($this->rules()));
        return back()->with('success', 'Riwayat ditambah');
    }

    public function edit(Riwayat $riwayat)
    {
        return view('biodata.riwayat_edit', compact('riwayat'));
    }

    public function update(Request $r, Riwayat $riwayat)
    {
        $riwayat->update($r->validate($this->rules()));
        return redirect()->route('biodata.show', $riwayat->biodata_id)
            ->with('success', 'Riwayat diubah');
    }

    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        return back()->with('success', 'Riwayat dihapus');
    }
}
