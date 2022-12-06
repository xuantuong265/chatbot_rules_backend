@extends('user.main')
@section('content')
<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
            @foreach ( $namecategory as $namecate)
            {{$namecate->name}}
            @endforeach
            </h3>
        </div>
        <div class="row isotope-grid">
            @foreach ($productsbyCategory as $product )
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <a href="{{ route('show.productdetail', $product->id) }}">
                    <div class="block2-pic hov-img0">
                        <img width = "300px" height="350px" src="{{ asset('storage/'.$product->image) }}" alt="IMG-PRODUCT">
                        <a  href="{{ route('show.productdetail', $product->id) }}"
                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Quick View
                        </a>
                    </div>
                    </a>
                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{ route('show.productdetail', $product->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{$product->name}}
                            </a>
                            <span class="stext-105 cl3">
                                ${{$product->price}}
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        {{ $productsbyCategory->links() }}
    </div>
</section>
@endsection
