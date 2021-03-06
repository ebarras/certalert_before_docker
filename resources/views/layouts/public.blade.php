<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta name="google" content="notranslate">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cert Alert</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="{{URL::asset('css/normalize.css')}}">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <!-- Local CSS -->
  <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

  @yield('page-specific-css')
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">CertAlert</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        @if (Request::is('/'))
        <li class="nav-item active">
        @else
        <li class="nav-item">
        @endif
          <a class="nav-link" href="{{ url('') }}">Home <span class="sr-only">(current)</span></a>
        </li>


        @if (Request::is('agreements'))
        <li class="nav-item active">
        @else
        <li class="nav-item">
        @endif
          <a class="nav-link" href="{{ url('agreements') }}">Agreements</a>
        </li>

      </ul>
    </div>
  </nav>

  @yield('body')

  
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="{{URL::asset('js/vendor/jquery-3.3.1.min.js')}}"><\/script>')</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="{{URL::asset('js/plugins.js')}}"></script>
  <script src="{{URL::asset('js/main.js')}}"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

  @yield('page-specific-js')
</body>

</html>
