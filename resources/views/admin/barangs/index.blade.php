@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Barang</h3>
            <a href="{{ route('admin.barang.create')}}" class="btn btn-primary">Tambah Data        </a>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Gambar</th>
                            <th>Harga Sewa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama }}</td>
                            <td>
                                <img src="{{ Storage::url($barang->gambar) }}" width="200">
                            </td>
                            <td>{{$barang->harga_sewa}}</td>
                            <td>{{$barang->status}}</td>
                            <td>
                                <a href="{{ route('admin.barang.edit',$barang->id) }}" class="btn btn-sm btn-warning">edit</a>
                                <form oncLick="return confirm('anda yakin data dihapus?');" class="d-inline" action="{{ route('admin.barang.destroy', $barang->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                            @empty
                        <tr>
                            <td colspan="6" class="text-center">data kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>


@endsection
                    