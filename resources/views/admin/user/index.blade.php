@extends('admin.main')
@section('content')
@include('sweetalert::alert')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th> Name </th>
                <th> Email </th>
                <th> Role </th>
                <th> Permission </th>
                <th> Action </th>
                <th style="width: 100px;"> &nbsp </th>
            </tr>
        </thead>
        @foreach ($users as $user )
        <tbody>

                <td>{{$loop->iteration}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach ($user->roles as $key => $role)
                        <h6><span class="badge badge-info">{{$role->name}}</span></h6>
                    @endforeach
                </td>
                <th>
                    @foreach ($user->permissions as $key => $permission)
                    <h6><span class="badge badge-light"> {{$permission->name}}
                    </span></h6>
                    @endforeach
                </th>
                <td>
                    @hasallroles('admin')
                    @can('set role')
                    <a href="{{ route('users.role',[$user->id])}}" class="btn btn-primary btn-xs">role</a>
                    @endcan
                    @endhasallroles
                    @can('set permission')
                    <a href="{{route('users.permission',[$user->id])}}" class="btn btn-success btn-xs">Permission</a>
                    @endcan
                    @can('edit user')
                    <a href="{{ route('users.edit',[$user->id])}}" class="btn btn-info btn-xs"><i class="fas fa-user-edit"></i></a>
                    @endcan
                    @hasallroles('admin')
                    @can('delete user')
                    <a href="{{ route('user.delete',[$user->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-user-times"></i></a>
                    @endcan
                    @endhasallroles

                </td>

        </tbody>
        @endforeach
    </table>
@endsection
