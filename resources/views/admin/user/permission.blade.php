@extends('admin.main')
@section('content')
    <!-- radio -->
    <form action="{{route('users.permission.insert',[$user->id])}}" method="POST" >
        @csrf
    <div class="add-role">
        @if (isset($name_role))
      <h2>Role: {{$name_role}}</h2>
      @endif
    @foreach ($permission as $per )
    <div class="form-check">
        <input class="form-check-input" type="checkbox"
        @if (in_array($per->id, array_values($get_permission_via_role->pluck('id')->toArray())))
         checked
        @endif
        name="permission[]" value="{{$per->id}}" id="{{$per->id}}">
        <label class="form-check-label" for="{{$per->id}}">
        {{$per->name}}
        </label>
      </div>
    @endforeach
    </div>
      <div class="form-group">
      <input type="submit" name="insetroles" value="add permission" class="btn btn-success">
      </div>
    </form>
@endsection
