@extends('template')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>INPUT DATA SISWA</h2>
            </div>
            <div class="float-end">
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Melihat Tabel</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Yahhh</strong> Data Siswa Tidak Terinput<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <form action="{{ route('siswa.store') }}" method="post">
        @csrf

        <div class="row col-5">
            <div class="mb-3">
                <strong>NIS</strong>
                <input type="number" name="NIS" class="form-control" placeholder="Masukkan NIS Anda (Tidak Boleh Diawali 0) ">
            </div>
            <div class="mb-3">
                <strong>Nama</strong>
                <input type="text" name="Nama" class="form-control" placeholder="Masukkan Nama Anda">
            </div>
            <div class="mb-3">
                <strong>Kelas</strong>
                <div class="form-floating">
                    <select class="form-select"  name="Kelas" id="floatingSelect" aria-label="Default select example">
                      <option value="XII RPL 1">XII RPL 1</option>
                      <option value="XII RPL 2">XII RPL 2</option>
                      <option value="XII TKJ 1">XII TKJ 1</option>
                      <option value="XII TKJ 2">XII TKJ 2</option>
                    </select>
                    <label for="floatingSelect">Pilih Sesuai Dengan Kelas Anda</label>
                </div>
            </div>
            <div class="mb-3">
                <strong>No.HP</strong>
                <input type="number" name="no_hp" class="form-control" placeholder="Masukkan No.HP Anda">
            </div>
            <div class="mb-3">
                <strong>Keterangan</strong>
                <div class="form-floating">
                <select class="form-select" name="keterangan" id="floatingSelect" aria-label="Default select example">
                    <option value="Melanjutkan">Melanjutkan</option>
                    <option value="Bekerja">Bekerja</option>
                </select>
                <label for="floatingSelect">Pilih Sesuain Dengan Keterangan Anda</label>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>

        </form>
    </div>
    
@endsection