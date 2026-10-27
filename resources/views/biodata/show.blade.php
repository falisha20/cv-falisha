@extends('layouts.app')
@section('content')
<div class="hero">
  <h4 class="mb-0">Riwayat: {{ $biodata->nama }}</h4>
</div>
<form method="POST" action="{{ route('riwayat.store', $biodata) }}" class="card p-3 mb-3">
  @csrf
  <div class="row g-2">
    <div class="col-md-2">
      <select name="jenis" class="form-select">
        <option value="pendidikan">Pendidikan</option>
        <option value="pekerjaan">Pekerjaan</option>
        <option value="magang">Magang</option>
      </select>
    </div>
    <div class="col-md-3"><input name="instansi" class="form-control" placeholder="Instansi"></div>
    <div class="col-md-2"><input name="lokasi" class="form-control" placeholder="Lokasi"></div>
    <div class="col-md-2"><input name="periode" class="form-control" placeholder="2018-2022"></div>
    <div class="col-md-3"><input name="deskripsi" class="form-control" placeholder="Deskripsi"></div>
  </div>
  <button class="btn btn-primary mt-2">Tambah</button>
</form>
<div class="card p-3 mb-3">
<table class="table align-middle mb-0">
  <thead><tr><th>Jenis</th><th>Instansi</th><th>Lokasi</th><th>Periode</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
  <tbody>
  @foreach($biodata->riwayat as $r)
  <tr>
    <td><span class="badge-jenis">{{ $r->jenis }}</span></td>
    <td>{{ $r->instansi }}</td>
    <td>{{ $r->lokasi }}</td>
    <td>{{ $r->periode }}</td>
    <td>{{ $r->deskripsi }}</td>
    <td class="d-flex gap-1">
      <a href="{{ route('riwayat.edit', $r) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
      <form method="POST" action="{{ route('riwayat.destroy', $r) }}" onsubmit="return confirm('Hapus?')">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
<a href="{{ route('biodata.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
