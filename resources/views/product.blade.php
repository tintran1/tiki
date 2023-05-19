@extends('header-footer-index')

@push('styles')
<!-- Link css product -->
<link href="{{ asset('/css/product.css') }}" rel="stylesheet">
@endpush

@section('main')
<!-- Begin main navbar-->
<div class="main__navbar--wrapper py-4">
    <div class="main__navbar d-flex align-items-center container">
        <a href="{{ route('home') }}">Trang chủ</a>
        <span class="px-2">></span>
        @foreach ($CategoryDad as $CategoryDad1)
        <a href="{{ route('category-dad', ['id' => $CategoryDad1->id]) }}">{{ $CategoryDad1->name }}</a>
        @endforeach
        <span class="px-2">></span>
        @foreach ($Product as $Product1)
        <a href="{{ route('category-child', ['id' => $Product1->categoryChild->id]) }}">{{ $Product1->categoryChild->name }}</a>
        @endforeach
        <span class="px-2">></span>
        @foreach ($Product as $Product2)
        <p class="m-0">{{ $Product2->title }}</p>
        @endforeach
    </div>
</div>
<!-- End main navbar -->

<!-- Begin main product-->
<div class="main__product--wrapper">
    <div class="main__product--card card p-2 container mb-3">
        <div class="main__product d-flex justify-content-between">
            @foreach ($Product as $Product3)
            <div class="main__product--img-video">
                @if(isset($Product3->video))
                <video class="mb-2" src="{{ $Product3->video }}" controls></video>
                @else
                @php
                $arrayImage = explode(', ', $Product3->img);
                echo "<img class='mb-2' src='$arrayImage[0]'>" ;
                @endphp
                @endif
                <div class="main__product--img-video-slider d-flex justify-content-between container bg-white">
                    <i class="main__product--img-video-slider-prev fa-solid fa-chevron-left"></i>
                    <i class="main__product--img-video-slider-next fa-solid fa-chevron-right"></i>
                    <div class="main__product--img-video-slider-main-wrapper">
                        <div class="main__product--img-video-slider-main">
                            <div class="d-flex">
                                @php
                                $arrayImage = explode(', ', $Product3->img);
                                $arrayImageLength = count($arrayImage);
                                if (isset($Product3->video)) {
                                for ($i = 0; $i < $arrayImageLength; $i++) { 
                                    echo "
                                        <img class='main__product--img-video-slider-main-item me-2' src='$arrayImage[$i]' alt=''>
                                    " ; }; 
                                } else { for ($i=1; $i < $arrayImageLength; $i++) { echo "
                                        <img class='main__product--img-video-slider-main-item me-2' src='$arrayImage[$i]' alt=''>
                                    " ; }; }
                                 @endphp </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main__product--info">
                    <p class="main__product--info-title">{{ $Product3->title }}</p>
                    <div class="main__product--info-assess d-flex align-items-center mb-3">
                        0 <i class="fa-solid fa-star ms-1"></i>
                        <span class="px-3">|</span>
                        0 Đánh Giá
                        <span class="px-3">|</span>
                        0 Đã Bán
                    </div>
                    <div class="main__product--info-sold p-3 mb-3">
                        <span>₫</span><span>{{ $Product3->sold }}</span>
                    </div>
                   <div class="product_data">
                        <input class="product_id" type="hidden"  value="{{ $Product3->id }}"></input>
                        <div class="main__product--info-quantity mb-4">
                            <p>Số Lượng</p>
                            <div class="d-flex align-items-center quantity">
                                <button class="main__product--info-quantity-button-right decrement-btn"><i class="fa-solid fa-minus"></i></button>
                                <input class="main__product--info-quantity-input qty-input"  maxlength="2" type="text" value="1">
                                <button class="main__product--info-quantity-button-left increment-btn"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        
                        </div>
                        <div class="main__product--info-action">
                        @if (Auth::user())
                                <input type="text"  class="d-none" id="id_users" value="{{Auth::user()->id}}">
                             <button type="button" class="btn btn-danger add-shoppingcart">
                                Chọn mua
                            </button>
                        @else
                            <a href="{{ route('login.list') }}" class="btn btn-danger">Chọn mua</a>  
                        @endif
                            <button type="button" class="btn btn-outline-primary ">
                                Trả góp
                            </button>
                            <button type="button" class="btn btn-outline-primary">
                                <i class="fa-regular fa-comment main__product--info-action-icon-chat"></i>
                                <p class="mb-0 main__product--info-action-chat">Chát</p>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    <!-- End main product -->

    <!-- Begin main shop-->
    <div class="main__shop--wrapper">
        <div class="main__shop--card card p-2 container mb-3">
            <div class="main__shop d-flex justify-content-between">
                <div class="main__shop--info d-flex justify-content-between align-items-center">
                    @foreach ($Product as $Product4)
                    <div class="main__shop--info-avatar rounded-circle d-flex align-items-center">
                        <img src="{{ $Product4->shop->avatar }}" alt="">
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End main product -->
    @endsection

    @push('scripts')
    <!-- Link script product -->
    <script src="{{ asset('/js/product.js') }}"></script>
    @endpush