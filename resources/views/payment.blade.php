@extends('layout.checkout-payment')

@section('title')
Thông tin giao hàng
@endsection
@push('styles')
<!-- Link css product -->
<link href="{{ asset('/css/shopping-payment.css') }}" rel="stylesheet">
@endpush

@section('header')
<header class="shopping__payment-header">
    <div class="shopping__payment-header-Container container">
        <div class="shopping__payment-header-logo">
            <a href="{{route('home')}}"><img src="../images/d8211526b5bdc67aaaef2af9e8cf7dc8.png" alt=""></a>
            <span class="shopping__payment-header-logo_divider"></span>
            <span class="shopping__payment-header-logo_title">Thanh toán</span>
        </div>
        <div class="shopping__payment-header-hotline">
            <a href=""><img src="../images/65e64a529e4ff888c875129d3b11ff29.png" alt=""></a>
        </div>
    </div>
</header>
@endsection

@section('main')
<div class="shopping__payment-main">
    <div class="shopping__payment-main-Container container">
        <div class="shopping__payment-main-left">
            @if(isset($cart_data))
            @if(Cookie::get('shopping_cart'))
            @php $total="0" @endphp
            <div class="shopping__payment-main-left_Shipping">
                <h3 class="shopping__payment-main-left_Shipping_title">Chọn hình thức giao hàng</h3>
                <div class="shopping__payment-main-left_Shipping_StyleShipments">
                @foreach ($cart_data as $data)
                    <div class="shopping__payment-main-left_Shipping_StylePackage">
                        <div class="left-content d-flex align-items-center">
                           <input class="d-none" type="text" id="id_products" value="{{$data['item_id']}}">
                            <div class="shopping__payment-main-left_Shipping_item--list_icon">
                                @php
                                $arrayImage = explode(', ', $data['item_image']);
                                $arrayImageLength = count($arrayImage);
                                echo " <img src='$arrayImage[0]' alt=''>";
                                @endphp
                            </div>
                            @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                            <div class="shopping__payment-main-left_Shipping_item--list_info">
                                <span class="item_info__product-name">{{ $data['item_name'] }}</span>
                                <div class="item-info__second-line">
                                    <div class="item-info_qty">SL:x{{ $data['item_quantity'] }}</div>
                                    <div class="item-info_price">{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}đ</div>
                                    <input class="d-none" type="text" id="quantity" value="{{ $data['item_quantity'] }}">
                                </div>
                            </div> 
                        </div>
                        <div class="right-content">
                            <svg class="fulfillment-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.5C3 4.08579 3.33579 3.75 3.75 3.75H10.5C10.9142 3.75 11.25 4.08579 11.25 4.5V6.75H16.5C16.8442 6.75 17.1441 6.98422 17.2276 7.3181L17.8939 9.98345L20.5854 11.3292C20.8395 11.4562 21 11.7159 21 12V16.5C21 16.9142 20.6642 17.25 20.25 17.25H17.25C17.25 18.9069 15.9069 20.25 14.25 20.25C12.5931 20.25 11.25 18.9069 11.25 17.25H10.5C10.0858 17.25 9.75 16.9142 9.75 16.5V5.25H3.75C3.33579 5.25 3 4.91421 3 4.5ZM12.8306 16.7635C12.834 16.7546 12.8372 16.7455 12.8402 16.7364C13.0499 16.1609 13.602 15.75 14.25 15.75C14.898 15.75 15.4501 16.1609 15.6598 16.7364C15.6628 16.7455 15.666 16.7546 15.6694 16.7635C15.7216 16.9161 15.75 17.0797 15.75 17.25C15.75 18.0784 15.0784 18.75 14.25 18.75C13.4216 18.75 12.75 18.0784 12.75 17.25C12.75 17.0797 12.7784 16.9161 12.8306 16.7635ZM16.8487 15.75C16.3299 14.8533 15.3604 14.25 14.25 14.25C13.1396 14.25 12.1701 14.8533 11.6513 15.75H11.25V8.25H15.9144L16.5224 10.6819C16.5755 10.8943 16.7188 11.0729 16.9146 11.1708L19.5 12.4635V15.75H16.8487ZM3 8.25C3 7.83579 3.33579 7.5 3.75 7.5H7.5C7.91421 7.5 8.25 7.83579 8.25 8.25C8.25 8.66421 7.91421 9 7.5 9H3.75C3.33579 9 3 8.66421 3 8.25ZM13.5 9C13.9142 9 14.25 9.33579 14.25 9.75V10.5H15C15.4142 10.5 15.75 10.8358 15.75 11.25C15.75 11.6642 15.4142 12 15 12H13.5C13.0858 12 12.75 11.6642 12.75 11.25V9.75C12.75 9.33579 13.0858 9 13.5 9ZM4.5 12C4.5 11.5858 4.83579 11.25 5.25 11.25H7.5C7.91421 11.25 8.25 11.5858 8.25 12C8.25 12.4142 7.91421 12.75 7.5 12.75H5.25C4.83579 12.75 4.5 12.4142 4.5 12ZM6 15.75C6 15.3358 6.33579 15 6.75 15H7.5C7.91421 15 8.25 15.3358 8.25 15.75C8.25 16.1642 7.91421 16.5 7.5 16.5H6.75C6.33579 16.5 6 16.1642 6 15.75Z" fill="#38383D"></path>
                            </svg>
                            <p>Được giao bởi TikiNOW Smart Logistics (giao từ Hồ Chí Minh)</p>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="d-flex align-items-center">
                    <span class="shopping__payment-main-left_Shipping_Seller">Shop khuyến mãi</span>
                    <div class="d-flex align-items-center">
                        <span class="shopping__payment-main-left_Shipping_Seller-hint">Nhập hoặc chọn mã</span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="more" color="#787878" size="24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" style="color: rgb(120, 120, 120);">
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            @endif
            @endif
            <div class="shopping__payment-main-left_Xu">
                <h3 class="shopping__payment-main-left_title">Thanh toán bằng Tiki Xu</h3>
                <p class="shopping__payment-main-left_Additional">Bạn cần thêm Tiki Xu?
                    <a href="">Giao dịch tại đây</a>
                </p>
            </div>
            <div class="shopping__payment-main-left_payment">
                <h3 class="shopping__payment-main-left_payment--title">Chọn hình thức thanh toán</h3>
                <div class="form-check d-flex">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <g fill="none" fill-rule="evenodd">
                            <g>
                                <g>
                                    <g>
                                        <path fill="#242424" fill-rule="nonzero" d="M2.18 0c.875 0 1.585.71 1.585 1.585l-.001.297h7.9c1.084 0 1.609.306 2.425 1.34l.147.19 1.61 2.235h14.416c.96 0 1.738.793 1.738 1.772v11.515c0 .979-.778 1.772-1.738 1.772H11.15c-.96 0-1.737-.793-1.737-1.772l-.001-5.251h-1.38c-.828 0-1.617-.377-2.35-.993-.166-.14-.321-.285-.465-.433l-.25-.271-.06-.07H3.731c-.15.72-.788 1.26-1.551 1.26h-.595C.71 13.176 0 12.466 0 11.591V1.585C0 .71.71 0 1.585 0h.595zm28.016 6.588H12.167l2.975 2.708c.787.716.335 1.666-.674 2.155-.876.425-1.951.438-2.806-.092l-.168-.113-1.142-1.039v8.68c0 .484.387.878.864.878h18.98c.477 0 .863-.394.863-.879V7.466c0-.484-.386-.878-.863-.878zM3.764 10.975H5.37l.172.233.101.122.07.08c.17.19.362.382.573.56.522.438 1.058.713 1.574.764l.17.008h1.381v-2.628h-.626c-1.04 0-1.778-.358-2.219-.979l-.09-.137c-.239-.395-.334-.793-.354-1.185l-.004-.168h.94c0 .29.057.591.224.866.23.382.635.62 1.312.657l.19.005h1.83l1.474 1.344c.533.388 1.327.399 1.97.087.5-.243.608-.47.451-.612l-3.22-2.93.004-1.15v-.265l3.446.002-1.21-1.678c-.734-.963-1.029-1.157-1.865-1.157h-7.9v8.161zM2.18.793h-.595c-.404 0-.737.302-.786.693l-.006.1V11.59c0 .404.302.738.693.787l.1.006h.594c.404 0 .737-.302.786-.693l.006-.1V1.585c0-.404-.302-.737-.693-.786l-.1-.006z" transform="translate(-308 -50) translate(308 56)" />
                                        <g fill="#0D5CB6" transform="translate(-308 -50) translate(308 56) translate(16 8.47)">
                                            <circle cx="4.706" cy="4.706" r="4.706" />
                                        </g>
                                    </g>
                                    <g fill="#FFF" fill-rule="nonzero">
                                        <path d="M2.77 2.67l-1.544-.372c-.23-.055-.39-.234-.39-.434 0-.25.24-.452.536-.452h.965c.215 0 .42.057.591.162.079.047.19.032.258-.026l.298-.252c.092-.077.077-.203-.026-.27-.32-.207-.71-.32-1.121-.32H2.3v-.53C2.3.08 2.207 0 2.09 0h-.418c-.115 0-.209.079-.209.176v.53h-.092c-.8 0-1.442.58-1.366 1.268.054.489.498.885 1.058 1.02l1.475.355c.229.055.39.234.39.434 0 .25-.241.452-.536.452h-.965c-.215 0-.42-.056-.592-.161-.078-.048-.188-.032-.257.025l-.298.252c-.092.077-.077.203.025.27.321.208.711.32 1.122.32h.036v.53c0 .097.094.176.21.176h.418c.115 0 .209-.079.209-.176v-.53h.035c.597 0 1.16-.3 1.352-.776.266-.654-.19-1.319-.918-1.495z" transform="translate(-308 -50) translate(308 56) translate(18.824 10.353)" />
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <label class="form-check-label ml-2" for="flexRadioDefault1">
                        Thanh toán tiền mặt khi nhận hàng
                    </label>
                </div>
                <div>
                    <div class="form-check d-flex">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <g fill="none" fill-rule="evenodd">
                                <g>
                                    <g>
                                        <g>
                                            <path fill="#242424" fill-rule="nonzero" d="M21.85 4c1.05 0 1.9.85 1.9 1.9v12.2c0 1.05-.85 1.9-1.9 1.9H1.9C.85 20 0 19.15 0 18.1V5.9C0 4.85.85 4 1.9 4h19.95zm0 1H1.9c-.459 0-.837.343-.893.787L1 5.9v12.2c0 .459.343.837.787.893L1.9 19h19.95c.459 0 .837-.343.893-.787l.007-.113V5.9c0-.459-.343-.837-.787-.893L21.85 5z" transform="translate(-360 -50) translate(360 50) translate(3 7)" />
                                            <path fill="#242424" d="M24.786 15c-.303 0-.549-.247-.549-.553 0-.306.246-.447.55-.447h.567c.595 0 1.233-.598 1.233-1.18V2.213c0-.61-.627-1.248-1.233-1.248H7.864c-.588 0-1.214.638-1.214 1.248v.53c0 .305-.098.552-.4.552-.304 0-.55-.247-.55-.553v-.53C5.7.993 6.67 0 7.864 0h17.49c1.21 0 2.196.992 2.196 2.212V12.82c0 1.181-1.006 2.179-2.196 2.179h-.568zM8.38 14H3.32c-.176 0-.32-.223-.32-.5s.144-.5.32-.5h5.06c.176 0 .32.223.32.5s-.144.5-.32.5M5.599 16H3.25C3.112 16 3 15.777 3 15.5s.112-.5.251-.5H5.6c.139 0 .251.223.251.5s-.112.5-.251.5" transform="translate(-360 -50) translate(360 50) translate(3 7)" />
                                            <g fill="#0D5CB6">
                                                <path d="M2.375 5C1.088 5 0 3.856 0 2.5 0 1.146 1.088 0 2.375 0 3.685 0 4.75 1.122 4.75 2.5 4.75 3.88 3.685 5 2.375 5z" transform="translate(-360 -50) translate(360 50) translate(3 7) translate(11.4 12)" />
                                                <path d="M6.175 5C4.888 5 3.8 3.856 3.8 2.5 3.8 1.146 4.888 0 6.175 0 7.485 0 8.55 1.122 8.55 2.5 8.55 3.88 7.485 5 6.175 5z" opacity=".5" transform="translate(-360 -50) translate(360 50) translate(3 7) translate(11.4 12)" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <label class="form-check-label ml-2" for="flexRadioDefault1">
                            <div class="method_content-title">
                                <span>Thanh toán bằng thẻ quốc tế Visa, Master, JCB</span>
                            </div>
                            <div class="method-content__sub-title--credit_card_list">
                                <div class="method-StyledCardList">
                                    <img src="../images/70b4ec228ed2a642f4b90fd7353c96d5.png.webp" alt="">
                                    <img src="../images/icon-visa.png" alt="">
                                    <img src="../images/658eff6fbc0f508a234bc4e31d2aaa60.png.webp" alt="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.11676in" height="1.5in" viewBox="0 0 152.407 108">
                                        <g>
                                            <rect width="152.407" height="108" style="fill: none" />
                                            <g>
                                                <rect x="60.4117" y="25.6968" width="31.5" height="56.6064" style="fill: #ff5f00" />
                                                <path d="M382.20839,306a35.9375,35.9375,0,0,1,13.7499-28.3032,36,36,0,1,0,0,56.6064A35.938,35.938,0,0,1,382.20839,306Z" transform="translate(-319.79649 -252)" style="fill: #eb001b" />
                                                <path d="M454.20349,306a35.99867,35.99867,0,0,1-58.2452,28.3032,36.00518,36.00518,0,0,0,0-56.6064A35.99867,35.99867,0,0,1,454.20349,306Z" transform="translate(-319.79649 -252)" style="fill: #f79e1b" />
                                                <path d="M450.76889,328.3077v-1.1589h.4673v-.2361h-1.1901v.2361h.4675v1.1589Zm2.3105,0v-1.3973h-.3648l-.41959.9611-.41971-.9611h-.365v1.3973h.2576v-1.054l.3935.9087h.2671l.39351-.911v1.0563Z" transform="translate(-319.79649 -252)" style="fill: #f79e1b" />
                                            </g>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="shopping__payment-main-left_payment-StyledWrapper">
                        <button class="shopping__payment-main-left_payment-StyledWrapper__AddNewButton">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                <defs>
                                    <path id="xkcauyy2ma" d="M14 7.987L8.007 7.987 8.007 14 5.993 14 5.993 7.987 0 7.987 0 6.013 5.993 6.013 5.993 0 8.007 0 8.007 6.013 14 6.013z" />
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <g transform="translate(-43 -320) rotate(180 33.5 172) translate(5 5)">
                                                <mask id="oh8fgo72db" fill="#fff">
                                                    <use xlink:href="#xkcauyy2ma" />
                                                </mask>
                                                <use fill="#787878" xlink:href="#xkcauyy2ma" />
                                                <g fill="#0D5CB6" mask="url(#oh8fgo72db)">
                                                    <path d="M0 0H24V24H0z" transform="translate(-5 -5)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span>Thêm thẻ mới</span>
                        </button>
                        <div class="shopping__payment-main-left_payment-StyledWrapper__BannerList">
                            <div class="block-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <g>
                                            <g>
                                                <path d="M0 0H20V20H0z" transform="translate(-127 -320) translate(127 320)" />
                                                <path fill="#0D5CB6" d="M8.586 1.449c.708-.876 2.044-.877 2.753 0l.778.963c.14.173.37.247.584.19l1.196-.322c1.087-.293 2.169.492 2.227 1.618l.063 1.236c.012.222.153.417.361.497l1.156.443c1.052.402 1.466 1.672.851 2.617L17.88 9.73c-.122.187-.122.428 0 .614l.675 1.038c.614.943.203 2.214-.85 2.618l-1.157.442c-.207.08-.35.275-.36.497l-.064 1.236c-.058 1.125-1.138 1.911-2.227 1.618l-1.196-.321c-.215-.058-.444.017-.584.19l-.778.962c-.708.876-2.043.878-2.752 0l-.779-.962c-.14-.173-.369-.248-.584-.19l-1.195.321c-1.087.293-2.17-.491-2.227-1.618l-.064-1.236c-.011-.222-.153-.417-.36-.497L2.22 14c-1.051-.403-1.466-1.673-.85-2.618l.675-1.038c.12-.186.12-.427 0-.614L1.37 8.691c-.614-.943-.202-2.214.85-2.617l1.157-.443c.208-.08.35-.275.361-.497l.064-1.236c.058-1.124 1.137-1.91 2.227-1.618l1.195.321c.215.058.444-.016.584-.19zm1.814.759c-.225-.279-.65-.28-.875 0l-.778.962c-.44.544-1.16.779-1.836.597l-1.196-.322c-.346-.092-.69.157-.708.515l-.064 1.236c-.036.699-.481 1.312-1.134 1.562l-1.156.443c-.335.128-.467.532-.271.832l.675 1.038c.382.586.382 1.344 0 1.93l-.675 1.038c-.195.3-.065.704.27.833l1.157.442c.653.25 1.098.863 1.134 1.562l.064 1.236c.019.358.362.608.708.515l1.196-.322c.152-.04.306-.06.459-.06.526 0 1.036.235 1.377.657l.778.963c.225.278.65.279.875 0l.779-.963c.44-.544 1.16-.778 1.835-.597l1.196.322c.346.093.69-.156.708-.515l.064-1.236c.036-.699.481-1.312 1.135-1.562l1.156-.442c.334-.128.466-.532.27-.833l-.675-1.038c-.381-.586-.381-1.344 0-1.93l.675-1.038c.196-.3.065-.704-.27-.832l-1.156-.443c-.654-.25-1.099-.863-1.135-1.562l-.064-1.236c-.018-.358-.361-.608-.708-.515l-1.195.322c-.676.182-1.396-.053-1.836-.597zm2.577 4.753c.21.21.233.535.07.77l-.07.083-5.632 5.633c-.117.117-.272.176-.426.176-.155 0-.31-.059-.427-.176-.21-.21-.233-.535-.07-.77l.07-.084 5.632-5.632c.236-.236.618-.236.853 0zm-1.03 4.249c.666 0 1.207.54 1.207 1.206 0 .666-.541 1.207-1.207 1.207-.665 0-1.207-.541-1.207-1.207 0-.665.542-1.206 1.207-1.206zM7.522 6.784c.666 0 1.207.542 1.207 1.207 0 .666-.541 1.207-1.207 1.207-.665 0-1.207-.541-1.207-1.207 0-.665.542-1.207 1.207-1.207z" transform="translate(-127 -320) translate(127 320)" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Ưu đãi thanh toán thẻ
                            </div>
                            <div class="banner-list">
                                <div class="styles__StyledBanner">
                                    <div class="row">
                                        <div class="row-title">Giảm 200k</div>
                                        <div class="row-image">
                                            <img src="../images/658eff6fbc0f508a234bc4e31d2aaa60.png.webp" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <div class="row__subtitle">Đơn từ 1tr</div>
                                            <div class="row__warning">Đã hết lượt</div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="row__info" aria-describedby="popup-10">
                                            <path d="M12.75 11.25C12.75 10.8358 12.4142 10.5 12 10.5C11.5858 10.5 11.25 10.8358 11.25 11.25V15.75C11.25 16.1642 11.5858 16.5 12 16.5C12.4142 16.5 12.75 16.1642 12.75 15.75V11.25Z" fill="#0d5cb6"></path>
                                            <path d="M12.75 8.25C12.75 8.66421 12.4142 9 12 9C11.5858 9 11.25 8.66421 11.25 8.25C11.25 7.83579 11.5858 7.5 12 7.5C12.4142 7.5 12.75 7.83579 12.75 8.25Z" fill="#0d5cb6"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12Z" fill="#0d5cb6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="styles__StyledBanner">
                                    <div class="row">
                                        <div class="row-title">Freeship</div>
                                        <div class="row-image">
                                            <img src="../images/70b4ec228ed2a642f4b90fd7353c96d5.png.webp" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <div class="row__subtitle">TikiCARD</div>
                                            <div class="row__warning">Không giới hạn</div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="row__info" aria-describedby="popup-12">
                                            <path d="M12.75 11.25C12.75 10.8358 12.4142 10.5 12 10.5C11.5858 10.5 11.25 10.8358 11.25 11.25V15.75C11.25 16.1642 11.5858 16.5 12 16.5C12.4142 16.5 12.75 16.1642 12.75 15.75V11.25Z" fill="#0d5cb6"></path>
                                            <path d="M12.75 8.25C12.75 8.66421 12.4142 9 12 9C11.5858 9 11.25 8.66421 11.25 8.25C11.25 7.83579 11.5858 7.5 12 7.5C12.4142 7.5 12.75 7.83579 12.75 8.25Z" fill="#0d5cb6"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12Z" fill="#0d5cb6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping__payment-main-right">
            @foreach( $user as $users)   
            @php
            $id_user=  $users->users_id
            @endphp 
            <input type="text" class="d-none" id="shippings_id" value="{{$id}}">
            <input type="text" class="d-none" id="user_id" value="{{$users->users_id}}">
                <div class="shopping__payment-main-right_AddressBlock">
                    <div class="block-header d-flex align-items-center justify-content-between">
                        <h3 class="block-header__title">Giao tới</h3>
                        <a class="block-header__nav" href="{{route('checkout',['id' => $id_user])}}">Thay đổi</a>
                    </div>
                    <div class="customer_info d-flex align-items-center">
                        <p class="customer_info__name">{{$users->name}}</p>
                        <i></i>
                        <p class="customer_info__phone">{{$users->phone}}</p>
                    </div>
                    <div class="address">
                        <span class="address_type--home">Nhà</span>{{$users->address}},{{$users->ward}},{{$users->district}},{{$users->city}}
                    </div>
                </div>
            @endforeach
            <div class="shopping__payment-main-right_styles">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="shopping__payment-main-right_styles_title">Tiki Khuyến Mãi</div>
                    <div class="shopping__payment-main-right_styles_usage d-flex align-items-center">
                        <span>Có thể chọn 2</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" class="info-icon" background="#ffffff" aria-describedby="popup-1">
                            <path d="M12.75 11.25C12.75 10.8358 12.4142 10.5 12 10.5C11.5858 10.5 11.25 10.8358 11.25 11.25V15.75C11.25 16.1642 11.5858 16.5 12 16.5C12.4142 16.5 12.75 16.1642 12.75 15.75V11.25Z" fill="#787878"></path>
                            <path d="M12.75 8.25C12.75 8.66421 12.4142 9 12 9C11.5858 9 11.25 8.66421 11.25 8.25C11.25 7.83579 11.5858 7.5 12 7.5C12.4142 7.5 12.75 7.83579 12.75 8.25Z" fill="#787878"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12Z" fill="#787878"></path>
                        </svg>
                    </div>
                </div>
                <div class="shopping__payment-main-right_styles_coupon d-flex align-items-center">
                    <svg class="coupon-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.2803 14.7803L14.7803 10.2803C15.0732 9.98744 15.0732 9.51256 14.7803 9.21967C14.4874 8.92678 14.0126 8.92678 13.7197 9.21967L9.21967 13.7197C8.92678 14.0126 8.92678 14.4874 9.21967 14.7803C9.51256 15.0732 9.98744 15.0732 10.2803 14.7803Z" fill="#0B74E5"></path>
                        <path d="M10.125 10.5C10.7463 10.5 11.25 9.99632 11.25 9.375C11.25 8.75368 10.7463 8.25 10.125 8.25C9.50368 8.25 9 8.75368 9 9.375C9 9.99632 9.50368 10.5 10.125 10.5Z" fill="#0B74E5"></path>
                        <path d="M15 14.625C15 15.2463 14.4963 15.75 13.875 15.75C13.2537 15.75 12.75 15.2463 12.75 14.625C12.75 14.0037 13.2537 13.5 13.875 13.5C14.4963 13.5 15 14.0037 15 14.625Z" fill="#0B74E5"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 5.25C3.33579 5.25 3 5.58579 3 6V9.75C3 10.1642 3.33579 10.5 3.75 10.5C4.61079 10.5 5.25 11.1392 5.25 12C5.25 12.8608 4.61079 13.5 3.75 13.5C3.33579 13.5 3 13.8358 3 14.25V18C3 18.4142 3.33579 18.75 3.75 18.75H20.25C20.6642 18.75 21 18.4142 21 18V14.25C21 13.8358 20.6642 13.5 20.25 13.5C19.3892 13.5 18.75 12.8608 18.75 12C18.75 11.1392 19.3892 10.5 20.25 10.5C20.6642 10.5 21 10.1642 21 9.75V6C21 5.58579 20.6642 5.25 20.25 5.25H3.75ZM4.5 9.08983V6.75H19.5V9.08983C18.1882 9.41265 17.25 10.5709 17.25 12C17.25 13.4291 18.1882 14.5874 19.5 14.9102V17.25H4.5V14.9102C5.81181 14.5874 6.75 13.4291 6.75 12C6.75 10.5709 5.81181 9.41265 4.5 9.08983Z" fill="#0B74E5"></path>
                    </svg>
                    <span class="ml-2">Chọn hoặc nhập Khuyến mãi khác</span>
                </div>
                <div></div>
            </div>
            <div class="shopping__payment-main-right_toggle d-flex align-items-center justify-content-between">
                <svg class="asa-freeship-icon" width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="10" fill="#ffffff"></circle>
                    <g clip-path="url(#clip0_17203_537963)">
                        <path d="M11.4017 8.33958H12.9358L10 1L7.06418 8.33958H8.76754C8.97199 8.33958 9.15584 8.2151 9.23177 8.02527L10 6.1047L10.7054 7.86812C10.8193 8.15286 11.0951 8.33958 11.4017 8.33958Z" fill="url(#paint0_linear_17203_537963)"></path>
                        <path d="M12.6745 12.7909L10 11.2125L7.3255 12.7909L8.20759 10.5857C8.29842 10.3586 8.21168 10.0992 8.00256 9.97243L6.72163 9.19591L3.5 17.25L10 13.4139L16.5 17.25L13.2784 9.19591L11.9974 9.97243C11.7883 10.0992 11.7016 10.3586 11.7924 10.5857L12.6745 12.7909Z" fill="url(#paint1_linear_17203_537963)"></path>
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_17203_537963" x1="10" y1="6.5" x2="10" y2="17" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FF424E"></stop>
                            <stop offset="1" stop-color="#5E5CE6"></stop>
                        </linearGradient>
                        <linearGradient id="paint1_linear_17203_537963" x1="10" y1="6.5" x2="10" y2="17" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FF424E"></stop>
                            <stop offset="1" stop-color="#5E5CE6"></stop>
                        </linearGradient>
                        <clipPath id="clip0_17203_537963">
                            <rect width="13" height="16.25" fill="white" transform="translate(3.5 1)"></rect>
                        </clipPath>
                    </defs>
                </svg>
                <div class="shopping__payment-main-right_toggle-freeship">
                    <span class="freeship-content__title">Astra Freeship</span>
                    <span class="freeship-content__sup-title">Dùng Astra để giảm phí vận chuyển</span>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div>
            </div>
            <div class="shopping__payment-main-right_Invoice">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
                    <label class="form-check-label" for="flexCheckDisabled">
                        <div>
                            <p class="invoice-title">Yêu cầu hoá đơn</p>
                            <p class="invoice-note">Tiki Trading chỉ xuất hoá đơn điện tử</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="shopping__payment-main-right_Summary">
                <div class="shopping__payment-main-right_Summary-header">
                    <div class="d-flex justify-content-between mb-1">
                        <h3 class="block_header__title">Đơn hàng</h3>
                        <a href="" class="block_header__nav">Thay đổi</a>
                    </div>
                    <div class="block_header__title_sub-title d-flex align-items-center">
                        <p class="sub-title_text">{{ $data['item_quantity'] }} sản phẩm.</p>
                        <p class="sub-title_link">Thu gọn
                            <svg class="sub-title-link__arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 8.46967C10.2626 8.17678 10.7374 8.17678 11.0303 8.46967L14.0303 11.4697C14.3232 11.7626 14.3232 12.2374 14.0303 12.5303L11.0303 15.5303C10.7374 15.8232 10.2626 15.8232 9.96967 15.5303C9.67678 15.2374 9.67678 14.7626 9.96967 14.4697L12.4393 12L9.96967 9.53033C9.67678 9.23744 9.67678 8.76256 9.96967 8.46967Z" fill="#0B74E5"></path>
                            </svg>
                        </p>
                    </div>
                </div>
                <div class="shopping__payment-main-right_Summary-Styles">
                    <div class="d-flex justify-content-between">
                        <div class="summary-label">Tạm tính</div>
                        <div class="summary-value">{{ number_format($total, 2) }}</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="summary-label">Phí vận chuyển</div>
                        <div class="summary-value">0</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="summary-label">Khuyến mãi vận chuyển
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" class="info-icon" background="#ffffff" aria-describedby="popup-19">
                                <path d="M12.75 11.25C12.75 10.8358 12.4142 10.5 12 10.5C11.5858 10.5 11.25 10.8358 11.25 11.25V15.75C11.25 16.1642 11.5858 16.5 12 16.5C12.4142 16.5 12.75 16.1642 12.75 15.75V11.25Z" fill="#808089"></path>
                                <path d="M12.75 8.25C12.75 8.66421 12.4142 9 12 9C11.5858 9 11.25 8.66421 11.25 8.25C11.25 7.83579 11.5858 7.5 12 7.5C12.4142 7.5 12.75 7.83579 12.75 8.25Z" fill="#808089"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM4.5 12C4.5 7.85786 7.85786 4.5 12 4.5C16.1421 4.5 19.5 7.85786 19.5 12C19.5 16.1421 16.1421 19.5 12 19.5C7.85786 19.5 4.5 16.1421 4.5 12Z" fill="#808089"></path>
                            </svg>
                        </div>
                        <div class="summary-value">0</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="summary-label">Giảm giá</div>
                        <div class="summary-value">0</div>
                    </div>
                </div>
                <div class="Styles-divider"></div>
                <div class="shopping__payment-main-right_Summary-Order-total d-flex justify-content-between">
                    <div class="order-total_label">Tổng tiền</div>
                    <div class="order-total_value">
                        <div class="order-total_value__total" id="transaction">{{ number_format($total, 2) }}</div>
                        <div class="order-total_value__additional-text">(Đã bao gồm VAT nếu có)</div>
                    </div>
                </div>
                <p class="shopping__payment-main-right_Summary_sed">* Số Astra thực nhận có thể thay đổi theo chính sách thưởng khi nhận hàng.</p>
                <button type="button" class="shopping__payment-main-right_Summary_button btn btn-danger mb-2">Đặt hàng</button>
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AZk_5czTyOWZRCSVHdy0gBBnZq39AlXTyyuu38HJMy0Hr0VeTSyA14a6oosBRYMX5C3Abjy0LC_gsyyK&currency=USD"></script>
<script src="{{ asset('/js/payment.js') }}"></script>
@endpush