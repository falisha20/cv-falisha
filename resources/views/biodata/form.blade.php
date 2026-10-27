@extends('layouts.app')
@section('content')
<div class="card p-4">
<h4>{{ $biodata->exists ? 'Edit' : 'Tambah' }} Biodata</h4>
<form method="POST" enctype="multipart/form-data"
  action="{{ $biodata->exists ? route('biodata.update', $biodata) : route('biodata.store') }}">
  @csrf
  @if($biodata->exists) @method('PUT') @endif
  <div class="row">
  @foreach([
    'nama'=>'Nama','profesi'=>'Profesi','tempat_lahir'=>'Tempat Lahir','tanggal_lahir'=>'Tanggal Lahir',
    'agama'=>'Agama','kewarganegaraan'=>'Kewarganegaraan',
    'telepon'=>'Telepon','email'=>'Email','alamat'=>'Alamat','skills'=>'Skills (pisah koma)'
  ] as $f => $label)
    <div class="col-md-6 mb-3">
      <label class="form-label">{{ $label }}</label>
      <input type="{{ $f=='tanggal_lahir' ? 'date' : 'text' }}" name="{{ $f }}" class="form-control"
        value="{{ old($f, $biodata->$f) }}">
    </div>
  @endforeach

  <div class="col-md-6 mb-3">
    <label class="form-label d-block">Jenis Kelamin</label>
    @foreach(['Perempuan', 'Laki-laki'] as $jk)
      <input type="radio" class="btn-check" name="jenis_kelamin" id="jk{{ $loop->index }}" value="{{ $jk }}"
        {{ old('jenis_kelamin', $biodata->jenis_kelamin) == $jk ? 'checked' : '' }}>
      <label class="btn btn-outline-primary rounded-pill px-4 me-1" for="jk{{ $loop->index }}">{{ $jk }}</label>
    @endforeach
  </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Profil Singkat</label>
    <textarea name="profil" rows="4" class="form-control">{{ old('profil', $biodata->profil) }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Foto Profil</label>
    <input type="file" name="foto" class="form-control">
    @if($biodata->foto)
      <img src="{{ asset('storage/'.$biodata->foto) }}" width="100" class="mt-2 rounded">
    @endif
  </div>
  <button class="btn btn-primary">Simpan</button>
  <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div>
@endsection
