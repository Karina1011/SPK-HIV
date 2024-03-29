@extends('partials.main')
@section('container')
<title>SPK-HIV | Tabel Penyakit</title>
<div class="content-wrapper">
    <!-- Konten utama -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Penyakit</h4>
        <!-- Konten wrapper -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                    <h5 class="card-header">Tabel Penyakit</h5>
                    <hr class="m-0" />
                    <div class="card-body">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalTambah"> + Tambah</button>
                    </div>
                    @if (session('berhasil'))
                    <div class="alert alert-success">
                        {{ session('berhasil') }}
                    </div>
                    @endif
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyakit</th>
                                    <th>Kode Penyakit</th>
                                    <th>Solusi</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $pageNumber = ($penyakit->currentPage() - 1) * $penyakit->perPage();
                            @endphp
                                @foreach ($penyakit as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->nama_penyakit, 30) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->kode_penyakit, 5) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->solusi, 20) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->deskripsi, 20) !!}</td>
                                        <td style="size: 30px;" class="row">
                                            <td style="size: 30px;" class="row">
                                                <div class="col-md-4 text-end">
                                                    <button type="button" onclick="editPenyakit({{ $item->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                                        <i class='bx bx-edit'></i>
                                                    </button>
                                                </div>
                                            
                                                <div class="col-md-4 text-start">
                                                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" action="{{ route('penyakit.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="bx bxs-trash" style="color:white;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                    </tr>
                                @endforeach
                            </tbody>        
                        </table>
                        <br>
                    {{ $penyakit->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah data_penyakit --}}
<div class="modal" tabindex="-1" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Tambah Data Penyakit
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/penyakit') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-1">
                        <label for="nama_penyakit">Nama Penyakit</label>
                        {{-- <input type="text" class="form-control" name="nama_penyakit" placeholder="" @error('nama_penyakit') is-invalid @enderror value="{{ old('nama_penyakit') }}" required> --}}
                        <input type="text" name="nama_penyakit" class="form-control @error('nama_penyakit') is-invalid @enderror" value="{{ old('nama_penyakit') }}" required>
                        @error('nama_penyakit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="kode_penyakit">Kode Penyakit</label>
                        <input type="text" class="form-control" name="kode_penyakit" id="kode_penyakit"
                            placeholder="Input Kode Penyakit" 
                            @error('kode_penyakit') is-invalid @enderror value="{{ old('kode_penyakit') }}" required>
                        @error('kode_penyakit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="solusi">Solusi</label>
                        {{-- <input type="solusi" class="form-control" name="solusi" id="solusi" @error('solusi') is-invalid @enderror value="{{ old('solusi') }}" required> --}}
                        <textarea class="form-control @error('solusi') is-invalid @enderror" name="solusi" id="solusi" rows="3" placeholder="Masukan artikel">{{ old('solusi') }}</textarea>
                        @error('solusi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="deskripsi">Deskripsi</label>
                        {{-- <input type="deskripsi" class="form-control" name="deskripsi" id="deskripsi" @error('deskripsi') is-invalid @enderror value="{{ old('deskripsi') }}" required> --}}
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3" placeholder="Masukan artikel">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal" tabindex="-1" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Edit Data Penyakit
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/penyakit') }}" method="POST" id="formEdit">
                @method('PUT')
                @csrf
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Selesai -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('solusi');
    });

    function editPenyakit(id) {
        let formEdit = document.getElementById("formEdit");
        formEdit.action = "{{ url('/penyakit') }}/" + id;

        $.ajax({
            url: "{{ url('/penyakit') }}/" + id + "/edit",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

    $('#exampleModalEdit').on('hidden.bs.modal', function () {
        $("#modal-content-edit").html("");
    });
</script>
@endsection