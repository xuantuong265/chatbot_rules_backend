
@extends('admin.main')
@section('content')

<form method="post" action="{{ route('order.status.update') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" class="form-control" value="{{ $order->id }}">
    <input type="hidden" name="name" class="form-control" value="{{ $order->name }}">
    <input type="hidden" name="phone" class="form-control" value="{{ $order->phone }}">
    <input type="hidden" name="address" class="form-control" value="{{ $order->address }}">
    <input type="hidden" name="email" class="form-control" value="{{ $order->email }}">
    <input type="hidden" name="content" class="form-control" value="{{ $order->content }}">
    <select name="status" >
        <Option value="0">chua</Option>
        <Option value="1">da</Option>
        <Option value="2">huy</Option>
    </select>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
@endsection

