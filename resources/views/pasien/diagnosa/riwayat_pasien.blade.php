@extends('partials.main')
<title>SPK-HIV | Riwayat Diagnosa Saya</title>
@section('container')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Riwayat Diagnosa /</span> Riwayat Diagnosa Saya</h4>
        <div class="card">
            <h5 class="card-header">Riwayat Diagnosa Saya</h5>
            <hr class="m-0">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Tanggal Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pageNumber = ($riwayatDiagnosas->currentPage() - 1) * $riwayatDiagnosas->perPage();
                        @endphp 
                       @foreach ($riwayatDiagnosas as $riwayatDiagnosa)
                       <tr>
                           <td>{{ ++$pageNumber }}</td>
                           <td>{{ $riwayatDiagnosa->penyakit->nama_penyakit }}</td>
                           <td>{{ $riwayatDiagnosa->tanggal_diagnosa->format('d-m-Y H:i') }} WIB</td>
                           <td class="row">
                               <div class="col-md-6 text-start mb-4">
                                   <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDetail" onclick="lihatDetailRiwayat('{{ $riwayatDiagnosa->id }}')">
                                       <i class="bx bx-show" style="color:white;"></i> Detail
                                   </button>
                               </div>
                               <div class="col-md-6 text-start mb-4">
                                   <a href="{{ route('riwayat.pasien', ['pasienId' => Auth::user()->id]) }}" class="btn btn-primary">
                                       <i class="bx bx-download" style="color:white;"></i> Riwayat Saya
                                   </a>
                               </div>
                           </td>
                       </tr>
                   @endforeach
                   
                    </tbody>
                </table>
                <br>
                {{ $riwayatDiagnosas->links('pagination::bootstrap-5') }}
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
