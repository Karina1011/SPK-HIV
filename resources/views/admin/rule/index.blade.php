@extends('admin.dashboard')
@section('container')
<main id="main" class="main">
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
                                        <th>Nama Penyakit</th>
                                        <th>Kode Gejala</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rules as $rule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rule->penyakit->kode_penyakit }}</td>
                                        <td>{!! $rule->penyakit->nama_penyakit !!}</td>
                                        <td>
                                            @php
                                            $gejalaIds = explode(',', $rule->daftar_gejala);
                                            $gejalaItems = [];
                                            foreach ($gejalas as $gejalaItem) {
                                                if (in_array($gejalaItem->id, $gejalaIds)) {
                                                    $gejalaItems[] = $gejalaItem;
                                                }
                                            }
                                            @endphp
                                            @foreach ($gejalaItems as $gejalaItem)
                                                {{ $gejalaItem->kode_gejala}}
                                            @endforeach
                                        </td>
                                        <td style="size: 30px;" class="row">
                                            <div class="col-md-4 text-end">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalEdit{{ $rule->id }}">
                                                    <i class='bx bx-edit'></i>
                                                </button>
                                            </div>

                                            <div class="col-md-4 text-start">
                                                <form onsubmit="return confirm('Apakah anda yakin ?');"
                                                    action="{{ route('rule.destroy', $rule->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <a href="/rule/{{ $rule->id }}" method="post"
                                                            onsubmit="return confirm('Apakah anda yakin ?');"><i
                                                                class="bx bxs-trash"
                                                                style="color:white"></i>
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
                        {{-- {!! $rules->links('pagination::bootstrap-5')->withQueryString() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- modal tambah data gejala --}}
<div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="width: 125%">
        <div class="modal-content p-3" style="width: 125%">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Tambah Data Rule
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/rule') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-1">
                        <label for="id_penyakit" class="form-label mb-2">Pilih Kode Penyakit</label>
                        <select class="form-select mb-3" aria-label="Kode Penyakit" name="id_penyakit"
                            id="id_penyakit" onchange="updateNamaPenyakit(this)">
                            <option value="">Pilih kode penyakit</option>
                            @foreach ($penyakits as $item)
                                <option value="{{ $item->id }}" data-nama="{{ $item->nama_penyakit }}">
                                    {{ $item->kode_penyakit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                        <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="daftar_gejala">Daftar Gejala</label>
                        @foreach ($gejalas as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="daftar_gejala[]" value="{{ $item->id }}" id="gejala_{{ $item->id }}">
                                <label class="form-check-label" for="gejala_{{ $item->id }}">
                                    {{ $item->kode_gejala }} - {{ $item->nama_gejala }}
                                </label>
                            </div>
                        @endforeach
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


@include('admin.rule.edit')


{{-- js ajax --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function editrule(id) {
        $.ajax({
            url: "{{ url('/rule/edit') }}",
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var kodePenyakit = document.getElementById('id_penyakit');
      var namaPenyakit = document.getElementById('nama_penyakit');
      var penyakitData = {!! json_encode($penyakits) !!};
  
      kodePenyakit.addEventListener('change', function() {
        var selectedId = kodePenyakit.value;
        var selectedPenyakit = penyakitData.find(function(penyakit) {
          return penyakit.id == selectedId;
        });
  
        namaPenyakit.value = selectedPenyakit ? selectedPenyakit.nama_penyakit : '';
      });
    });
</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('tambah');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
</main>
