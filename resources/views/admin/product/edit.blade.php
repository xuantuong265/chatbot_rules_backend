@extends('admin.main')
@section('content')

    <body>
        <div class="container">
            <h1> Edit product </h1>
            @if (Session::has('success'))
                <div class="success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" class="form-control" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="exampleInputName">Product name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputTotal">Total</label>
                    <input type="number" name="total" class="form-control" value="{{ $product->total }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Category</label>
                    <select name="category_id">
                        @foreach ($category as $category)
                            @if ($category->parent_id != 0)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                <img src="/storage/{{ $product->image }}" width="300px">

                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>

    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/template/admin/plugins//bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/template/admin/plugins//bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    {{-- <script src="/template/admin/dist/js/adminlte.min.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="/template/admin/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection
