@extends('layouts.app')

@section('content')

<div class="container col-lg-4 login-box">
  <!-- /.login-logo -->
      @include('componentes.success')
      @include('componentes.fallos')

  <div class="card">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Autentíquese para iniciar sesión</p>

      <form method="POST" action="{{ route('login') }}">
      @csrf
            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electrónico">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
          <div class="col-8">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('¿Ha olvidado su contraseña?') }}
            </a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <div class="col-lg-12" style="display: flex;justify-content: center">
        <p>
          <a href="/register" class="text-center">Registrarse</a>
        </p>  
      </div>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection