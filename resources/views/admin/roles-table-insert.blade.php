@extends('admin/layout')

@push('styles')
<!-- Link style -->
<link rel="stylesheet" href="{{ asset('/css/admin/user-role-table.css') }}">
@endpush

@section('sidebar-menu')
<!-- Sidebar Menu -->

<!-- /.sidebar-menu -->
@endsection

@section('title')
Insert User Role Table
@endsection

@section('title-sub')
Insert User Role Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Insert User Table</h3>
        <a href="{{ route('admin.roles-table') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store.roles-table') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-4">
            <div class="col-12">
              <label for="name-add" class="form-label">Name Role:</label>
              <input id="name-add" class="w-100 form-control bg-white" type="text" placeholder="Name Role" name="name">
              @if($errors->get('name'))
              @foreach($errors->get('name') as $errorName)
              <span class="text-red">* {{$errorName}}</span>
              @endforeach
              @endif
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
<!-- Link script admin/user-role-table -->
<script src="{{ asset('/js/admin/user-role-table.js') }}"></script>
@endpush