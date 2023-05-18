<!DOCTYPE HTML>
<html>
<head>
{{--    <title> {{ $meta_title ?? 'Laravel' }} </title>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- SEO --}}
    <meta name="description" content="{{ $meta_desc ?? 'Laravel' }}">
    <meta name="keywords" content="{{ $meta_keywords  ?? 'Laravel'}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{ $url_canonical ?? 'Laravel'}}"/>
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href=""/>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{ asset('User/css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="{{ asset('User/css/style.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('User/css/sweetalert.css') }}" rel='stylesheet' type='text/css'/>
    <script src="{{ asset('User/js/simpleCart.min.js') }}"></script>
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <script type="text/javascript" src="{{ asset('User/js/jquery-1.11.1.min.js    ') }}"></script>
</head>

<body>
<div class="header_top">
    <div class="container">
        <div class="cssmenu">
            <ul>
                @if (Auth::check())
                    <li class="active">
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </div>
                        </a>
                    </li>
                @else
                    <li class="active"><a href="{{ url('/user-register') }}">Register</a></li>
                    <a>|</a>
                    <li class="active"><a href="{{ url('/user-login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="header_bottom men_border">
    <div class="container">
        <div class="col-xs-2 header-bottom-left">
            <div class="col-xs-6 menu">
                <ul class="megamenu skyblue">
                    <li><a class="color1" href="{{ url('/') }}"> Home </a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-8 header-bottom-right">
            <div class="box_1-cart">
                <div class="box_11">
                    <input type="hidden"/>
                    @if (Session::get('cart') == true)
                        <a href="{{ url('/show-cart-ajax') }}">
                            <p> Cart: {{count(Session::get('cart'))}} <span id="simpleCart_quantity">  </span>
                                Product</p>
                            <div class="clearfix"></div>
                        </a>
                    @else
                        <p> Cart is Empty </p>
                        <div class="clearfix"></div>
                    @endif
                </div>
                <div class="clearfix"></div>
            </div>
            @stack('search')
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@yield('content')
<div class="footer">
    <div class="container">
        <div class="footer_bottom">
            <div class="copy">
                 Nguyễn Thanh Mai {{ Carbon\Carbon::now()->year  }}
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- gio hang ajax --}}
<script type="text/javascript" src="{{ asset('User/js/sweetalert.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            var id = $(this).data('id_product');
            //alert(id);
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            // alert(cart_product_name);
            $.ajax({
                url: '{{ url('/add-cart-ajax') }}',
                method: 'POST',
                data: {
                    cart_product_id: cart_product_id,
                    cart_product_name: cart_product_name,
                    cart_product_image: cart_product_image,
                    cart_product_price: cart_product_price,
                    cart_product_qty: cart_product_qty,
                    _token: _token
                },

                success: function (data) {
                    swal({
                        title: "Product added to cart",
                        text: "You can continue to purchase or go to the shopping cart to proceed to checkout",
                        showCancelButton: true,
                        cancelButtonText: "See more",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Go to cart",
                        closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm){
                            window.location.href = "{{ url('/show-cart-ajax') }}"
                        } else {
                            location.reload();
                        }
                    });
                }
            });
        });
    });
</script>

{{-- gio hang ajax --}}
{{-- Tim kiem ajax --}}
<script type="text/javascript">
    $('#keywords').keyup(function () {
        var keywords = $(this).val();
        if (keywords != '') {
            var _token = $('input[name = "_token"]').val();
            $.ajax({
                url: "{{ url('/timkiem-ajax') }}",
                method: "post",
                data: {
                    keywords: keywords,
                    _token: _token
                },
                success: function (data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            })
        } else {
            $('#seach_ajax').fadeOut();
        }
    });
    $(document).on('click', '.li_timkiem_ajax', function () {
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script>
{{-- end tim kiem ajax --}}


</body>

</html>
