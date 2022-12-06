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
            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Product name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" value="" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Price</label>
                    <input type="number" class="form-control" id="exampleInputPrice" name="price" value="" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputTotal">Total</label>
                    <input type="number" class="form-control" id="exampleInputTotal" name="total" value="" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Category</label>

                    <select name="category_id" class="form-control">
                        @foreach ($data as $category)
                            @if ($category->parent_id != 0)
                                <option  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                   <label for="customFile"> Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" multiple="multiple" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
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
