@extends('layout')

@section('title')
Tiki Việt Nam | Mua và Bán Trên Ứng Dụng Di Động Hoặc Website
@endsection

@push('child-css')
<!-- Link css -->
<link href="{{ asset('/css/reset.css') }}" rel="stylesheet">
@endpush

@section('title-header')
Đặt lại mật khẩu
@endsection

@section('content')

<!-- Begin Main -->
<div class="main d-flex justify-content-center align-items-center">
    <div class="main__form--wrapper d-flex justify-content-center align-items-center">
        <form class="main__form card py-4" action="{{ route('reset.password') }}" method="POST">
            @csrf
            <div class="main__form--title d-flex align-items-center mb-5">
                <a href="{{ url('login') }}" class="fa-solid fa-arrow-left px-3"></a>
                <div class="text-center w-100">
                    Đặt lại mật khẩu
                </div>
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
            <div class="main__form--div mb-4">
                <input type="text" name="email" class="main__form--div-input w-100 px-2" placeholder="Email/Số Điện thoại" autocomplete="off">
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <button class="main__form--insert mb-4" type="submit">
                TIẾP THEO
            </button>
        </form>
    </div>
</div>
<!-- End Main -->

@endsection

@push('child-scripts')
<!-- Script -->
<script src="{{ asset('/js/reset.js') }}"></script>
@endpush