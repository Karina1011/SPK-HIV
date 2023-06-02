@extends('admin.dashboard')
@section('Rule')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Rule</h4>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                    <h5 class="card-header">Tabel Rule</h5>
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
                                    <th>Kode Penyakit</th>
                                    <th>Kode Gejala</th>
                                    <th>Pertanyaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rules as $rule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rule->penyakit->kode_penyakit }}</td>
                                        <td>{{ $rule->gejala->kode_gejala }}</td>
                                        <td>{!! $rule->pertanyaan !!}</td>
                                        <td style="size: 30px;" class="row">
                                            <div class="col-md-4 text-end">
                                                <button type="button" onclick="editrule({{ $rule->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                                    <i class='bx bx-edit'></i>
                                                </button>
                                            </div>
        
                                            <div class="col-md-4 text-start">
                                                {{-- <form onsubmit="return confirm('Apakah anda yakin ?');"
                                                    action="{{ route('penyakit.destroy', $rule->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <a href="/penyakit/{{ $rule->id }}" method="post"
                                                            onsubmit="return confirm('Apakah anda yakin ?');"><i
                                                                class="bx bxs-trash" style=color:white></i>
                                                        </a>
                                                    </button>
                                                </form> --}}
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
  {{-- modal tambah data gejala --}}
  <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" style="width: 125%">
      <div class="modal-content p-3" style="width: 125%">
          <div class="modal-header hader">
              <h3 class="modal-title" id="exampleModalLabel">
                  Tambah Data Gejala
              </h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url('/rule') }}" method="POST" >
              @csrf
              <div class="modal-body">
                <div class="form-group mb-1">
                    <label for="pertanyaan " class="mb-2">Pilih Kode Gejala</label>
                    <select class="form-control select2 mb-3" aria-label="Default select example" name="kode_penyakit"
                        id="kode_penyakit">
                        <option selected>Pilih kode penyakit</option>
                        @foreach ($penyakits as $item)
                            <option value="{{ $item->id }}">{{ $item->kode_penyakit }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-1">
                    <label for="pertanyaan" class="mb-2">Pilih Kode Gejala</label>
                    <select class="form-control select2 mb-2" aria-label="Default select example" name="kode_gejala"
                        id="kode_gejala">
                        <option selected>Pilih kode gejala</option>
                        @foreach ($gejalas as $item)
                            <option value="{{ $item->id }}">{{ $item->kode_gejala }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-1">
                <label for="pertanyaan">Pertanyaan</label>
                <textarea type="text" class="form-control" name="pertanyaan" id="tambah" placeholder=""
                    @error('pertanyaan') is-invalid @enderror value="{{ old('pertanyaan') }}"></textarea>
                @error('pertanyaan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
 {{-- modal edit --}}
 <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Edit Data Gejala
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/rule') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
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


{{-- js ajax --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
function editrule(id) {
    $.ajax({
        url: "{{ url('/rule/edit') }}/" + id + "/edit",
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
</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('tambah');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</main>
@endsection
