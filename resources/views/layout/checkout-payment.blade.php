<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>

    <!-- Link icon Tiki -->
    <link rel="icon" href="/images/tiki-corporation-logo.png">

    <!-- Link css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/checkout-payment.css') }}">

    <!-- Link css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @stack('styles')
</head>

<body>

    <!-- header -->
    <header >
        @yield('header')
    </header>

    <!-- main -->
    <div>
        @yield('main')
    </div>

    <!-- fotter -->
    <div class="shopping-checkout__fotter">
        <div class="shopping-checkout__fotter-container">
            <p class="shopping-checkout__fotter-terms_text">Bằng việc tiến hành Đặt Mua, khách hàng đồng ý với các Điều Kiện Giao Dịch Chung được ban hành bởi Tiki:</p>
            <p class="shopping-checkout__fotter-terms mb-0">
                <a href="" class="pr-2">Quy chế hoạt động</a>|
                <a href="" class="pr-2 pl-2">Chính sách giải quyết khiếu nại</a>|
                <a href="" class="pr-2 pl-2">Chính sách bảo hành</a>|
                <a href="" class="pr-2 pl-2">Chính sách bảo mật thanh toán</a>|
                <a href="" class="pl-2">Chính sách bảo mật thông tin cá nhân</a>
            </p>
            <p class="shopping-checkout__fotter-coppy">© 2019 - Bản quyền của Công Ty Cổ Phần Ti Ki - Tiki.vn</p>
        </div>
    </div>

    <div class="shopping-checkout__styles-calling">
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="message">
            <g clip-path="url(#a)" fill="#fff">
                <path d="M7 8a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2H8a1 1 0 0 1-1-1ZM8 11a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2H8Z"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.946 2h4.108c1.359 0 2.454 0 3.333.09.908.092 1.695.288 2.39.753a5 5 0 0 1 1.38 1.38c.465.695.661 1.482.754 2.39C22 7.492 22 8.587 22 9.946v.108c0 1.359 0 2.454-.09 3.333-.092.908-.288 1.695-.753 2.39a4.997 4.997 0 0 1-1.38 1.38c-.653.437-1.386.636-2.224.735-.678.08-1.483.1-2.434.106l-1.33 2.66c-.737 1.474-2.84 1.474-3.578 0l-1.33-2.66c-.951-.005-1.756-.025-2.434-.106-.838-.099-1.571-.298-2.225-.735a5 5 0 0 1-1.38-1.38c-.465-.695-.66-1.482-.753-2.39C2 12.508 2 11.413 2 10.054v-.108c0-1.359 0-2.454.09-3.333.092-.908.288-1.695.753-2.39a5 5 0 0 1 1.38-1.38c.695-.466 1.482-.661 2.39-.754C7.492 2 8.587 2 9.946 2Zm-3.13 2.08c-.75.075-1.17.217-1.483.426a3 3 0 0 0-.827.827c-.21.313-.35.733-.427 1.482C4.001 7.581 4 8.575 4 10s.001 2.419.08 3.185c.075.75.217 1.169.426 1.482a3 3 0 0 0 .827.827c.294.197.682.333 1.349.412.683.081 1.566.093 2.819.094a1 1 0 0 1 .893.553L12 19.763l1.606-3.21a1 1 0 0 1 .893-.553c1.253-.001 2.136-.013 2.82-.094.666-.079 1.054-.215 1.348-.412a3 3 0 0 0 .827-.827c.21-.313.35-.733.427-1.482.078-.766.079-1.76.079-3.185s-.001-2.419-.08-3.185c-.075-.75-.217-1.169-.426-1.482a3 3 0 0 0-.827-.827c-.313-.21-.733-.35-1.482-.427C16.419 4.001 15.425 4 14 4h-4c-1.425 0-2.419.001-3.185.08Z"></path>
            </g>
            <defs>
                <clipPath id="a">
                    <path fill="#fff" transform="translate(2 2)" d="M0 0h20v20H0z"></path>
                </clipPath>
            </defs>
        </svg>
        <svg class="shopping-checkout__styles-svg d-none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18">
            <path fill="#0d5cb6" fill-rule="evenodd" d="M4.85.8a1.438 1.438 0 011.69.822L8.19 5.47a1.439 1.439 0 01-.298 1.575l-1.164 1.18c.403.601.858 1.166 1.36 1.689.52.502 1.085.956 1.686 1.358l1.18-1.165a1.44 1.44 0 011.58-.296h.001l3.845 1.65a1.438 1.438 0 01.822 1.688m0 .002l-.798 3.02-.001.003a1.437 1.437 0 01-1.439 1.076l-.015-.001a15.3 15.3 0 01-9.855-4.33l-.013-.013A15.3 15.3 0 01.75 3.034 1.44 1.44 0 011.825 1.6L4.85.8m.332 1.463l-2.93.775a13.8 13.8 0 003.896 8.814 13.8 13.8 0 008.816 3.895l.774-2.93-3.76-1.612-1.576 1.554a.75.75 0 01-.914.108 13.788 13.788 0 01-2.472-1.903 13.957 13.957 0 01-1.883-2.452.75.75 0 01.108-.914L6.794 6.02 5.182 2.263z" clip-rule="evenodd"></path>
        </svg>
    </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</html>