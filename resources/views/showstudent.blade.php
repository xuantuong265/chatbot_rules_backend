@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <div class="card-tools">
    <form action="{{ route('product.search')}}" method="GET">
    <div class="input-group input-group-sm" style="width: 300px; float: right;">
      <input class="form-control float-right"  id="searchAdmin" type="text" name="search"
      placeholder="Search">
        </form>
    </div>
</div>
<div id="show-product-js-admin">
 <table class="table table-striped table-valign-middle">
        <thead>
            <tr>
                <th>#</th>
                <th> Name </th>
                <th>Gender </th>
                <th> MSV</th>
                <th>Class</th>
                <th>address</th>
                <th>Email</th>
                <th>Birthday</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('studentSubject.get', ['id' => $student->id])}}"> {{ $student->name }}</a></td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->code }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->birthday }}</td>
                    {{-- <td>  <img src="" alt="" title=""></a>
                       <img src="{{ asset('storage/'.$product->image) }}" style="height: 100px; width: 150px;">
                    <td>
                        @can('edit product')
                        <a type="button" class="edit btn btn-success" href="{{ route('product.show.edit',[$product->id]) }}">  <i class="nav-icon fas fa-edit"></i></a>
                        @endcan
                        @can('delete product')
                        <a type="button" class="delete btn btn-danger" href="{{ route('product.delete',[$product->id]) }}"> <i class="nav-icon 	fas fa-trash"></i></a>
                        @endcan
                        <a type="button" class="addimg btn btn-primary" href="{{ route('product.adddetail',[$product->id]) }}"> <i class="fas fa-poll-h	"></i> </a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
        <div class="card-footer clearfix">
            {!! $students->links()!!}
        </div>
    </table>
</div>

    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $( document ).ready(function() {
            $(document).on("change keyup", "#searchAdmin", function() {
                console.log($(this).val());
                    $.get("/searchinadmin", {search: $(this).val()}, function(res) {
                        $('#show-product-js-admin').html(res.html);
                    })
            })

        });
    </script>

@endsection
