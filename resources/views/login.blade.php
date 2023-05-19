@extends('layout')

@section('title')
Đăng nhập tài khoản - Mua sắm Online | Tiki Việt Nam
@endsection

@push('child-css')
<!-- Link css -->
<link href="{{asset('/css/login.css')}}" rel="stylesheet">
@endpush

@section('title-header')
Đăng nhập
@endsection

@section('content')
<!-- Begin Main -->
<div class="main d-flex justify-content-center align-items-center">
    <div class="main__form--wrapper d-flex justify-content-end align-items-center">
        <form class="main__form card p-4" action="{{ route('login.add') }}" method="POST">
            @csrf
            <div class="main__form--title mb-4">
                Đăng nhập
            </div>
            @if (Session::has("success"))
            <div class="alert alert-success alert-dismissible fade show">
                {{ Session::get('success') }}
            </div>
            @elseif (Session::has("failed"))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ Session::get('failed') }}
            </div>
            @endif
            <div class="main__form--div mb-3">
                <input id="main__form--div-input-email" type="text" name="email" class="main__form--div-input w-100 px-2" value="{{old('email')}}" placeholder="Email/Số điện thoại/Tên đăng nhập" autocomplete="off">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="main__form--div mb-3">
                <input id="main__form--div-input-pass" type="password" name="password" class="main__form--div-input w-100 px-2" value="{{old('password')}}" placeholder="Mật khẩu">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="main__form--checkbox d-flex align-items-center mb-2">
                <input id="check-pass" class="mr-1" type="checkbox" value="">
                <label class="m-0" for="check-pass">Hiện mật khẩu</label>
            </div>
            <button class="main__form--insert mb-2" type="submit" id="login">
                ĐĂNG NHẬP
            </button>
            <div class="main__form--reset d-flex justify-content-between mb-2">
                <a href="{{ url('reset') }}">Quên mật khẩu</a>
                <a href="">Đăng nhập với SMS</a>
            </div>
            <div class="main__form--or d-flex justify-content-between align-items-center mb-3">
                <div class="main__form--or-line w-100"></div>
                <span class="main__form--or-span mx-3">
                    HOẶC
                </span>
                <div class="main__form--or-line w-100"></div>
            </div>
            <div class="flex items-center justify-end login-with-google-btn">
                <a href="{{ url('login/google') }}" target=”_blank”>
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                </a>
            </div>
            
            <div class="main__form--nav text-center">
                Bạn mới biết đến Tiki? <a href="{{ route('register.list') }}">Đăng ký</a>
            </div>
        </form>
    </div>
</div>
<!-- End Main -->
@endsection

@push('child-scripts')
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
<script src="{{ asset('/js/login.js') }}"></script>
@endpush