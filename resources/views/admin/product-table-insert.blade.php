@extends('admin/layout')

@push('styles')
<!-- Link style -->
<link rel="stylesheet" href="{{ asset('/css/admin/product-table.css') }}">
@endpush

@section('sidebar-menu')
<!-- Sidebar Menu -->

<!-- /.sidebar-menu -->
@endsection

@section('title')
Insert Product Table
@endsection

@section('title-sub')
Insert Product Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Insert Product Table</h3>
        <a href="{{ route('admin.product-table') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store.product-table') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row mb-4">
            <div class="col-12">
              <label for="id-category-child-add" class="form-label">Name Category Child:</label>
              <select id="id-category-child-add" class="form-control" name="category_child_id">
                @foreach ($CategoryChilds as $CategoryChild)
                <option value="{{ $CategoryChild->id }}">{{ $CategoryChild->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="id-shop-add" class="form-label">Name Shop:</label>
              <select id="id-shop-add" class="form-control" name="shop_id">
                @foreach ($Shops as $Shop)
                <option value="{{ $Shop->id }}">{{ $Shop->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="title-add" class="form-label">Title:</label>
              <input id="title-add" class="w-100 form-control bg-white" type="text" placeholder="Title" name="title">
            </div>
            <div class="col-12">
              <label for="image-add" class="form-label">Images:</label>
              <label for="image-add" class="btn btn-primary w-100 col-12">Choose Images</label>
              <input id="image-add" class="d-none" type="file" accept="image/*" name="image[]" multiple>
              <div class="gallery-image-add"></div>
            </div>
            <div class="col-12">
              <label for="video-add" class="form-label">Videos:</label>
              <label for="video-add" class="btn btn-primary w-100 col-12">Choose Videos</label>
              <input id="video-add" class="d-none" type="file" accept="video/*" name="video[]" multiple>
              <div class="gallery-video-add"></div>
            </div>
            <div class="col-12">
              <label for="sold-add" class="form-label">Sold:</label>
              <input id="sold-add" class="w-100 form-control bg-white" type="text" placeholder="Sold" name="sold">
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
<!-- Link script admin/product-table -->
<script src="{{ asset('/js/admin/product-table.js') }}"></script>
@endpush