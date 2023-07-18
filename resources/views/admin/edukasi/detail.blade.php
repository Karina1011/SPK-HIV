@extends('pasien.partials.main')
@section('container')
    <div id="services" class="our-services section">
        <div class="container">
          <div class="row">
            <div class="container mt-5">
                <h1 class="mb-4">{{ $edukasi->judul }}</h1>
            
                <div class="card mb-3">
                  <img src="{{ asset('/storage/'.$edukasi['image']) }}" alt="image" width="50px">
                  <div class="card-body">
                    <h5 class="card-title">{{ $edukasi->judul }}</h5>
                  </div>
                </div>
                {{-- <h3>Isi Artikel</h3> --}}
                <p>{!! $edukasi->isi !!}</p>
                <a href="{{ url('/edukasi_seks')}}"class="btn btn-danger mt-4">Kembali ke Daftar Edukasi</a>
              </div>
            </div>
        </div>
    </div>
  
@endsection
