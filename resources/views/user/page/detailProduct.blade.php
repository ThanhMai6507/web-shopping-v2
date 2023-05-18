@extends("layouts.user.userlayout")
@section('content')
    <div class="single_top">
        <div class="container">
            <div class="single_grid">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        <li>
                            <img class="etalage_thumb_image"
                                 src="{{ asset('public/uploads/product/' . $product->img_product) }}"
                                 class="img-responsive"/>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h1>{{ $product->name_product }}</h1>
                    <p>{{ $product->description }}</p>
                    <div class="simpleCart_shelfItem">
                        <div class="price_single">
                            <div class="head">
                                <h3><span
                                        class="amount item_price">{{ number_format($product->price) . ' ' . 'VND' }}</span>
                                </h3>
                            </div>
                            <div class="head_desc"><a href="#"></a><img src="images/review.png" alt=""/></li>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form>
                            @csrf
                            <div>
                                <div class="product-img">
                                    <input type="button" value="Add Cart" class="btn btn-primary add-to-cart"
                                           data-id_product="{{$product->id}}" name="add-to-cart">
                                </div>
                            </div>
                            <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
                            <input type="hidden" value="{{$product->name_product}}"
                                   class="cart_product_name_{{$product->id}}">
                            <input type="hidden" value="{{$product->img_product}}"
                                   class="cart_product_image_{{$product->id}}">
                            <input type="hidden" value="{{$product->price}}"
                                   class="cart_product_price_{{$product->id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$product->id}}">
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <h3 class="m_2">Product Details</h3>
    <div class="container">
        <div class="box_3">
            <p> {!! $product->detail !!} </p>
        </div>
    </div>
    <h3 class="m_2">Related Products </h3>
    <div class="container">
        <div class="row">
            @foreach ($related_products as $item)
                <div class="col-md-4">
                    <a href=" {{ url('san-pham/' . $item->slug_product) }}">
                        <div class="card mb-4 box-shadow">
                            <img src="{{ asset('public/uploads/product/' . $item->img_product) }}" class="card-img-top"
                                 data-holder-rendered="true" style="height: 314px; width: 218px%; display: block;"/>
                        </div>
                    </a>
                    <div class="card-body">
                        <a href="{{ url('san-pham/' . $item->slug_product) }}">
                            <p class="card-text">
                            <h4>{{ $item->name_product }}</h4>
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
