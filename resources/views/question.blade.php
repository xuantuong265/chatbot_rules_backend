@extends('admin.main')
@section('content')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
           Import data train
        </div>
        <div class="card-body">
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>

            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of Users
                        <a class="btn btn-warning float-end" href="{{ route('users.export') }}">Export User Data</a>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Option</th>
                    <th>Entity</th>
                    <th>Text</th>
                </tr>
                @foreach($qa as $q)
                <tr>
                    <td>{{ $q->id }}</td>
                    <td>{{ $q->option }}</td>
                    <td>{{ $q->entity }}</td>
                    <td>{{ $q->test }}</td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>

@endsection

