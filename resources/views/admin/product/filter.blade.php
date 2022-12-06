@extends('admin.main')
@section('content')


    <div class="container">
        <div class="row">
            <div style="margin-top: 40px">
                <form action="{{ route('filter.product') }}" method="GET">
                    <div>
                        <select name="category_id">
                            @foreach ($filters as $category)
                                @if ($category->parent_id != 0)
                                    <option value="{{ $category->parent_id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"> submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if (isset($filters))
        <div class=".container-md" style="margin: 50px 10% ;">
            @if (Session::has('success'))
                <div class="success">
                    {{ Session::get('success') }}
                </div>
            @endif
            {{-- <div>
        <a class="add" href="{{ url('adduser') }}">add</a>
    </div> --}}
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">price</th>
                        <th scope="col">total</th>
                        <th scope="col">image</th>
                        <th scope="col"> action </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($filters as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->total }}</td>
                            <td>
                                <img src="{{ route('product.showdetail', ['id' => $product->id])}}}"
                                    style="height: 100px; width: 150px;">
                            </td>ß
                            <td>
                                <a type="button" class="edit btn btn-success" href="{{ route('product.edit',[$product->id]) }}"> Edit</a>
                                <a type="button" class="addimg btn btn-primary" href="{{ route('product.adddetail',[$product->id]) }}"> Add detail </a>
                                <a type="button" class="delete btn btn-danger" href="{{ route('product.delete',[$product->id]) }}"> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
