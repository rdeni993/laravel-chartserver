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

            <!-- Menu -->
            @include('navbar')

            <!-- Content -->
            <div class="container">
                <div class="card shadow bg-white w-75 m-auto mt-5">
                    <div class="card-header bg-white p-0">
                        <h6 class="p-3 m-0">
                            Today date 
                            @switch(date('D', time()))
                                @case('Mon')
                                    Monday
                                    @break
                                @case('Tue')
                                    Tuesday
                                    @break
                                @case('Wed')
                                    Wednesday
                                    @break 
                                @case('Thu')
                                    Thursday
                                    @break 
                                @case('Fri')
                                    Friday
                                    @break 
                                @case('Sat')
                                    Saturday
                                    @break 
                                @case('Sun')
                                    Sunday
                                    @break
                                @default
                                    
                            @endswitch
                            ,
                            {{ date('M d. Y', time()) }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="list-group border-end main-menu">
                                    <a href="{{ url('/') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Upustva</a>
                                    <a href="{{ url('/add_price') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Dodaj cijenu</a>
                                    <a href="{{ url('/price') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Pregledaj cijene</a>
                                    <a href="{{ url('/search') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Potrazi cijenu</a>
                                    <a href="{{ url('/graphs') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Kreiraj grafikon</a>
                                    <a href="{{ url('/select_graphs') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Pregledaj grafikone</a>
                                    <a href="{{ url('/select_users') }}" class="list-group-item border-0"><i class="fa fa-arrow-right me-2"></i> Pregledaj korisnike</a>
                                </div>
                            </div>
                            <div class="col-lg-8" id="app">
                                @yield('pageContent')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-3 text-end">
                        <p class="m-0 p-0"><i><small>Developed by denis_r_home@yahoo.com</small></i></p>
                    </div>
                </div>
            </div>

        </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        $(()=>{
            $(".paginationSlider").on('change',function(){
                let pgNm = $(this).val();
                let curUrl = new URL(window.location);
                let prm = curUrl.searchParams;

                prm.set('page', pgNm);
                curUrl.search = prm.toString();

                let newUrl = curUrl.toString();

                return window.location.href = newUrl;

            });
        });
    </script>
    </body>
</html>