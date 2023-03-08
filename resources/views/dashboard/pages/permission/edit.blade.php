@extends('layouts.admin_layout')
@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">New</h3>
        </div>
        <!-- /.card-header -->
          <!-- form start -->
          <form  method="post" action="{{Route('roles.update',$role->id)}}" enctype="multipart/form-data">
           @method('patch')
            <div class="card-body">

              <div class="form-group">
                <label > Name</label>
                <input name="name" type="text" value="{{$role->name}}" class="form-control"  placeholder="Enter Name">
              </div>
              <div>{{ $errors->first('name') }}</div>

              <div class="row">
                @foreach (config('global.permissions') as $name =>$value)
                    <div class="form-group col-sm-4">
                      <label class="checkbox-inline">
                        <input type="checkbox" class="chk-box" name="permissions[]" value="{{$name}}" 
                        {{in_array($name,$role->permissions)? 'checked' :''}}
                        >{{$value}}
                      </label>
                    </div>
                @endforeach
              </div>
              <div>{{ $errors->first('permissions') }}</div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            @csrf
          </form>
      </div>
      <!-- /.card -->

    </div>
@endsection