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
            <form method="post" action="{{ route('banner.update') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" class="form-control" value="{{ $banners->id }}">
                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $banners->title }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">link</label>
                    <input type="text" name="link" class="form-control" value="{{ $banners->link }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputTotal">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $banners->description }}">
                </div>
                <div class="form-group">
                    <label for="customFile"> Image</label>
                <input type="file" name="image" class="form-control" placeholder="image">
                <img src="{{ asset('storage/'.$banners->image) }}" width="300px">
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
@endsection
