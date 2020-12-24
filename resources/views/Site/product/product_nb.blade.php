<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>Sản phẩm Nổi bật</span></h2>
                <p>Đây là những sản phẩm được ưa chuộng nhất năm 2019</p>
            </div>
        </div>
        <div class="row">
            @foreach ($product_featured as $item)
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(images/{{$item->prd_image}});">
                            <div class="cart">
                                <p>
                                    <span class="{{route('site.cart')}}"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span>
                                    <span><a href="{{route('site.detail')}}"><i class="icon-eye"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="{{route('site.detail')}}">{{$item->prd_name}}</a></h3>
                            <p class="price"><span>{{$item->prd_price}} đ</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>