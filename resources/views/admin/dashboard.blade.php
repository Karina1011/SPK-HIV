@extends('partials.main')
@section('container')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title fw-bolder">Selamat Datang di Dashboard {{ Auth::user()->name }} 🎉</h5>
                <p class="mb-4">
                  Anda sekarang berada di pusat kontrol, 
                  di mana Anda dapat mengelola berbagai aspek website dengan mudah. 
                  Selamat bekerja dan semoga sukses!
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset ('admin/assets/img/adm.png') }}"
                  height="170"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      @if (Auth::user()->role == 'admin'|| Auth::user()->role == 'dokter')

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('admin\assets\img\icons\unicons\rule.png') }}" alt="chart success" class="rounded" />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt3"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="{{url('/rule')}}">Tampilkan</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Rule/Aturan</span>
            <h3 class="card-title mb-2">{{ $jumlah_rule }}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('admin\assets\img\icons\unicons\gejala.png') }}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt6"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="{{url('/gejala')}}">Tamilkan</a>
                </div>
              </div>
            </div>
            <span>Gejala</span>
            <h3 class="card-title text-nowrap mb-1">{{ $jumlah_gejala }}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('admin/assets/img/icons/unicons/penyakit.png') }}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt4"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="{{url('/penyakit')}}">Tamilkan</a>
                </div>
              </div>
            </div>
            <span class="d-block mb-1">Penyakit</span>
            <h3 class="card-title text-nowrap mb-2">{{ $jumlah_penyakit }}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('admin/assets/img/icons/unicons/riwayat.png') }}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt1"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                  <a class="dropdown-item" href="{{url('/riwayat')}}">Tampilkan</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Riwayat Diagnosa</span>
            <h3 class="card-title mb-2">{{  $jumlah_riwayat }}</h3>
          </div>
        </div>
      </div>

      @endif
      @if(Auth::user()->role !== 'dokter')

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('admin/assets/img/icons/unicons/user.png') }}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt1"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                  <a class="dropdown-item" href="{{url('/pengguna')}}">Tampilkan</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Pengguna</span>
            <h3 class="card-title mb-2">{{  $jumlah_user }}</h3>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{ asset('admin/assets/img/icons/unicons/edukasi.png') }}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt1"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                  <a class="dropdown-item" href="{{url('/edukasi')}}">Tampilkan</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Edukasi</span>
            <h3 class="card-title mb-2">{{  $jumlah_edukasi }}</h3>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
