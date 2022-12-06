@extends('admin.main')
@section('content')
    <form action="{{ route('category.edit') }}" method="POST">
        <input type="hidden" name="id" value="{{$categories->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $categories->name }}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{ $categories->parent_id == 0 ? 'selected' : '' }}> Danh Mục Cha </option>
                    @foreach($categoryParent as $dataParent)
                        <option value="{{ $dataParent->id }}"
                            {{ $categories->parent_id == $dataParent->id ? 'selected' : '' }}>
                            {{ $dataParent->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ $categories->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active"
                           name="active" {{ $categories->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active"
                           name="active" {{ $categories->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection
