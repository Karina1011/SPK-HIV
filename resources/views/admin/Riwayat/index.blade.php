@extends('partials.main')
<title>SPK-HIV | Tabel Riwayat Diagnosa</title>
@section('container')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Riwayat Diagnosa</h4>
        <div class="card">
            <h5 class="card-header">Tabel Riwayat Diagnosa</h5>
            <hr class="m-0">
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
                            <th>Tanggal Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pageNumber = ($riwayatDiagnosa->currentPage() - 1) * $riwayatDiagnosa->perPage();
                        @endphp 
                        @foreach ($riwayatDiagnosa->reverse() as $item)
                            <tr>
                                <td>{{ ++$pageNumber }}</td>
                                <td>{{ $item->pasien->nama }}</td>
                                <td>{{ $item->penyakit->nama_penyakit }}</td>
                                <td>{{ $item->tanggal_diagnosa->format('d-m-Y H:i') }} WIB</td>
                                <td style="size: 20px;" class="row">
                                    <div class="row">
                                        <div class="col-md-6 text-start mb-4">
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDetail" onclick="lihatDetailRiwayat('{{ $item->id }}')">
                                                <i class="bx bx-show" style="color:white;"></i> Detail
                                            </button>
                                        </div>
                                        <div class="col-md-6 text-start mb-4">
                                            <button class="btn btn-primary" onclick="unduhDetailRiwayat('{{ $item->id }}')">
                                                <i class="bx bx-download" style="color:white;"></i> Unduh
                                            </button>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $riwayatDiagnosa->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
<!-- Modal Detail Riwayat Diagnosa -->
<div class="modal" tabindex="-1" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Riwayat Diagnosa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modal-content-detail"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function lihatDetailRiwayat(id) {
        $.ajax({
            url: "{{ route('riwayat.showDetail', ':id') }}".replace(':id', id),
            type: "GET",
            success: function(data_riwayatDiagnosa) {
                $("#modal-content-detail").html(data_riwayatDiagnosa);
                $('#modalDetail').modal('show');
            }
        });
    }

    function unduhDetailRiwayat(id) {
        window.open("{{ route('riwayat.unduhDetail', ':id') }}".replace(':id', id), '_blank');
    }
</script>
@endsection
