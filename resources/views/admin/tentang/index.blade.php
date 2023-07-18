@extends('admin.dashboard')
@section('container')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tentang</h4>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                    <h5 class="card-header">Tabel Tentang</h5>
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
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_tentang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->judul, 30)!!} </td>
                                        <td>{!! \Illuminate\Support\Str::limit($item->isi, 45) !!}</td>
                                        <td><img src="{{ asset('/storage/' . $item->image) }}" alt="image" width="60"></td>
                                        <td style="size: 30px;" class="row">
                                            <div class="col-md-4 text-end">
                                                <button type="button" onclick="editTentang({{ $item->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                                    <i class='bx bx-edit'></i>
                                                </button>
                                            </div>
        
                                            <div class="col-md-4 text-start">
                                                <form onsubmit="return confirm('Apakah anda yakin ?');"
                                                    action="{{ route('tentang.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden"name="gambarLama" value="{{$item->image}}">
                                                    <button class="btn btn-danger" type="submit">
                                                        <a href="/tentang/{{ $item->id }}" method="post"
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
{{-- modal tambah data_penyakit --}}
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Tambah Data tentang
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/tentang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-1">
                        <label for="judul">Judul</label>
                        <textarea type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul"
                            @error('judul') is-invalid @enderror value="{{ old('judul') }}"></textarea>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="isi">Isi</label>
                        <textarea type="text" class="form-control" name="isi" id="isi" placeholder="Masukan isi Tentang"
                            @error('isi')
                                is-invalid
                            @enderror
                            value="{{ old('isi') }}"></textarea>
                        @error('isi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Upload Gambar"
                            @error('image')
                                is-invalid
                            @enderror
                            value="{{ old('image') }}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer d-md-block">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm">Batal</button>
                    </div>
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
                    Edit Data Tentang
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/tentang') }}" method="POST" id="formEdit" enctype="multipart/form-data">
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
    function editTentang(id) {
        let formEdit = document.getElementById("formEdit");
        formEdit.action = formEdit.action + "/" + id

        $.ajax(
            {
                url: "{{ url('/tentang') }}/" + id + "/edit",
                type: "GET",
                data: {
                    id: id
                },
                success: function(tentang) {
                    $("#modal-content-edit").html(tentang);
                    return true;
                }
            }
        );
    }
</script>
<script>
    CKEDITOR.replace('isi');
</script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

@endsection