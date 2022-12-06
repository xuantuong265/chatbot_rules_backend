@foreach ($products as $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
        <!-- Block2 -->
        <div class="block2">

            <a href="{{ route('show.productdetail', $product->id) }}">
                <div class="block2-pic hov-img0">
                    <img width="300px" height="300px" src="{{ asset('storage/'.$product->image) }}"
                        alt="IMG-PRODUCT">
                    <a href="{{ route('show.productdetail', $product->id) }}"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                        Quick View

                </div>
            </a>
            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <div class="product-show-name-price">
                        <div>
                            <a href="{{ route('show.productdetail', $product->id) }}"
                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $product->name }}
                            </a>
                        </div>
                        <div>
                            <span class="stext-105 cl3">
                                {{ $product->price }}dong
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
