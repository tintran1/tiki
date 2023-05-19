@extends('admin/layout')

@push('styles')
<!-- Link style -->
<link rel="stylesheet" href="{{ asset('/css/admin/shop-table.css') }}">
@endpush

@section('sidebar-menu')
<!-- Sidebar Menu -->

<!-- /.sidebar-menu -->
@endsection

@section('title')
Shop Table
@endsection

@section('title-sub')
Shop Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Shop Table</h3>
        <a href="{{ route('admin.insert-shop-table') }}" class="btn btn-success">Create</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover mb-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME USER</th>
              <th>NAME SHOP</th>
              <th>AVATAR</th>
              <th>SHOPEEMALL</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Shops as $Shop)
            @if($Shop->shops != null)
            <tr>
              <td>{{ $Shop->shops->id }}</td>
              <td>{{ $Shop->user->name }}</td>
              <td>{{ $Shop->shops->name }}</td>
              <td class="d-flex justify-content-center">
                <img src="{{ $Shop->shops->avatar }}">
              </td>
              @if($Shop->shops->shopee_mall == '1')
              <td>Shopee Mall</td>
              @else
              <td>Không</td>
              @endif
              <td>
                <div class="w-100 d-flex">
                  <button id="edit-{{ $Shop->shops->id }}" class="edit-data btn btn-warning mr-2" data-name="{{ $Shop->shops->name }}" data-avatar="{{ $Shop->shops->avatar }}" data-shopee-mall="{{ $Shop->shops->shopee_mall }}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  <button id="delete-{{ $Shop->shops->id }}" class="delete-data btn btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            @endif
            @endforeach
        </table>
        {{ $Shops->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal-edit')
<div class="modal fade bd-example-modal-lg" id="modal-edit" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-content modal-lg">
    <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLongTitle">Edit Shop Table</h2>
      <button id="x-modal-edit" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>
        <div class="row m-0">
          <input id="id-edit" class="d-none" type="text">
          <div class="col-12">
            <label for="name-edit" class="form-label">Name Shop:</label>
            <input id="name-edit" class="w-100 form-control bg-white" type="text" placeholder="Name">
          </div>
          <div class="col-12">
            <label for="avatar-edit" class="form-label">Avatar Shop:</label>
            <label for="avatar-edit" class="btn btn-primary w-100 col-12">Choose Avatar Shop</label>
            <input id="avatar-edit" class="d-none" type="file" accept="image/*">
            <div class="gallery-avatar-edit"></div>
          </div>
          <div class="col-12">
            <label for="shopee-mall-edit" class="form-label">Shopee Mall:</label>
            <input id="shopee-mall-edit" class="bg-white" type="checkbox">
          </div>
          <div class="col-12">
            <label class="form-label">Avatar Old:</label>
            <img id="avatar-old" class="col-3" alt="">
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
<!-- Link script admin/shop-table -->
<script src="{{ asset('/js/admin/shop-table.js') }}"></script>
@endpush