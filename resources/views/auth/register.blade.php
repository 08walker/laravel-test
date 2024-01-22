@extends('layouts.app')

@section('content')

<div class="container col-lg-6 mx-auto">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>Registrarse</b></a>
    </div>
    <div class="card-body">

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
      @csrf

        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

          {{-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div> --}}
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repita la Contraseña">
          {{-- <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div> --}}
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        {{-- <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
              <label class="custom-file-label" for="exampleInputFile">Subir Logotipo de la Empresa</label>
            </div>
          </div>
          @error('avatar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div> --}}

        <div class="social-auth-links text-center">
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </div>
      </form>
      <div align="center">
          <a href="/login" class="text-center">Ya me encuentro registrado</a>      
      </div>
    </div>

  </div>
</div>

@endsection
@push('scripts')

<!-- bs-custom-file-input -->
<script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <!-- InputMask -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>
@endpush