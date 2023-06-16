@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Form Edit Barang</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('admin.barang.update',$barang->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="nama">Nama Barang </label>
                                <input type="text" name="nama" class="form-control" value="{{old('nama_barang', $barang->nama)}}">
                            </div>
                            <div class="form-group">
                                <label for="harga_sewa">Harga Sewa </label>
                                <input type="text" name="harga_sewa" class="form-control" value="{{old('harga_sewa', $barang->harga_sewa)}}">
                            </div>
                            <div class="form-group">
                                <label for="status"> Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option {{ $barang->status == 'tersedia' ? 'selected' : null }} value=" tersedia">Tersedia</option>
                                    <option {{ $barang->status == 'tidak tersedia' ? 'selected' : null }} value="Tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi </label>
                                <textarea name="deskripsi" id="deskripsi" col="30" rows="5" class="form-control">{{old('deskripsi', $barang->deskripsi)}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        <div class="card">
                <div class="card-header">
                    <h3>Edit Gambar</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('admin.barangs.updateImage',$barang->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <img src="{{ Storage::url($barang->gambar) }}" width= "200">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file"class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection