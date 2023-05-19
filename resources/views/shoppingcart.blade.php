@extends('header-footer-index')

@push('styles')
<!-- Link css product -->
<link href="{{ asset('/css/shoopingcart.css') }}" rel="stylesheet">
@endpush
@if(Auth::user())
    @php
        $id = Auth::user()->id;
    @endphp
@endif

@section('main')
<h4 class="main__product--card">GIỎ HÀNG</h4>
@if(isset($cart_data))
@if(Cookie::get('shopping_cart'))
@php $total="0" @endphp
<div class="shopping-cart d-flex justify-content-between mb-5">
    <div>
        <div class="shopping-cart-name">
            <span>Sản phẩm</span>
            <span>Đơn giá</span>
            <span>Số lượng</span>
            <span>Thành tiền</span>
            <span>
                <li class="fa fa-trash-o">
            </span>
        </div>
        @foreach ($cart_data as $data)
        @if($data['item_id_user'] == $id)
        <div class="shopping-cart-styles__styledSeller cartpage">
            <div class="shopping-cart-styles-row">
                <input type="hidden" class="product_id" id="product_id-{{ $data['item_id'] }}">
                <div class="d-flex">
                    <a class="shopping-cart-styles-product__checkbox mr-3">
                        @php
                        $id_product = $data['item_id'];
                        $arrayImage = explode(', ', $data['item_image']);
                        $arrayImageLength = count($arrayImage);
                        echo " <img src='$arrayImage[0]' alt=''>";
                        @endphp
                    </a>
                    <a class="shopping-cart-styles-product__name" href="{{route('product',['id' => $id_product])}}">{{ $data['item_name'] }}</a>
                </div>
                <div>
                    <span class="cart-sub-total-price">{{ number_format($data['item_price'], 2) }}</span>
                </div>
                <div>
                    <div class="d-flex align-items-center quantity">
                        <div class="main__product--info-quantity-button-right decrement-btn changeQuantity"><i class="fa-solid fa-minus"></i></div>
                        <input class="main__product--info-quantity-input qty-input" min="1" max="100" type="text" value="{{ $data['item_quantity'] }}">
                        <div class="main__product--info-quantity-button-left increment-btn changeQuantity"><i class="fa-solid fa-plus"></i></div>
                    </div>
                </div>
                <div>
                    <span class="text-danger">{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}đ</span>
                </div>
                <div>
                    <button type="button" data-id="{{ $data['item_id'] }}" data-toggle="modal" data-target="#exampleModal2" class="border-0 delete">
                        <li class="fa fa-trash-o"></li>
                    </button>
                </div>
            </div>
            <div class="shopping-cart-styles__styledSellerDiscount">
                <div class="shopping-cart-styles__wraper">
                    <div class="shopping-cart-styles__description">Shop Khuyến Mãi</div>
                    <span class="shopping-cart-styles__seller-coupon">Vui lòng chọn sản phẩm trước</span>
                </div>
            </div>
            @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
        </div>
        @endif
        @endforeach
    </div>
    <div>
        <div class="shopping-cart__block-section">
            <div class="d-flex ali-item-center justify-content-between mb-4">
                <div class="shopping-cart__block-header">Tiki Khuyến mãi</div>
                <div class="d-flex ali-item-center">
                    <span class="shopping-cart__block_select">Có thể chọn 2</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" class="info-icon" background="#ffffff" aria-describedby="popup-4">
                        <path d="M12.75 11.25C12.75 10.8358 12.4142 10.5 12 10.5C11.5858 10.5 11.25 10.8358 11.25 11.25V15.75C11.25 16.1642 11.5858 16.5 12 16.5C12.4142 16.5 12.75 16.1642 12.75 15.75V11.25Z" fill="#787878"></path>
                        <path d="M12.75 8.25C12.75 8.66421 12.4142 9 12 9C11.5858 9 11.25 8.66421 11.25 8.25C11.25 7.83579 11.5858 7.5 12 7.5C12.4142 7.5 12.75 7.83579 12.75 8.25Z" fill="#787878"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12Z" fill="#787878"></path>
                    </svg>
                </div>
            </div>
            <div class="shopping-cart__block-flatform d-flex ali-item-center">
                <svg class="coupon-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.2803 14.7803L14.7803 10.2803C15.0732 9.98744 15.0732 9.51256 14.7803 9.21967C14.4874 8.92678 14.0126 8.92678 13.7197 9.21967L9.21967 13.7197C8.92678 14.0126 8.92678 14.4874 9.21967 14.7803C9.51256 15.0732 9.98744 15.0732 10.2803 14.7803Z" fill="#0B74E5"></path>
                    <path d="M10.125 10.5C10.7463 10.5 11.25 9.99632 11.25 9.375C11.25 8.75368 10.7463 8.25 10.125 8.25C9.50368 8.25 9 8.75368 9 9.375C9 9.99632 9.50368 10.5 10.125 10.5Z" fill="#0B74E5"></path>
                    <path d="M15 14.625C15 15.2463 14.4963 15.75 13.875 15.75C13.2537 15.75 12.75 15.2463 12.75 14.625C12.75 14.0037 13.2537 13.5 13.875 13.5C14.4963 13.5 15 14.0037 15 14.625Z" fill="#0B74E5"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25C3.33579 5.25 3 5.58579 3 6V9.75C3 10.1642 3.33579 10.5 3.75 10.5C4.61079 10.5 5.25 11.1392 5.25 12C5.25 12.8608 4.61079 13.5 3.75 13.5C3.33579 13.5 3 13.8358 3 14.25V18C3 18.4142 3.33579 18.75 3.75 18.75H20.25C20.6642 18.75 21 18.4142 21 18V14.25C21 13.8358 20.6642 13.5 20.25 13.5C19.3892 13.5 18.75 12.8608 18.75 12C18.75 11.1392 19.3892 10.5 20.25 10.5C20.6642 10.5 21 10.1642 21 9.75V6C21 5.58579 20.6642 5.25 20.25 5.25H3.75ZM4.5 9.08983V6.75H19.5V9.08983C18.1882 9.41265 17.25 10.5709 17.25 12C17.25 13.4291 18.1882 14.5874 19.5 14.9102V17.25H4.5V14.9102C5.81181 14.5874 6.75 13.4291 6.75 12C6.75 10.5709 5.81181 9.41265 4.5 9.08983Z" fill="#0B74E5"></path>
                </svg>
                <span>Chọn hoặc nhập Khuyến mãi khác</span>
            </div>
        </div>
        <div class="shopping-cart-styles">
            <div class="shopping-cart-styles-prices_item">
                <div class="d-flex justify-content-between">
                    <span>Tạm tính</span>
                    <span>{{ number_format($total, 2) }}đ</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Giảm giá</span>
                    <span>{{ number_format($total, 2) }}đ</span>
                </div>
            </div>
            <div class="shopping-cart-styles-prices__total d-flex justify-content-between">
                <span>Tổng tiền</span>
                <div class="text-right">
                    <span>{{ number_format($total, 2) }}đ</span>
                    <span class="shopping-cart-styles-prices__value-noted">(đã bao gồm phí VAT nếu có)</span>
                </div>
            </div>
        </div>
        <a href="{{route('checkout',['id' => $id])}}" type="button" class="shopping-cart-styles-button btn btn-danger">Mua hàng</a>
    </div>
</div>
@endif
@else
<div class="row">
    <div class="col-md-12 mycard py-5 text-center">
        <div class="empty">
            <img src="./images/mascot@2x.png" alt="">
            <p>Không có sản phẩm nào trong giỏ hàng của bạn.</p>
            <a href="{{route('home')}}" class="btn btn-upper btn-warning outer-left-xs">Tiếp tục mua sắm</a>
        </div>
    </div>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body d-flex">
                <svg width="24" height="24" class="dialog-content__icon mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V13.5C12.75 13.9142 12.4142 14.25 12 14.25C11.5858 14.25 11.25 13.9142 11.25 13.5V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="#FC820A"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0052 4.45201C10.8464 2.83971 13.1536 2.83971 13.9948 4.45201L20.5203 16.9592C21.3019 18.4572 20.2151 20.25 18.5255 20.25H5.47447C3.78487 20.25 2.69811 18.4572 3.47966 16.9592L10.0052 4.45201ZM12.6649 5.14586C12.3845 4.60842 11.6154 4.60842 11.335 5.14586L4.80953 17.6531C4.54902 18.1524 4.91127 18.75 5.47447 18.75H18.5255C19.0887 18.75 19.4509 18.1524 19.1904 17.6531L12.6649 5.14586Z" fill="#FC820A"></path>
                    <path d="M12 17.25C12.6213 17.25 13.125 16.7463 13.125 16.125C13.125 15.5037 12.6213 15 12 15C11.3787 15 10.875 15.5037 10.875 16.125C10.875 16.7463 11.3787 17.25 12 17.25Z" fill="#FC820A"></path>
                </svg>
                <div>
                    <div class="modal-content__title">Xóa sản phẩm</div>
                    <div class="modal-content__message">Bạn có muốn xóa sản phẩm đang chọn?</div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary xoa delete_cart_data">Xác Nhận</button>
                <button type="button" id="id_delete" class="btn btn-primary" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Link script product -->
<script src="{{ asset('/js/shoppingcart.js') }}"></script>
@endpush