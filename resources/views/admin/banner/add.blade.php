@extends('admin.main')
@section('content')

    <body>
        <div class="container">
            <h1> Add banner </h1>
            @if (Session::has('success'))
                <div class="success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="post" action="{{route('banner.store')}}" enctype="multipart/form-data">
                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import Data</button>
                </form>
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



     <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins//bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="/template/admin/plugins//bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="/template/admin/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
    </body>


@endsection
