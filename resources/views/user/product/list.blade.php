<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>
                @foreach ($categoryByParent as $categoryPR)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        {{ $categoryPR->name }}
                    </button>
                @endforeach
            </div>
            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="mtext-107 cl2 size-114 plh2 p-r-15 form-controller" id="searchbyproduct" type="text" name="search"
                        placeholder="Search">
                </div>
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">

                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>
                        <div class="slidecontainer">
                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange" name="filter">
                            <p><span id="demo"></span>dong</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="list-product-json" class="row isotope-grid ">
            @foreach ($data as $product)
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
        </div>
        {{ $data->links() }}
    </div>
</section>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    $( document ).ready(function() {
        $(document).on("change keyup", "#searchbyproduct", function() {
            $.get("/livesearch", {search: $(this).val()}, function(res) {
                $('#list-product-json').html(res.html);
            })
        })

        $(document).on("change", "#myRange", function() {
            $.get("/filter", {filter: $(this).val()}, function(res) {
            $('#list-product-json').html(res.html);
            })
        })
    });
</script>
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    </script>
