<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    <!-- Style -->
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    
  </head>

  <body style="background-image: url('/images/bg.png');
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Page Content -->
    @yield('content')

    <!--Footer  -->
    @include('includes.footer')
    
    <!--CS Floating  -->
    @include('includes.csfloating')

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    
  </body>
</html>
