<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema | Registro</title>
    <link rel="icon" type="image/png" href="dist/img/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.css')}}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>REGISTRO</b>USS</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Crear una cuenta</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Nombre"
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div class="input-group mb-3">
                        <input name="password" id="password" type="password" class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="togglePassword" class="fas fa-lock"
                                    onclick="togglePasswordVisibility()"></span>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class="input-group mb-3">
                        <input name="password_confirmation" type="password" class="form-control"
                            placeholder="Confirmar contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('login') }}" class="btn btn-secondary btn-block">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Scripts -->
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/js/adminlte.min.js')}}"></script>
    <!--Fin Scripts -->

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.getElementById("togglePassword");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.classList.remove("fa-lock");
                toggleButton.classList.add("fa-unlock-alt");
            } else {
                passwordField.type = "password";
                toggleButton.classList.remove("fa-unlock-alt");
                toggleButton.classList.add("fa-lock");
            }
        }
    </script>
</body>

</html>
