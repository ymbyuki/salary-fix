<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laravel</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  </head>
  <body>
    <div id="app">
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="z-index: 11000; display: block;">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
      <app-component></app-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>