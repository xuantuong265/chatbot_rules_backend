@extends('admin.main')
@section('content')

    <body>
        <div class="container">
            <h1> Add image product </h1>
            @if (Session::has('success'))
                <div class="success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('product.storedetail') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                <div class="form-group">
                    <label for="exampleInputName">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputName" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Attribue</label>
                    <input type="text" class="form-control" id="exampleInputPrice" name="attribute" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputTotal">value</label>
                    <input type="text" class="form-control" id="exampleInputTotal" name="value" value="">
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
<script src="/template/admin/dist/js/adminlte.min.js"></script>
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
