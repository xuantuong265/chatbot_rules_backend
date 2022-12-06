@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $order->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $order->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $order->address }}</strong></li>
            <li>Email: <strong>{{ $order->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $order->content }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Total</th>
            </tr>
            @foreach($carts as $cart)
                 <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ asset('storage/'.$cart->product->image) }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->pty }}</td>
                    <td class="column-5">{{ number_format($price= $cart->price * $cart->pty, 0, '', '.') }}</td>
                </tr>
                @php $total += $price; @endphp
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
