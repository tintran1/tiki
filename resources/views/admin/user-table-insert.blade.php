@extends('admin/layout')

@push('styles')
<!-- Link style -->
<link rel="stylesheet" href="{{ asset('/css/admin/user-table.css') }}">
@endpush

@section('sidebar-menu')
<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          TABLE
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.user-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>User Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.roles-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Roles Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.user-role-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>User Role Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.shop-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Shop Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.category-dad-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category Dad Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.category-child-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category Child Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.product-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Product Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.bill-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Bill Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.bill-info-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Bill Info Table</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link active">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          INSERT TABLE
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.insert-user-table') }}" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>User Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-roles-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Roles Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-user-role-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>User Role Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-shop-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Shop Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-category-dad-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category Dad Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-category-child-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Category Child Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-product-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Product Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-bill-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Bill Table</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.insert-bill-info-table') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Bill Info Table</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
@endsection

@section('title')
Insert User Table
@endsection

@section('title-sub')
Insert User Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Insert User Table</h3>
        <a href="{{ route('admin.user-table') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store.user-table') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-4">
            <div class="col-12">
              <label for="name-add" class="form-label">Name:</label>
              <input id="name-add" class="w-100 form-control bg-white" type="text" placeholder="Name" name="name">
              @if($errors->get('name'))
                @foreach($errors->get('name') as $errorName)
                <span class="text-red">* {{$errorName}}</span>
                @endforeach
              @endif
            </div>
            <div class="col-12">
              <label for="email-add" class="form-label">Email:</label>
              <input id="email-add" class="w-100 form-control bg-white" type="text" placeholder="Email" name="email">
              @if($errors->get('email'))
                @foreach($errors->get('email') as $errorEmail)
                <span class="text-red">* {{$errorEmail}}</span>
                @endforeach
              @endif
            </div>
            <div class="col-12">
              <label for="password-add" class="form-label">Password:</label>
              <input id="password-add" class="w-100 form-control bg-white" type="text" placeholder="Password" name="password">
              @if($errors->get('password'))
                @foreach($errors->get('password') as $errorPassword)
                <span class="text-red">* {{$errorPassword}}</span>
                @endforeach
              @endif
            </div>
            <div class="col-12">
              <label for="phone-add" class="form-label">Phone:</label>
              <input id="phone-add" class="w-100 form-control bg-white" type="text" placeholder="Phone" name="phone">
              @if($errors->get('phone'))
                @foreach($errors->get('phone') as $errorPhone)
                <span class="text-red">* {{$errorPhone}}</span>
                @endforeach
              @endif
            </div>
            <div class="col-12">
              <label for="avatar-add" class="form-label">Avatar:</label>
              <label for="avatar-add" class="btn btn-primary w-100 col-12">Choose Avatar</label>
              <input id="avatar-add" class="d-none" type="file" accept="image/*" name="avatar">
              <div class="gallery-avatar-add"></div>
            </div>
            <div class="col-12">
              <label for="birthday-add" class="form-label">Birthday:</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input id="birthday-add" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="birthday">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
              @if($errors->get('birthday'))
                @foreach($errors->get('birthday') as $errorBirthday)
                <span class="text-red">* {{$errorBirthday}}</span>
                @endforeach
              @endif
            </div>
            <div class="col-12">
              <label for="male-add" class="form-label">Male:</label>
              <select id="male-add" class="form-control" name="male">
                <option selected value="0">Nữ</option>
                <option value="1">Nam</option>
              </select>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- Link script admin/user-table -->
<script src="{{ asset('/js/admin/user-table.js') }}"></script>
@endpush