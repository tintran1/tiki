@extends('admin/layout')

@push('styles')
<!-- Link style -->
<link rel="stylesheet" href="{{ asset('/css/admin/category-dad-table.css') }}">
@endpush

@section('sidebar-menu')
<!-- Sidebar Menu -->

<!-- /.sidebar-menu -->
@endsection

@section('title')
Insert Category Dad Table
@endsection

@section('title-sub')
Insert Category Dad Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Insert Category Dad Table</h3>
        <a href="{{ route('admin.category-dad-table') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store.category-dad-table') }}" method="post" enctype="multipart/form-data">
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
              <label for="image-add" class="form-label">Image:</label>
              <label for="image-add" class="btn btn-primary w-100 col-12">Choose Image</label>
              <input id="image-add" class="d-none" type="file" accept="image/*" name="image[]">
              <div class="gallery-image-add"></div>
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
<!-- Link script admin/category-dad-table -->
<script src="{{ asset('/js/admin/category-dad-table.js') }}"></script>
@endpush