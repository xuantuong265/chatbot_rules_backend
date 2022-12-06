<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



  @yield('head')

  <style>
   .hidden {
      display:none;
    }
    .product-add {
  position: relative;
  width: 50%;
}

.image-product {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle-product {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-500%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.product-add:hover .image-product {
  opacity: 0.3;
}

.product-add:hover .middle-product {
  opacity: 1;
}



    </style>
