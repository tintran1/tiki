<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Link icon tiki -->
    <link rel="icon" href="/images/tiki-corporation-logo.png">

    <!-- Link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Link css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @stack('child-css')
    
    <title>@yield('title')</title>
</head>

<body>
    <!-- Begin Header -->
    <header class="header container d-flex justify-content-between align-items-center my-3">
        <div class="header__navbar d-flex align-items-center">
            <a href="/index" class="header__navbar--logo mr-3">
                <img src="/images/270be9859abd5f5ec5071da65fab0a94.png" alt="">
            </a>
            <div class="header__navbar--title">
                @yield('title-header')
            </div>
        </div>
        <div class="header__support">
            <a href="">Bạn cần giúp đỡ?</a>
        </div>
    </header>
    <!-- End Header -->
    @yield('content')
    <!-- Begin Footer -->
    <footer class="footer">
        <div class="footer__nav d-flex justify-content-between container border-bottom">
            <div class="footer__nav--div">
                <h6 class="footer__nav--div-title">
                    CHĂM SÓC KHÁCH HÀNG
                </h6>
                <a class="d-block">Trung tâm trợ giúp</a>
                <a class="d-block">Tiki Blog</a>
                <a class="d-block">Tiki Mall</a>
                <a class="d-block">Hướng Dẫn Mua Hàng</a>
                <a class="d-block">Hướng Dẫn Bán Hàng</a>
                <a class="d-block">Thanh Toán</a>
                <a class="d-block">Tiki Xu</a>
                <a class="d-block">Vận Chuyển</a>
                <a class="d-block">Trả Hàng & Hoàn Tiền</a>
                <a class="d-block">Chăm Sóc Khách Hàng</a>
                <a class="d-block">Chính Sách Bảo Hành</a>
            </div>
            <div class="footer__nav--div">
                <h6 class="footer__nav--div-title">
                    VỀ TIKI
                </h6>
                <a class="d-block">Giới Thiệu Về Tiki Việt Nam</a>
                <a class="d-block">Tuyển Dụng</a>
                <a class="d-block">Điều Khoản Tiki</a>
                <a class="d-block">Chính Sách Bảo Mật</a>
                <a class="d-block">Chính Hãng</a>
                <a class="d-block">Kênh Người Bán</a>
                <a class="d-block">Flash Sales</a>
                <a class="d-block">Chương Trình Tiếp Thị Liên Kết Tiki</a>
                <a class="d-block">Liên Hệ Với Truyền Thông</a>
            </div>
            <div class="footer__nav--div">
                <h6 class="footer__nav--div-title">
                    THANH TOÁN
                </h6>
                <img src="/images/footer-1.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-2.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-3.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-4.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-5.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-6.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-7.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-8.png" class="footer__nav--div-logo" alt="">
                <h6 class="footer__nav--div-title-2">
                    ĐƠN VỊ VẬN CHUYỂN
                </h6>
                <img src="/images/footer-9.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-10.png" class="footer__nav--div-logo" alt="">
                <img src="/images//footer-11.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-12.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-13.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-14.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-15.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-16.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-17.png" class="footer__nav--div-logo" alt="">
                <img src="/images/footer-18.png" class="footer__nav--div-logo" alt="">
            </div>
            <div class="footer__nav--div">
                <h6 class="footer__nav--div-title">
                    THEO DÕI CHÚNG TÔI TRÊN
                </h6>
                <div>
                    <i class="fa-brands fa-facebook"></i>
                    <a href="https://www.facebook.com/tabaphu/" target="_blank">Facebook</a>
                </div>
                <div>
                    <i class="fa-brands fa-square-instagram"></i>
                    <a href="https://www.instagram.com/tabaphu/" target="_blank">Instagram</a>
                </div>
                <div>
                    <i class="fa-brands fa-linkedin"></i>
                    <a href="https://www.linkedin.com/in/tabaphu/" target="_blank">LinkedIn</a>
                </div>
            </div>
            <div class="footer__nav--div">
                <h6 class="footer__nav--div-title">
                    TẢI ỨNG DỤNG TIKI NGAY THÔI
                </h6>
                <div class="d-flex">
                    <img src="/images/footer-19.png" class="footer__nav--div-scan" alt="">
                    <div>
                        <img src="/images/footer-20.png" class="footer__nav--div-app" alt="">
                        <img src="/images/footer-21.png" class="footer__nav--div-app" alt="">
                        <img src="/images/footer-22.png" class="footer__nav--div-app" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__address container">
            <div class="footer__address--country d-flex justify-content-between py-5">
                <div class="w-25">
                    © 2022 Tiki. Tất cả các quyền được bảo lưu.
                </div>
                <div class="text-center w-75">
                    Quốc gia & Khu vực: <a>Singapore</a>|
                    <a>Indonesia</a>|
                    <a>Đài Loan</a>|
                    <a>Thái Lan</a>|
                    <a>Malaysia</a>|
                    <a>Việt Nam</a>|
                    <a>Philippines</a>|
                    <a>Brazil</a>|
                    <a>México</a>|
                    <a>Colombia</a>|
                    <a>Chile</a>|
                    <a>Poland</a>
                </div>
            </div>
            <div class="footer__address--policy text-center pb-5">
                <a>CHÍNH SÁCH BẢO MẬT</a>|
                <a>QUY CHẾ HOẠT ĐỘNG</a>|
                <a>CHÍNH SÁCH VẬN CHUYỂN</a>|
                <a>CHÍNH SÁCH TRẢ HÀNG VÀ HOÀN TIỀN</a>
            </div>
            <div class="footer__address--img d-flex justify-content-center pb-2">
                <img src="/images/footer-23.png" class="mr-2" alt="">
                <img src="/images/footer-23.png" class="mr-2" alt="">
                <img src="/images/footer-23.png" alt="">
            </div>
            <div class="footer__address--name text-center pb-3">
                Công ty TNHH Tiki
            </div>
            <div class="footer__address--name text-center pb-1">
                Địa chỉ: Tầng 4-5-6, Tòa nhà Capital Place, số 29 đường Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam. Tổng đài hỗ trợ: 19001221 - Email: cskh@hotro.shopee.vn
            </div>
            <div class="footer__address--name text-center pb-1">
                Chịu Trách Nhiệm Quản Lý Nội Dung: Nguyễn Đức Trí - Điện thoại liên hệ: 024 73081221 (ext 4678)
            </div>
            <div class="footer__address--name text-center pb-1">
                Mã số doanh nghiệp: 0106773786 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 10/02/2015
            </div>
            <div class="footer__address--name text-center pb-3">
                © 2015 - Bản quyền thuộc về Công ty TNHH Tiki
            </div>
        </div>
    </footer>
    <!-- End Footer -->
</body>

<!-- Script js bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Script jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('child-scripts')
</html>