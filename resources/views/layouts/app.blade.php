<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <!--Need to have-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


</head>
<body>

<style>
    .card-header
    {
        text-align: center;
        color:black;
        /* font-weight: bold; */
        
    }

    body {
      background-color: #D4F2F0
;
    }

    /* body { */
      /* background-color: #40466A; */
    /* } */

    
    
    .grid-container {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(8, minmax(0, 1fr));
    background-color: #D4F2F0;
  }

  @media only screen and (max-width: 865px) {
    .grid-container {
      grid-template-columns: 1fr;
    }
  }

  @media only screen and (max-width: 614px) {
    .grid-container {
      grid-template-columns: 100%;
    }
    .grid-item {
      grid-row-start: initial !important;
      grid-row-end: initial !important;
      grid-column-start: initial !important;
      grid-column-end: initial !important;
    }
  }

  .grid-item {
    width: 100%;
    height: 100%;
  }

  .mycard1 {
    grid-row-start: 1;
    grid-row-end: 2;
    grid-column-start: 1;
    grid-column-end: 3;
    text-align: justify;
    background-color: #f0f8ff;
    box-shadow: 0 9px 8px 0 rgba(0,0,0,0.2);
    border-radius: 25px;
    padding: 5;
  

  }

  .mycard2 {
    grid-row-start: 1;
    grid-row-end: 2;
    grid-column-start: 3;
    grid-column-end: 5;
    text-align: justify;
    background-color: #f0f8ff;
    box-shadow: 0 9px 8px 0 rgba(0,0,0,0.2);
    border-radius: 25px;
  }

  .mycard3 {
    grid-row-start: 1;
    grid-row-end: 2;
    grid-column-start: 5;
    grid-column-end: 7;
    text-align: justify;
    background-color: #f0f8ff;
    box-shadow: 0 9px 8px 0 rgba(0,0,0,0.2);
    border-radius: 25px;
  }

  .mycard4 {
    grid-row-start: 1;
    grid-row-end: 2;
    grid-column-start: 7;
    grid-column-end: 9;
    text-align: justify;
    background-color: #f0f8ff;
    box-shadow: 0 9px 8px 0 rgba(0,0,0,0.2);
    border-radius: 25px;
  }

  .mycard5 {
    grid-row-start: 2;
    grid-row-end: 5;
    grid-column-start: 1;
    grid-column-end: 5;
    text-align: center;
    background-color: #f0f8ff;
  }

  .mycard6 {
    grid-row-start: 2;
    grid-row-end: 4;
    grid-column-start: 5;
    grid-column-end: 7;
    text-align: center;
    background-color: #f5f5f5;
  }

  .water-card {
  background-color: #d1ecf1; /* Light blue color resembling water */
  border-color: #bee5eb; /* Lighter shade of blue */
}

.value-container {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 30px; /* Adjust the font size as desired */
}


.GraphContainer {
    grid-row-start: 6;
    grid-row-end: 15;
    grid-column-start: 5;
    grid-column-end: 10;
    text-align: center;
    background-color: #f5f5f5;
  }
  
</style>



    <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

        <main class="py-4">
            @yield('content')
        </main>

        
  
    </div>
</body>
</html>
