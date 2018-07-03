<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Passion animaux</title>
        {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
        <style> textarea { resize: none; } </style>
    </head>
    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Passion animaux</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/') }}">Les animaux</a></li>
            <li><a href="{{ url('animals') }}">Ajouter un animal</a></li>
          </ul>
        </div>
      </nav>
        @yield('contenu')
        @yield('js')
    </body>
</html>
