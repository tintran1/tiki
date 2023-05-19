@extends('admin/layout')

@push('styles')
<!-- Link style -->
<link rel="stylesheet" href="{{ asset('/css/admin/category-child-table.css') }}">
@endpush

@section('sidebar-menu')
<!-- Sidebar Menu -->

<!-- /.sidebar-menu -->
@endsection

@section('title')
Insert Category Child Table
@endsection

@section('title-sub')
Insert Category Child Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Insert Category Child Table</h3>
        <a href="{{ route('admin.category-child-table') }}" class="btn btn-success">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.store.category-child-table') }}" method="post" enctype="multipart/form-data">
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
              <label for="id-category-dad-add" class="form-label">Name Category Dad:</label>
              <select id="id-category-dad-add" class="form-control" name="category_dad_id">
                @foreach ($CategoryDads as $CategoryDad)
                <option value="{{ $CategoryDad->id }}">{{ $CategoryDad->name }}</option>
                @endforeach
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
<!-- Link script admin/category-child-table -->
<script src="{{ asset('/js/admin/category-child-table.js') }}"></script>
@endpush