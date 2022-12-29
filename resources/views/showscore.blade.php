@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

   
</div>
<div id="show-product-js-admin">
 <table class="table table-striped table-valign-middle">
        <thead>
            <tr>
                <th></th>
                <th> attendance </th>
                <th>homeword </th>
                <th> midterm_score</th>
                <th>term_end_point</th>
                <th>Total</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->subject }}</td>
                    <td>{{ $subject->attendance }}</td>
                    <td>{{ $subject->homeword }}</td>
                    <td>{{ $subject->midterm_score }}</td>
                    <td>{{ $subject->term_end_point }}</td>
                    <td>{{ $sum = ($subject->attendance+$subject->term_end_point+$subject->homeword+$subject->midterm_score)/4}}</td>
    
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
