@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Tambah Barang</h3>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('admin.barang.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Barang </label>
                        <input type="text" name="nama" class="form-control" value="{{old('nama_barang')}}">
                    </div>
                    <div class="form-group">
                        <label for="harga_sewa">Harga Sewa </label>
                        <input type="text" name="harga_sewa" class="form-control" value="{{old('harga_sewa')}}">
                    </div>
                    <div class="form-group">
                        <label for="harga_sewa"> Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value=" tersedia">Tersedia</option>
                            <option value="Tidak tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi </label>
                        <textarea name="deskripsi" id="deslripsi" col="30" rows="5" class="form-control">{{old('deskripsi')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file"class="form-control" name="gambar">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Simpan</button>
                    </div>
                </form>
@endsection