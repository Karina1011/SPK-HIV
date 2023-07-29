@extends('partials.main')
<title>SPK-HIV | Tabel Riwayat Diagnosa</title>
@section('container')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Riwayat Diagnosa</h4>
        <div class="card">
            <h5 class="card-header">Tabel Riwayat Diagnosa</h5>
            <hr class="m-0">
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
                            <th>Nama Pasien</th>
                            <th>Nama Penyakit</th>
                            <th>Gejala Terpilih</th>
                            <th>Tanggal Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatDiagnosa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pasien->nama }}</td>
                                <td>{{ $item->penyakit->nama_penyakit }}</td>
                                <td>{!! \Illuminate\Support\Str::limit($item->gejala_terpilih, 20) !!}</td>
                                <td>{{ $item->tanggal_diagnosa->format('d-m-Y') }}</td>
                                <td style="size: 20px;" class="row">
                                    <div class="col-md-2 text-start">
                                        <form onsubmit="return confirm('Apakah anda yakin ?');" action="{{ route('riwayat.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="bx bxs-trash" style="color:white;"></i> Hapus
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function editRiwayatDiagnosa(id) {
        let formEdit = document.getElementById("formEdit");
        formEdit.action = "{{ route('riwayat.index') }}" + "/" + id;

        $.ajax({
            url: "{{ url('/riwayat') }}/" + id + "/edit",
            type: "GET",
            data: {
                id: id
            },
            success: function(data_riwayatDiagnosa) {
                $("#modal-content-edit").html(data_riwayatDiagnosa);
                return true;
            }
        });
    }
</script>
@endsection
