<!DOCTYPE html>
<html lang="rs">
    <head>
        <!-- Chart Title -->
        <title>Chart</title>
        <!-- Meta tags -->
        <meta name="author" content="denis_r_home@yahoo.com" />
        <meta charset="utf-" />

        <!-- Javascript -->
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/fa/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/chart.css') }}" />
    </head>
    <body>
        <div class="container-fluid p-0 m-0 bg-grey" id="app">

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="container text-center">
                    <div class="card w-25 m-auto mt-5 shadow">
                        <div class="text-start card-header">
                            <i class="fa fa-users"></i>
                            Register
                        </div>
                        <div class="card-body">                      
                            <div class="input-group mt-3">
                                <input type="text" placeholder="E-mail" class="form-control" name="email" required />
                            </div>
                            <p class="text-danger text-start pt-0 mt-0">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>   
                            <div class="input-group mt-3">
                                <input type="password" placeholder="Password" class="form-control" name="password" required />
                            </div>
                            <p class="text-danger text-start pt-0 mt-0">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </p>   
                            <div class="input-group mt-3">
                                <button class="btn btn-primary">Log In</button>
                            </div>
                            <hr />
                            <div class="text-start">
                                <p>If you don't have account <a href="{{ url('/register') }}">register!</a></p>
                            </div>
                        </div>

                        @if (session('status') == 'log403')
                        <div class="card-footer">
                            <p class="text-danger text-start">E-mail and password does not match any our record!</p>
                        </div>
                        @endif

                        @if (session('status') == 'log400')
                        <div class="card-footer">
                            <p class="text-danger text-start">You are not approved!</p>
                        </div>
                        @endif

                    </div>
                </div>
            </form>

        </div>
        @if (session('status') == 'log200')
            <script>
                let tt = setTimeout(() => {
                    window.location.reload();
                }, 2000);
            </script>
        @endif
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>