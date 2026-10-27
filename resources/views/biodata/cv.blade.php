<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>CV {{ $biodata->nama }}</title>
<style>
  body{font-family:Arial,sans-serif;background:#ddd;margin:0;padding:20px}
  .cv{display:flex;width:800px;margin:auto;background:#fff;min-height:1100px}
  .side{width:260px;background:#1a7fb5;color:#fff;padding:0 20px 20px}
  .side img{width:calc(100% + 40px);margin:0 -20px;height:260px;object-fit:cover}
  .side h3{letter-spacing:3px;border-bottom:1px solid #fff;padding-bottom:6px;margin-top:30px;font-size:15px}
  .side p{font-size:13px;margin:6px 0}
  .main{flex:1;padding:30px}
  .main h1{color:#1a7fb5;font-size:28px;margin:0 0 20px}
  .main h2{color:#1a7fb5;font-size:15px;letter-spacing:2px;border-bottom:2px solid #1a7fb5;padding-bottom:4px;margin-top:22px}
  .item{font-size:13px;margin-bottom:10px}
  .item .top{display:flex;justify-content:space-between;font-weight:bold}
  .skill{font-size:13px;margin:8px 0}
  .bar{background:#6cb5d8;height:5px;border-radius:3px}
  .bar div{background:#fff;height:5px;width:80%;border-radius:3px}
  .print{text-align:center;margin-bottom:10px}
  @media print{.print{display:none}body{background:#fff;padding:0}}
</style>
</head>
<body>
<div class="print">
  <button onclick="window.print()">Cetak / Simpan PDF</button>
  <a href="{{ route('biodata.index') }}">Kembali</a>
</div>
<div class="cv">
  <div class="side">
    @if($biodata->foto)<img src="{{ asset('storage/'.$biodata->foto) }}">@endif
    <h3>DATA PRIBADI</h3>
    <p><b>Tempat/Tanggal Lahir</b><br>{{ $biodata->tempat_lahir }}, {{ $biodata->tanggal_lahir }}</p>
    <p><b>Jenis Kelamin</b><br>{{ $biodata->jenis_kelamin }}</p>
    <p><b>Agama</b><br>{{ $biodata->agama }}</p>
    <p><b>Kewarganegaraan</b><br>{{ $biodata->kewarganegaraan }}</p>
    <h3>KONTAK</h3>
    <p>📞 {{ $biodata->telepon }}</p>
    <p>✉ {{ $biodata->email }}</p>
    <p>📍 {{ $biodata->alamat }}</p>
    <h3>SKILLS</h3>
    @foreach(array_filter(explode(',', $biodata->skills ?? '')) as $s)
      <div class="skill">{{ trim($s) }}<div class="bar"><div></div></div></div>
    @endforeach
  </div>
  <div class="main">
    <h1>{{ $biodata->nama }}</h1>
    <h2>PROFIL</h2>
    <p style="font-size:13px">{{ $biodata->profil }}</p>
    @foreach(['pendidikan'=>'RIWAYAT PENDIDIKAN','pekerjaan'=>'RIWAYAT PEKERJAAN','magang'=>'RIWAYAT MAGANG'] as $j=>$judul)
      @if($biodata->riwayat->where('jenis',$j)->count())
      <h2>{{ $judul }}</h2>
      @foreach($biodata->riwayat->where('jenis',$j) as $r)
        <div class="item">
          <div class="top"><span>{{ $r->instansi }}</span><span>{{ $r->lokasi }}</span></div>
          <div style="text-align:right;font-weight:bold">{{ $r->periode }}</div>
          <div>{{ $r->deskripsi }}</div>
        </div>
      @endforeach
      @endif
    @endforeach
  </div>
</div>
</body>
</html>
