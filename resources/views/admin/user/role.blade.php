@extends('admin.main')
@section('content')


    <!-- radio -->
    <form action="{{route('users.role.insert',[$user->id])}}" method="POST" >
        @csrf
    <div class="add-role">
        <h2>Role</h2>
    @foreach ($role as $r)
        @if (isset($all_column_roles))
      <div class="custom-control custom-radio">
        <input class="custom-control-input" {{$r->id == $all_column_roles->id ? 'checked' : ''}} type="radio" id="{{$r->id}}" name="role" value="{{$r->name}}">
        <label for="{{$r->id}}" class="custom-control-label">{{$r->name}}</label>
      </div>
      @else
      <div class="custom-control custom-radio">
        <input class="custom-control-input" type="radio" id="{{$r->id}}" name="role" value="{{$r->name}}">
        <label for="{{$r->id}}" class="custom-control-label">{{$r->name}}</label>
      </div>
      @endif
      @endforeach
    </div>
      <div class="form-group">
      <input type="submit" name="insetroles" value="add roles" class="btn btn-success">
      </div>
    </form>


@endsection
