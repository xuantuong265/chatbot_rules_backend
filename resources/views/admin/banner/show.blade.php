@extends('admin.main')
@section('content')

@if (Session::has('success'))
<div class="success">

    {{Session::get('success')}}
</div>
@endif
</div>
<table class="table table-striped table-valign-middle">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Link</th>
            <th>Description</th>
            <th>image</th>
            <th>action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($banners as $banner)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $banner->title }}</td>
            <td>{{ $banner->link }}</td>
            <td>{{ $banner->description }}</td>
            <td> <img class="image-product" src="{{ asset('storage/'.$banner->image) }}" style="height: 100px; width: 150px;"></td>
            <td>
                @can('edit banner')
                <a type="button" class="edit btn btn-success" href="{{  route('banner.show.edit', [$banner->id]) }}"> <i class="nav-icon fas fa-edit	"></i></a>
                @endcan
                @can('delete banner')
                <a type="button" class="delete btn btn-danger" href="{{ route('banner.delete', [$banner->id]) }}">  <i class="nav-icon 	fas fa-trash"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
    <div class="card-footer clearfix">
        {!! $banners->links() !!}
    </div>
</table>




@endsection
