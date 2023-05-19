@extends('layout')

@section('title')
Đăng nhập tài khoản - Mua sắm Online | Tiki Việt Nam
@endsection

@push('child-css')
<!-- Link css -->
<link href="{{asset('/css/register.css')}}" rel="stylesheet">
@endpush

@section('title-header')
Đăng ký
@endsection

@section('content')
<!-- Begin Main -->
<div class="main d-flex justify-content-center align-items-center">
    <div class="main__form--wrapper d-flex justify-content-end align-items-center">
        <form class="main__form card p-4">
            <div class="main__form--title mb-4">
                Đăng ký
            </div>
            <div class="main__form--div mb-4">
                <input type="text" class="main__form--div-input w-100 px-2" id="name" name="name" placeholder="Tên người dùng">
            </div>
            <div class="main__form--div mb-4">
                <input type="text" class="main__form--div-input w-100 px-2" id="email" name="email" placeholder="Email">
            </div>
            <div class="main__form--div mb-4">
                <input type="password" class="main__form--div-input w-100 px-2" id="password" name="password" placeholder="Password">
            </div>
            <button class="main__form--insert mb-4" name="register" id="register">
                REGISTER
            </button>
            <div id="save_msgList"></div>
            <div class="main__form--or d-flex justify-content-between align-items-center mb-4">
                <div class="main__form--or-line w-100"></div>
                <span class="main__form--or-span mx-3">
                    HOẶC
                </span>
                <div class="main__form--or-line w-100"></div>
            </div>
            <div class="main__form--terms-security text-center mx-5 mb-4">
                Bằng việc đăng kí, bạn đã đồng ý với Tiki về <a>Điều khoản dịch vụ</a> & <a>Chính sách bảo mật</a>
            </div>
            <div class="main__form--nav text-center">
                Bạn đã có tài khoản? <a href="{{ url('login') }}">Đăng nhập</a>
            </div>
        </form>
    </div>
</div>
<!-- End Main -->
@endsection

@push('child-scripts')
<!-- Script firebase -->
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyAZPRuZo_Ouy5wMUUHZs_4Up4CWq7u7tSk",
        authDomain: "login-8bb97.firebaseapp.com",
        projectId: "login-8bb97",
        storageBucket: "login-8bb97.appspot.com",
        messagingSenderId: "559992000787",
        appId: "1:559992000787:web:22869cc41d6a430435cae6",
        measurementId: "G-X23GK1RTWK"
    };
    firebase.initializeApp(config);
</script>
<script src="https://cdn.firebase.com/libs/firebaseui/2.3.0/firebaseui.js"></script>
<!-- Script -->
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
<script src="{{ asset('/js/login.js') }}"></script>
@endpush