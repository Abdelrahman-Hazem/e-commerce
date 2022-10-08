<footer class="site-footer custom-border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">
            
            <div class="block-7">
              <h3 class="footer-heading mb-4">{{__('frontend.about us')}}</h3>
              <p>{{$settings->about_us}}</p>
            </div>
          </div>
         
          
          <div class="col-md-6 col-lg-6">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">{{__('frontend.contact info')}}</h3>
              <ul class="list-unstyled">
                <li class="address">{{$settings->address}}</li>
                <li class="phone"><a href="tel://23923929210">+2 {{$settings->phone}}</a></li>
                <li class="email">{{$settings->email}}</li>
              </ul>
            </div>

            
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            

            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved to| <i class="icon-heart" aria-hidden="true"></i> <a href="https://" target="_blank" class="text-primary">Abdelrahman Hazem</a>
           
            </p>
          </div>
          
        </div>
      </div>
    </footer>