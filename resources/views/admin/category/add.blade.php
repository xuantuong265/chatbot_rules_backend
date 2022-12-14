@extends('admin.main')

@section('content')
<form action="{{ route('category.store') }}" method="post">
    @csrf
    <div class="card-body">

        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" placeholder="Tên danh mục" required>
        </div>
        <div class="form-group">
            <label for="parent_id">Danh mục</label>
            <select class="form-control" name="parent_id">
                <option value="0">Danh mục cha</option>
                @foreach ($category as $data)
                <option value="{{$data->id}}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="description">Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
    </div>
</form>
@endsection
