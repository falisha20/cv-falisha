@extends('layouts.app')
@section('content')
<div class="card p-4">
<h4>Edit Riwayat</h4>
<form method="POST" action="{{ route('riwayat.update', $riwayat) }}">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label">Jenis</label>
      <select name="jenis" class="form-select">
        @foreach(['pendidikan','pekerjaan','magang'] as $j)
          <option value="{{ $j }}" {{ old('jenis', $riwayat->jenis) == $j ? 'selected' : '' }}>{{ ucfirst($j) }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-8">
      <label class="form-label">Instansi</label>
      <input name="instansi" class="form-control" value="{{ old('instansi', $riwayat->instansi) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Lokasi</label>
      <input name="lokasi" class="form-control" value="{{ old('lokasi', $riwayat->lokasi) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Periode</label>
      <input name="periode" class="form-control" value="{{ old('periode', $riwayat->periode) }}">
    </div>
    <div class="col-12">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $riwayat->deskripsi) }}</textarea>
    </div>
  </div>
  <div class="mt-3">
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('biodata.show', $riwayat->biodata_id) }}" class="btn btn-secondary">Batal</a>
  </div>
</form>
</div>
@endsection
