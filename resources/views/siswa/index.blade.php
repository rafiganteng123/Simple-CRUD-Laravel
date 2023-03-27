@extends('template')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3>Data Penulusuran Tamatan SMKN 1 Purwokerto</h3>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th class="text-center" width="20px">#</th>
            <th class="text-center" width="280px">NIS</th>
            <th class="text-center" width="280px">Nama</th>
            <th class="text-center" width="280px">Kelas</th>
            <th class="text-center" width="280px">No.HP</th>
            <th class="text-center" width="280px">Keterangan</th>
            <th class="text-center" width="280px">Aksi</th>
        </tr>
        @foreach ($siswas as $siswa)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td>{{ $siswa->NIS }}</td>
                <td>{{ $siswa->Nama }}</td>
                <td>{{ $siswa->Kelas }}</td>
                <td>{{ $siswa->no_hp }}</td>
                <td>{{ $siswa->keterangan }}</td>
                <td class="text-center">
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-success btn-sm">Update</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin, akan menghapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        <div class="float-start">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        <div class="float-end">
            {!! $siswas->links() !!}
        </div>
    
@endsection