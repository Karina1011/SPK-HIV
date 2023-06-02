{{-- @extends('login.partials')
@section ('login')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
              </span>
              <h4 class="mb-2">LOGIN</h4>
            </a>
          </div>
          <!-- /Logo -->
          <p class="mb-4">Selamat datang di SPK HIV/AIDS! 👋</p>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
          </div>  
          @endif
          <form id="formAuthentication" class="mb-3" action="" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email </label>
              <input
                value="{{ old ('email')}}"
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Masukan Email"
                autofocus
              />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="auth-forgot-password-basic.html">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
              </div>
            </form>
            </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection --}}