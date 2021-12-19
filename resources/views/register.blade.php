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
        <div class="container-fluid p-0 m-0 bg-grey">

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="container text-center">
                    <div class="card w-25 m-auto mt-5 shadow">
                        <div class="text-start card-header">
                            <i class="fa fa-users"></i>
                            Register
                        </div>
                        <div class="card-body">                        
                            <div class="input-group">
                                <input type="text" placeholder="Ime i Prezime" class="form-control" name="name" required />
                            </div> 
                            <p class="text-danger text-start pt-0 mt-0">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>                     
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
                                <input type="password" placeholder="Re Type Password" class="form-control" name="retype_password" required />
                            </div>
                            <p class="text-danger text-start pt-0 mt-0">
                                @error('password_retype')
                                    {{ $message }}
                                @enderror
                            </p>   
                            <div class="input-group mt-3">
                                <button class="btn btn-primary">Register</button>
                            </div>
                            <hr />
                            <div class="text-start">
                                <p>If you have account <a href="{{ url('/login') }}">sign in!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>