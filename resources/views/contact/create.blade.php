 @extends('layouts.app')
  @section('title' , 'Contact Us Mavi Store')
  @section('content')

<br><br>

                  <!-- Left Side -->

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Get In Touch</h2>
          </div>
          <div class="col-md-7">

            <form action="{{ route('contacts.store')}}" method="POST">
              
              <div class="p-3 p-lg-5 border">
                
                <div class="form-groub">
                  <input type="text" name="name" placeholder="name" autofocus="" class="form-control" value="{{ old('name')}}">
                  </div>
                <div>{{ $errors->first('name') }}</div>
                
                  <br>

                  <div class="form-groub">
                    <input type="email" name="email" placeholder="email" class="form-control" value="{{old('email')}}">
                    </div>
                  <div>{{ $errors->first('email') }}</div>
                  
                   <br>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                  <div> {{ $errors->first('message') }}</div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                  </div>
                </div>
              </div>
              @csrf
            </form>
          </div>
      </div>
    </div>


   @endsection