<!DOCTYPE html>
<html lang="en">

  @include('partials._head')

  <body>
    
    @include('partials._nav')

  <div class="container">

    @include('partials._message')

    @yield('content')

  </div>  <!-- .container -->

  @include('partials._footer')

  </body>

</html>