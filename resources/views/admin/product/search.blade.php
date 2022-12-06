<table class="table table-striped table-valign-middle">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name </th>
            <th>price</th>
            <th>total</th>
            <th>image</th>
            <th>action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('product.showdetail', ['id' => $product->id])}}"> {{ $product->name }}</a></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->total }}</td>
                <td>  <img src="" alt="" title=""></a>
                   <img src="{{ asset('storage/'.$product->image) }}" style="height: 100px; width: 150px;">
                <td>
                    <a type="button" class="edit btn btn-success" href="{{ route('product.show.edit',[$product->id]) }}">  <i class="nav-icon fas fa-edit"></i></a>
                    <a type="button" class="addimg btn btn-primary" href="{{ route('product.adddetail',[$product->id]) }}"> <i class="fas fa-poll-h	"></i> </a>
                    <a type="button" class="delete btn btn-danger" href="{{ route('product.delete',[$product->id]) }}"> <i class="nav-icon 	fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <div class="card-footer clearfix">
        {!! $products->links()!!}
    </div>
</table>
