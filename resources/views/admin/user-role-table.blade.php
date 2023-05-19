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
User Role Table
@endsection

@section('title-sub')
User Role Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">User Role Table</h3>
        <a href="{{ route('admin.insert-user-role-table') }}" class="btn btn-success">Create</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover mb-3">
          <thead>
            <tr>
              <th>NAME USERS</th>
              <th>NAME ROLE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($UserRoles as $UserRole)
            <tr>
              <td>{{ $UserRole->user->name }}</td>
              <td>{{ $UserRole->role->name }}</td>
              <td>
                <div class="w-100 d-flex">
                  <button id="delete-{{ $UserRole->id }}" class="delete-data btn btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            @endforeach
        </table>
        {{ $UserRoles->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal-edit')
<div class="modal fade bd-example-modal-lg" id="modal-edit" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-content modal-lg">
    <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLongTitle">Edit User Table</h2>
      <button id="x-modal-edit" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>
        <div class="row m-0">
          <input id="id-edit" class="d-none" type="text">
          <div class="col-12">
            <label for="name-edit" class="form-label">Name:</label>
            <input id="name-edit" class="w-100 form-control bg-white" type="text" placeholder="Name">
          </div>
          <div class="col-12">
            <label for="email-edit" class="form-label">Email:</label>
            <input id="email-edit" class="w-100 form-control bg-white" type="text" placeholder="Email">
          </div>
          <div class="col-12">
            <label for="password-edit" class="form-label">Password:</label>
            <input id="password-edit" class="w-100 form-control bg-white" type="text" placeholder="Password">
          </div>
          <div class="col-12">
            <label for="phone-edit" class="form-label">Phone:</label>
            <input id="phone-edit" class="w-100 form-control bg-white" type="text" placeholder="Phone">
          </div>
          <div class="col-12">
            <label for="avatar-edit" class="form-label">Avatar:</label>
            <label for="avatar-edit" class="btn btn-primary w-100 col-12">Choose Avatar</label>
            <input id="avatar-edit" class="d-none" type="file" accept="image/*">
            <div class="gallery-avatar-edit"></div>
          </div>
          <div class="col-12">
            <label class="form-label">Avatar Old:</label>
            <img id="avatar-old" class="col-3" alt="">
          </div>
          <div class="col-12">
            <label for="birthday-edit" class="form-label">Birthday:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input id="birthday-edit" type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <label for="male-edit" class="form-label">Male:</label>
            <select id="male-edit" class="form-control">
              <option selected value="0">Nữ</option>
              <option value="1">Nam</option>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button id="close-modal-edit" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button id="edit-data" class="btn btn-primary" data-dismiss="modal">Save</button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- Link script admin/user-role-table -->
<script src="{{ asset('/js/admin/user-role-table.js') }}"></script>
@endpush