<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <style>
    * {
      font-family: monospace;
    }

    .avatar {
      position: relative;
      display: inline-block;
      width: 30px;
      white-space: nowrap;
      border-radius: 1000px;
      vertical-align: bottom;
    }

    .avatar i {
      position: absolute;
      right: -1px;
      bottom: 2px;
      width: 8px;
      height: 8px;
      border-radius: 100%;
    }

    .avatar span.text-circle {
      text-align: center;
      vertical-align: middle;
      color: #FFFFFF;
      font-size: 1.2rem;
      background: #BABFC7;
      display: table-cell;
    }

    .avatar img {
      width: 100%;
      max-width: 100%;
      height: auto;
      border: 0 none;
      border-radius: 1000px;
    }

    .avatar-online i {
      background-color: #1ef3a8;
    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="{{ asset('Labrary/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('Labrary/Font_Awsome/css/all.min.css') }}">
  <link href="{{ asset('Labrary/select2/css/select2.min.css') }}" rel="stylesheet" />
  @livewireStyles
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"> <img src="{{ asset('IMG/39971.png') }}" alt="logo"
        style="width: 100px; height: 60px; border-radius: 5px;"> </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
      aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span>
        <i class="fa fa-home" aria-hidden="true"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse " id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">

        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">{{ __('message.Home')}}<span
              class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('etudiant.index') }}">{{ __('message.Etudiants') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('paiement.index') }}">{{ __('message.Paiements') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('niveau.index') }}">{{ __('message.Niveaux') }}</a>
        </li>
        <li class="dropdown dropdown-user nav-item ml-5 ">
          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"
            dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
            <span class="mr-1 text-white">{{ __('message.Utilisateur') }}:
              <span class="user-name text-bold-700 text-white">{{ Auth::user()->name }}</span>
            </span>
            <span class="avatar avatar-online">
              <img src="{{ asset('IMG/avatar-s-19.png') }}" alt="avatar"></i><i></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>
              {{ __('message.Deconnecter') }}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </a>
        </li>


      </ul>
      <form class="form-inline my-2 my-lg-0 mr-2" method="GET" action="{{ route('search') }}">
        @csrf
        <input class="form-control mr-sm-2" name="query" type="text" style="font-family:monospace" required
          placeholder="{{ __('message.Matricule') }}/{{ __('message.TelP') }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('message.Search') }}</button>
      </form>
      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
      <li class="nav-item d-none d-sm-inline-block ">
        <a class="nav-link btn btn-secondary mr-2" rel="alternate" hreflang="{{ $localeCode }}"
          href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
          {{ $properties['native'] }}
        </a>
      </li>
      @endforeach
    </div>
  </nav>
  <br><br><br><br>
  @yield('content')
  <footer class="footer fixed-bottom footer-dark  navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021-2022 <a
          class="text-bold-800 grey darken-2" href="https://laravel.com" target="_blank">PHP FRAMEWORK LARAVEL
        </a>System De Paiement</span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Developpement & Web <i
          class="ft-heart pink"></i></span>
    </p>
  </footer>
  @livewireScripts
  <script src="/Labrary/JS/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('Labrary/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('Labrary/JS/jqueryCode.js') }}"></script>
  @yield('etudiantjavascript')
  @yield('paiementjavascript')
  <script src="/Labrary/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('Labrary/JS/etudiants.js') }}"></script>
  <script src="{{ asset('Labrary/JS/niveaux.js') }}"></script>
  <script src="{{ asset('Labrary/JS/paiements.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>