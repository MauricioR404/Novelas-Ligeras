@extends('layouts.app')

@section('content')

<div class="container-fluid formulario">
        <div class="row align-items-center">
            <div class="col-10 col-md-6 px-5 elemento-uno">
                <h3 class="pb-2">Iniciar Sesion</h3>

                <form class="registro" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo Electronico</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" >
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <small id="emailHelp" class="form-text text-muted">Digite el correo con el que se registro</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="contrasena" placeholder="Contraseña" required autocomplete="current-password" value="12345678">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <small id="emailHelp" class="form-text text-muted">¿No tienes cuenta?, registrate <a href="">aqui</a></small>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Recordar contraseña
                                </label>
                            </div>
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                </form>
            </div><!-- col-6-->

            <div class="col-6 elemento-dos d-none d-md-block">
            </div>
        </div>
    </div>

@endsection
