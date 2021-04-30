<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    @stack('css')
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>My Finance System</title>
  </head>
  <body>
      <header>
        <div class="container-fluid">
            @yield('header')
        </div>
      </header>
      <main>
          <div class="container">
            @yield('content')
          </div>
      </main>
      <footer>
          <div class="container">
              @yield('footer')
          </div>
      </footer>
    @stack('scripts')
    <script src="/assets/js/popper.min.js" ></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script> 
  </body>
</html>