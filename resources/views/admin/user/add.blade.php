@extends('admin.main')
@section('content')

    <body>
        <div class="container">
            <h1> Add products </h1>
            @if (Session::has('success'))
                <div class="success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('users.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPass">Password</label>
                    <input type="password" class="form-control" id="exampleInputPass" name="password" value="{{ old('password') }}" required>
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <div class="form-group">
                </div>
            </form>
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
