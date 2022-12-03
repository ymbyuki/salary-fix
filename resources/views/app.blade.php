<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Salary -給与計算アプリ-</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{-- axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        <app-component></app-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
