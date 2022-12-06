@extends('admin.main')
@section('content')

    @if (Session::has('success'))
    <div class="success">
        {{Session::get('success')}}
    </div>
    @endif
    <table class="table table-striped table-valign-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>price</th>
                <th>total</th>
                <th>image</th>
                <th>action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->total }}</td>
                    <td>
                        <img src="{{ url('public/image/' . $product->image) }}" style="height: 100px; width: 150px;">
                    </td>
                    <td>
                         <a type="button" class="edit btn btn-success" href="{{ url('/product/edit/' . $product->id) }}"> <i class="nav-icon fas fa-edit"></i></a>
                        <a type="button" class="delete btn btn-danger" href="{{ 'delete/' . $product->id }}"><i class="nav-icon fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <div class="card-footer clearfix">
            {!! $products->links() !!}
        </div>
    </table>
@endsection
