@extends('layouts.admin_layout')
@section('content')
 <h1>hi im new content</h1>

 {{-- Alert message --}}
 @if(session()->has('success'))
 <div class="alert alert-success">
     {{ session()->get('success') }}
 </div>
@endif

 
 <table class="table table-bordered addition_datatable">
    <thead>
          <tr>
                <th>Name</th>
                <th>Permissions</th>
                <th>Control</th>
          </tr>
    </thead>
    <tbody>
        @if(isset($roles))
            @foreach ($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>
                @foreach ($role->permissions as $permission)
                {{$permission}} , 
                @endforeach
            </td>
                <td><a class="btn btn-primary" href="{{route('roles.edit' ,$role->id)}}" > Edit</a></td>
                </tr>
            @endforeach
           @endif
    </tbody>
</table>

@endsection
