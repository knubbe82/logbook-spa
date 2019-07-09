<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LogBook</title>
    <script src="https://js.api.here.com/v3/3.0/mapsjs-core.js"
      type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.0/mapsjs-service.js"
      type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
            <v-app>
                <app-home></app-home>
            </v-app>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>