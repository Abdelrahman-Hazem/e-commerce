<?php
use App\Models\category ;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
 $categories = Category::select('id',
 'name_' . LaravelLocalization::getCurrentLocale() . ' as name')->get();
 ?>
 <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{route('products.index')}}" class="js-logo-clone">{{__('frontend.mavi')}}</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children active">
                  <a href="index.html">{{__('frontend.collection')}}</a>
                  <ul class="dropdown">
                    @foreach ($categories as $category)
                    <li><a href="{{route('categories.show',$category)}}">{{$category->name}}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="{{route('shop.index')}}">{{__('frontend.shop')}}</a></li>
                {{-- <li><a href="{{route('orders.show',$order)}}">My Cart</a></li> --}}
                <li><a href="{{route('contacts.create')}}">{{__('frontend.contact')}}</a></li>
                <li><a href="{{route('about-us.index')}}">{{__('frontend.about us')}}</a></li>
                <li class="has-children active">{{__('frontend.lang')}}
                <ul class="dropdown">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    
                          <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                              {{ $properties['native'] }}
                          </a>
                  @endforeach
                </ul>
              </li>

              </ul>
            </nav>
          </div>

 <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a  href="{{ route('login') }}">{{__('frontend.login')}}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a  href="{{ route('register') }}">{{__('frontend.register')}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{__('frontend.logout')}}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

       <!--    <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div> -->
        </div>
      </div>
    </div>