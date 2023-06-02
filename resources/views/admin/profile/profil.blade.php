@extends('admin.dashboard')
@section('profil')

<!-- Content wrapper -->
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Admin /</span> Akun</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.html"
              ><i class="bx bx-bell me-1"></i> Notifications</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"
              ><i class="bx bx-link-alt me-1"></i> Connections</a
            > -->
          </li>
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="admin/assets/img/avatars/1.png"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
              />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Edit Foto</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg"
                  />
                </label>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Nama Depan</label>
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                    placeholder="Masukan Nama Depan"
                    autofocus
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Nama Belakang</label>
                  <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Masukan Nama Belakang" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    placeholder="Masukan Email"
                  />
                </div>

                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Nomor Telepon</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="text"
                      id="phoneNumber"
                      name="phoneNumber"
                      class="form-control"
                      placeholder="Masukan Nomor Telepon"
                    />
                  </div>
                </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                <button type="reset" class="btn btn-outline-secondary">Batal</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
            
@endsection