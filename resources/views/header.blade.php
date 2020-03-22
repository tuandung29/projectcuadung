<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Cổ Nhuế city</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 1900 </a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="#">Chào bạn {{Auth::user()->full_name}}</a></li>
                        <li><a href="{{route('logout')}}">Đăng Xuất</a></li>

                    @else
                        <li><a href="{{route('dangki')}}">Đăng kí</a></li>
                        <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('Trang-Chu')}}" id="logo"><img src="source/assets/dest/images/logodang.jpg"
                                                                width="200px"
                                                                alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="keyname" id="s" placeholder="Nhập từ khóa..."/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))

                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i>Giỏ hàng (
                                @if(Session::has('cart'))
                                    {{Session('cart')->totalQty}}
                                @else
                                    Trống
                                @endif)
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="beta-dropdown cart-body">
                                @foreach($product_cart as $pro)
                                    <div class="cart-item">
                                        <div class="media">
                                            <a class="pull-left" href="#"><img
                                                    src="source/image/product/{{$pro['item']['image']}}" alt=""></a>
                                            <a href="{{route('xoagiohang',$pro['item']['id'])}}"
                                               style="margin-left: 50px; float: right;text-decoration: underline">xóa </a>

                                            <div class="media-body">
                                                <span class="cart-item-title">{{$pro['item']['name']}}</span>
                                                <span
                                                    class="cart-item-amount">{{$pro['qty']}}*<span>{{number_format($pro['item']['unit_price'])}} vnđ</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span
                                            class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} vnđ</span>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    @endif

                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span
                    class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('Trang-Chu')}}">Trang chủ</a></li>
                    <li><a href="{{route('Trang-Chu')}}">Loại sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loaisp as $loai)
                                <li><a href="{{route('loai-sp',$loai->id)}}">
                                        {{$loai->name}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="{{route('lien-he')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->

