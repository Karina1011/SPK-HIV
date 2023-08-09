@extends('partials.main')
@section('container')
<title>SPK-HIV | Tabel Pengguna</title>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Pengguna</h4>
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                    <h5 class="card-header">Tabel Data Pengguna</h5>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td> 
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <div class="col-md-4 text-start">
                                                <form onsubmit="return confirm('Apakah anda yakin ?');"
                                                    action="{{ route('pengguna.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <a href="/pengguna/{{ $item->id }}" method="post"
                                                            onsubmit="return confirm('Apakah anda yakin ?');"><i
                                                                class="bx bxs-trash" style=color:white></i>
                                                        </a>
                                                    </button>
                                                </form>
                                            </div>
                                        {{-- <td>{!! $item->solusi !!}</td> --}}
                                        {{-- <td style="size: 30px;" class="row">
                                            <div class="col-md-4 text-end">
                                                <button type="button" onclick="editGejala({{ $item->id }})" class="btn btn-primary" 
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalEdit" 
                                                    class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                                    <i class='bx bx-edit'></i>
                                                </button>
                                            </div> --}}
                                            
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
{{-- modal tambah pengguna --}}
<div class="modal" tabindex="-1" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header hader">
                <h3 class="modal-title" id="exampleModalLabel">
                    Tambah Pengguna
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/pengguna') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-1">
                        <label for="name">Nama </label>
                        {{-- <input type="text" class="form-control" name="name" placeholder="" @error('name') is-invalid @enderror value="{{ old('name') }}" required> --}}
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="Input Kode gejala" 
                            @error('email') is-invalid @enderror value="{{ old('email') }}" required>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Input Password">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="role">Role</label>
                        <select  type="text" class="form-control" name="role" id="role"
                            placeholder="Pilih Role" >
                            <option selected>Pilih Sebagai</option>
                            <option value="dokter">Dokter</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-md-block">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection