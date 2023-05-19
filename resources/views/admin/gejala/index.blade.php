@extends('admin.dashboard')
@section('gejala')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Gejala</h4>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                    <h5 class="card-header">Tabel Gejala</h5>
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
                                    <th>Nama Gejala</th>
                                    <th>Kode Gejala</th>
                                    <th>Kode Penyakit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gejala as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_gejala }}</td>
                                        <td>{{ $item->kode_gejala }}</td>
                                        <td>{{ $item->penyakit->kode_penyakit }}</td>
                                        {{-- <td>{!! $item->solusi !!}</td> --}}
                                        <td style="size: 30px;" class="row">
                                            <div class="col-md-4 text-end">
                                                <button type="button" onclick="editGejala({{ $item->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                                    <i class='bx bx-edit'></i>
                                                </button>
                                            </div>
                                            <div class="col-md-4 text-start">
                                                <form onsubmit="return confirm('Apakah anda yakin ?');"
                                                    action="{{ route('gejala.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <a href="/gejala/{{ $item->id }}" method="post"
                                                            onsubmit="return confirm('Apakah anda yakin ?');"><i
                                                                class="bx bxs-trash" style=color:white></i>
                                                        </a>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah data_gejala --}}
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Tambah Data Gejala
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/gejala') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-1">
                        <label for="nama_gejala">Nama gejala</label>
                        {{-- <input type="text" class="form-control" name="nama_gejala" placeholder="" @error('nama_gejala') is-invalid @enderror value="{{ old('nama_gejala') }}" required> --}}
                        <input type="text" name="nama_gejala" class="form-control @error('nama_gejala') is-invalid @enderror" value="{{ old('nama_gejala') }}" required>
                        @error('nama_gejala')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="kode_gejala">Kode gejala</label>
                        <input type="text" class="form-control" name="kode_gejala" id="kode_gejala"
                            placeholder="Input Kode gejala" 
                            @error('kode_gejala') is-invalid @enderror value="{{ old('kode_gejala') }}" required>
                        @error('kode_gejala')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <select class="form-control select2" aria-label="Default select example" name="kode_penyakit"
                            id="kode_penyakit">
                            <option selected>Kode penyakit</option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->id }}">{{ $item->kode_penyakit }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group mb-1">
                        <label for="solusi">Solusi</label>
                        {{-- <input type="solusi" class="form-control" name="solusi" id="solusi" @error('solusi') is-invalid @enderror value="{{ old('solusi') }}" required> --}}
                        {{-- <textarea class="form-control @error('solusi') is-invalid @enderror" name="solusi" id="solusi" rows="3" placeholder="Masukan artikel">{{ old('solusi') }}</textarea>
                        @error('solusi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    {{-- </div> --}} --}}
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Edit Data gejala
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/gejala') }}" method="POST" id="formEdit">
                @method('PUT')
                @csrf
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Selesai -->
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>\
{{-- <script>
    CKEDITOR.replace('solusi');
</script> --}}

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function editGejala(id) {
        let formEdit = document.getElementById("formEdit");
        formEdit.action = formEdit.action + "/" + id

        $.ajax(
            {
                url: "{{ url('/gejala/edit') }}" + id + "/edit",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data_gejala) {
                    $("#modal-content-edit").html(data_gejala);
                    return true;
                }
            }
        );
    }
</script>

@endsection