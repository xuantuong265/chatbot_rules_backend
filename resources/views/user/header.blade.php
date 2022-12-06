<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>

                    <a href="{{route('admin.home')}}" class="flex-c-m trans-04 p-lr-25">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{route('show.product')}}" class="logo">
                    <img src="{{asset('template/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{route('show.product')}}">Home</a>
                        </li>
                        @foreach ($category as $data)
                        <li>
                           <a>{{$data->name}}</a>
                            @foreach ($categoryByParent as $categoryPR )
                            <ul class="sub-menu">
                                @foreach ($categoryByParent as $categoryPR )
                                @if ($categoryPR->parent_id==$data->id)
                                <li><a href="{{route('show.productcategory',[$categoryPR->id])}}">{{$categoryPR->name}}</a></li>
                                @endif
                                @endforeach
                            </ul>

                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <div id="js-show-cart"class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{count($products)}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

@include('user.cart.cart')

