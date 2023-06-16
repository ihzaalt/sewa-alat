
@extends('layouts.frontend')

@section('content')
<header class="bg-dark py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder">Sewa Alat Pendakian</h1>
          <p class="lead fw-normal text-white-50 mb-0">
            website sewa alat mendaki paling terpercaya
          </p>
        </div>
      </div>
    </header>
    <!-- Section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <h3 class="text-center mb-5">Daftar Barang</h3>
        <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
        >
        @foreach($barangs as $barang)
        
          <div class="col mb-5">
            <div class="card h-100">
              <!-- Sale badge-->
              <div
                class="badge badge-custom {{ $barang->status == 'tersedia' ? 'bg-success' : 'bg-warning'}} text-white position-absolute"
                style="top: 0; right: 0"
              >
                {{$barang->status}}
              </div>
              <!-- Product image-->
              <img
                class="card-img-top"
                src="{{ Storage::url($barang->gambar) }}"
                alt=""
                width="50"
                height="200"
              />
              <!-- Product details-->
              <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{$barang->nama}}</h5>
                  <!-- Product price-->
                  <div class="rent-price mb-3">
                    <span class="text-primary">Rp.{{ number_format($barang->harga_sewa)}}/</span>day
                  </div>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-primary mt-auto" href="https://wa.me/?text=Saya%20tertarik%20untuk%20menyewa%20{{ $barang->nama }}">Sewa</a>
                  <a
                    class="btn btn-info mt-auto text-white"
                    href="{{ route('detail', $barang->slug)}}"
                    >Detail</a
                  >
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endsection