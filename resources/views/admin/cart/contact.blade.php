@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">#</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt hàng</th>
            <th>Trạng thái</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $contact)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->created_at }}</td>
                <td> @if ($contact->status == 0)
                    Chưa xử lý
                    @elseif ($contact->status == 1)
                    Đã xử lý
                    @else
                    Huỷ
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('order.status',[$contact->id]) }}">status </a>

                    @can('read cart detail')
                        <a class="btn btn-primary btn-sm" href="{{ route('view.orders',[$contact->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    @endcan
                    @can('delete cart')
                    <a onclick="myFunction()" type="button" class="btn btn-danger btn-sm" href="{{route('delete.orders',[$contact->id]) }}">  <i class="fas fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $orders->links() !!}
    </div>
@endsection
<script>
    function myFunction() {
      let text = "Bạn chắc chắn muốn xoá đơn hàng ???\nEither OK or Cancel.";
      if (confirm(text) == true) {
        text = "You pressed OK!";
      } else {
        text = "You canceled!";
      }
      document.getElementById("demo").innerHTML = text;
    }
</script>
