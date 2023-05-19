<?php
$tk = $_GET["token"];
$time = $_GET['time'];
$timeplush = date("Y-m-d H:i:s", (int)$time);
$timenow = time();
$t = date("Y-m-d H:i:s", $timenow);
$timetoken =  (strtotime($t) - strtotime($timeplush)) / 60;
?>

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
@if($timetoken >= 5)
<div class="main d-flex justify-content-center align-items-center">
    <div class="main__form--wrapper d-flex justify-content-center align-items-center">
        <div class="main__form card py-4">
            <h1 class="mb-5 text-primary text-center">Mã Token đã hết hạn vui lòng quay lại trang</h1>
            <a type="button" class="btn btn-primary " href="{{url('reset')}}">Reset Password</a>
        </div>
    </div>
</div>
@else
<!-- Begin Main -->
<div class="main d-flex justify-content-center align-items-center">
    <div class="main__form--wrapper d-flex justify-content-center align-items-center">
        <form class="main__form card py-4" action="{{ route('update.password') }}" method="POST">
            @csrf
            @method('PUT')
            @if (Session::has("success"))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('success') }}
            </div>
            @elseif (Session::has("failed"))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ Session::get('failed') }}
            </div>
            @endif
            <div class="main__form--title d-flex align-items-center mb-5">
                <div class="text-center w-100">
                    Thay đổi mật khẩu
                </div>
            </div>
            <input type="hidden" name="token" value="{{ $tk }}">
            <div class="main__form--div mb-4">
                <label> Password </label>
                <input type="password" name="password" class="main__form--div-input w-100 px-2" placeholder="Password">
                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="main__form--div mb-4">
                <label> Confirm Password </label>
                <input type="password" name="confirm_password" class="main__form--div-input w-100 px-2" placeholder="Password">
                {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <button class="main__form--insert mb-4" type="submit">
                TIẾP THEO
            </button>
        </form>
    </div>
</div>
<!-- End Main -->
@endif
@endsection

@push('child-scripts')
<!-- Script -->
<script src="{{ asset('/js/reset.js') }}"></script>
@endpush