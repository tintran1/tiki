@extends('layout.checkout-payment')

@push('styles')
<!-- Link css product -->
<link href="{{ asset('/css/shopping-checkout.css') }}" rel="stylesheet">
@endpush

<!-- header -->
@section('header')
<header class="shopping-checkout__stylesHeader">
    <div class="shopping-checkout__header-container">
        <div class="shopping-checkout__header-logo">
            <a href="{{route('home')}}"><i class="shopping-checkout__header-icon"></i></a>
        </div>
        <div class="shopping-checkout__header-process">
            <div class="shopping-checkout__header-process__step">
                <div class="shopping-checkout__header-process__step-text">Đăng nhập</div>
                <div class="shopping-checkout__header-process__step-bar">
                    <div class="shopping-checkout__header-process__step-fillcolor"></div>
                </div>
                <div class="shopping-checkout__header-process__step-cricle">1</div>
            </div>
            <div class="shopping-checkout__header-process__step">
                <div class="shopping-checkout__header-process__step-text">Địa chỉ giao hàng</div>
                <div class="shopping-checkout__header-process__step-bar">
                    <div class="shopping-checkout__header-process__step-fillcolor"></div>
                </div>
                <div class="shopping-checkout__header-process__step-cricle">2</div>
            </div>
            <div class="shopping-checkout__header-process__step">
                <div class="shopping-checkout__header-process__step-text">Thanh toán & Đặt mua</div>
                <div class="shopping-checkout__header-process__step-bar">
                    <div class="shopping-checkout__header-process__step-fillcolor"></div>
                </div>
                <div class="shopping-checkout__header-process__step-cricle">3</div>
            </div>
        </div>
        <div class="shopping-checkout__header-hotline">
            <img src="../images/hotline.png" alt="">
        </div>
    </div>
</header>
@endsection

<!-- main -->
@section('main')
<div class="shopping-checkout__main">
    <div class="shopping-checkout__main-container">      
        <div class="shopping-checkout__main-AddressList">
            <h3 class="shopping-checkout__main-AddressList_title">2. Địa chỉ giao hàng</h3>
            <h5 class="shopping-checkout__main-AddressList_text">Chọn địa chỉ giao hàng có sẵn bên dưới:</h5>
            <div class="d-flex">
            @foreach ($user as $users)
               @php
               $id= $users->id
               @endphp
                <div class="shopping-checkout__main-AddressList_list">
                    <p class="name" id="name_user">{{ $users->name }}</p>
                    <p class="address" id="address_user">Địa chỉ: {{ $users->address }}, {{$users->city}}, {{$users->district}}</p>
                    <p class="city">Việt Nam</p>
                    <p class="phone" id="phone_user">Điện thoại: {{ $users->phone }}</p>
                    <p class="action mb-0">
                        <a  href="{{route('cart',['id' => $id])}}" type="button" class="btn saving-address">Giao đến địa chỉ này</a>
                        <button type="button" class="btn Gpiogm edit-address">Sửa</button>
                    </p>
                </div>
                @endforeach
            </div>
        </div>
       
        <p class="shopping-checkout__main-ShippingPage">Bạn muốn giao hàng đến địa chỉ khác?
            <span class="Gpiogm">Thêm địa chỉ giao hàng mới</span>
        </p>
        <div class="shopping-checkout__main-styles">
            <div class="shopping-checkout__main-styles--form">
                @if(Auth::user())
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for="">Họ tên</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" id="name" placeholder="Nhập họ tên" maxlength="50">
                    </div>
                    <input class="d-none" type="text" id="id" value="{{ Auth::user()->id }}">
                    <p class="save_msgList" id="name"></p>
                @endif
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for="">Điện thoại di động</label>
                        <input type="text" id="phones" name="phone" placeholder="Nhập số điện thoại">  
                        <p class="save_msgList" id="phone"></p>                     
                    </div>
                    
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for="">Tỉnh/Thành phố</label>
                        <div class="shopping-checkout__main-styles--form_address">
                            <select class="shopping-checkout__main-styles--form_select" id="city">
                                <option id="citys" value="" selected>Chọn Tỉnh/Thành</option>
                            </select>    
                        </div>
                        <p class="save_msgList" id="cityss"></p>
                    </div>
                    <p class="save_msgList"></p>
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for="">Quận/Huyện</label>
                        <div class="shopping-checkout__main-styles--form_address">
                            <select class="shopping-checkout__main-styles--form_select" id="district">
                                <option id="districted" value="" selected>Chọn Quận/Huyện</option>
                            </select>      
                        </div>
                        <p class="save_msgList" id="districts"></p>  
                    </div>
                    <p class="save_msgList"></p>
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for="">Phường/Xã</label>
                        <div class="shopping-checkout__main-styles--form_address">
                            <select  class="shopping-checkout__main-styles--form_select" id="ward">
                                <option id="commune" value="" selected>Chọn Phường/Xã</option>
                            </select>                         
                        </div>
                        <p class="save_msgList" id="wards"></p>
                    </div>
             
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for="">Địa chỉ</label>
                        <textarea type="textera"  placeholder="Ví dụ: 52, đường Đinh Tiên Hoàng" id="addresss" class="shopping-checkout__main-styles--textera"></textarea>
                        <p class="save_msgList" id="address"></p>
                    </div>
                  
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for=""></label>
                        <span class="shopping-checkout__main-styles--hint">Để nhận hàng thuận tiện hơn, bạn vui lòng cho Tiki biết loại địa chỉ.</span>
                    </div>
                    <div class="d-flex ">
                        <label class="shopping-checkout__main-styles-address" styles="padding-top: 0">Loại địa chỉ</label>
                        <div class="form-check mr-1">
                            <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Nhà riêng / Chung cư
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Cơ quan / Công ty
                            </label>
                        </div>
                    </div>
                    <div class="form-check shopping-checkout__main-styles--form-check d-flex align-items-center">
                        <label class="shopping-checkout__main-styles--form-check-label"></label>
                        <input class="form-check-input shopping-checkout__main-styles--form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label shopping-checkout__main-styles--form-check-label" for="flexCheckIndeterminate">Sử dụng địa chỉ này làm mặc định.
                        </label>
                    </div>
                    <div class="shopping-checkout__main-styles--form_information">
                        <label for=""></label>
                        <div class="shopping-checkout__main-styles--button_group">
                            <button class="shopping-checkout__main-styles--button_cancel">Hủy bỏ</button>
                            <button class="shopping-checkout__main-styles--button_update">Giao đến địa chỉ này</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Link script product -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="{{ asset('/js/checkout.js') }}"></script>
@endpush