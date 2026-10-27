<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;

class AktivitasController extends Controller
{
    public function index()
    {
        return view('aktivitas.index', ['data' => Aktivitas::latest()->get()]);
    }

    public function destroy(Aktivitas $aktivitas)
    {
        $aktivitas->delete();
        return back()->with('success', 'Riwayat dihapus');
    }

    public function clear()
    {
        Aktivitas::truncate();
        return back()->with('success', 'Semua riwayat dihapus');
    }
}
