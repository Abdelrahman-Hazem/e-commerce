<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}"
>
<head>
  <!-- meta title -->
  @include('frontend.includes.meta_title')

  <!-- all links -->
  @include('frontend.includes.links')
   
</head>
<body>
    <div id="app">
        @include('frontend.includes.navbar')

<main >
  <div class="site-wrap">
            @yield('content')
  </div>
</main>
    </div>

                <!-- footer -->
  @include('frontend.includes.footer')

               <!-- All Scripts -->
@include('frontend.includes.scripts')


</body>
</html>
