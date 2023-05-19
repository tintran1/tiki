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
        <a href="{{ route('admin.user-role-table') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store.user-role-table') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-4">
            <div class="col-12">
              <label for="id-user-add" class="form-label">User:</label>
              <select id="id-user-add" class="form-control" name="users_id">
                @foreach ($Users as $User)
                <option value="{{ $User->id }}">{{ $User->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="id-role-add" class="form-label">Role:</label>
              <select id="id-role-add" class="form-control" name="role_id">
                @foreach ($Roles as $Role)
                <option value="{{ $Role->id }}">{{ $Role->name }}</option>
                @endforeach
              </select>
            </div>
            @if (Session::has("failed"))
            <span class="text-danger">*{{ Session::get('failed') }}</span>
            @endif
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