@extends('layouts.app')
@section('content')
<div class="hero d-flex justify-content-between align-items-center">
  <div>
    <h4 class="mb-1">Data Biodata</h4>
    <small>Kelola biodata dan buat CV otomatis</small>
  </div>
  <a href="{{ route('biodata.create') }}" class="btn btn-light fw-semibold">
    <i class="bi bi-plus-circle me-1"></i>Tambah
  </a>
</div>

<div class="card p-3">
<div class="table-responsive">
<table class="table align-middle mb-0">
  <thead>
    <tr><th>#</th><th>Foto</th><th>Nama</th><th>Profesi</th><th>Email</th><th>Aksi</th></tr>
  </thead>
  <tbody>
  @forelse($data as $i => $b)
    <tr>
      <td>{{ $i+1 }}</td>
      <td>
        @if($b->foto)
          <img src="{{ asset('storage/'.$b->foto) }}" class="foto-tabel">
        @else
          <i class="bi bi-person-circle fs-1 text-secondary"></i>
        @endif
      </td>
      <td class="fw-semibold">{{ $b->nama }}</td>
      <td><span class="badge-jenis">{{ $b->profesi }}</span></td>
      <td>{{ $b->email }}</td>
      <td>
        <a href="{{ route('biodata.cv', $b) }}" class="btn btn-sm btn-success"><i class="bi bi-file-earmark-person"></i> CV</a>
        <a href="{{ route('biodata.show', $b) }}" class="btn btn-sm btn-info text-white"><i class="bi bi-mortarboard"></i> Pendidikan</a>
        <a href="{{ route('biodata.edit', $b) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
        <form action="{{ route('biodata.destroy', $b) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data</td></tr>
  @endforelse
  </tbody>
</table>
</div>
</div>
@endsection
