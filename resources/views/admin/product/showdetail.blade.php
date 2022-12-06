@extends('admin.main')
@section('content')
    @if (Session::has('success'))
        <div class="success">
            {{ Session::get('success') }}
        </div>
    @endif

    @foreach ($product as $product)
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> {{ $product->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="	fas fa-cart-plus"></i> Price</strong>
                <p class="text-muted"> {{ $product->price }}</p>
                <hr>
                <strong><i class="fa fa-plus-square"></i> Total</strong>
                <p class="text-muted">{{ $product->total }}</p>
                <hr>
    @endforeach
    @foreach ($prouductDetail as $product)
        <strong><i class="fas fa-pencil-alt mr-1"></i> Description</strong>
        <p class="text-muted">{{ $product->description }}</p>
        <hr>
        <strong><i class="far fa-file-alt mr-1"></i> Attribute</strong>
        <p class="text-muted">{{ $product->attribute }}</p>
        <hr>
        <strong><i class="far fa-file-alt mr-1"></i> Value</strong>
        <p class="text-muted">{{ $product->value }}</p>
        </div>
        </div>
    @endforeach
@endsection
