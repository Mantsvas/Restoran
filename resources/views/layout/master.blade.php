<!DOCTYPE html>
  <html lang="en">
    @include('layout.head')
  <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    @include('layout.nav')
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif


    @yield('content')

    @include('layout.footer')
    @include('layout.script')
  </body>
</html>
