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
Category Child Table
@endsection

@section('title-sub')
Category Child Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Category Child Table</h3>
        <a href="{{ route('admin.insert-category-child-table') }}" class="btn btn-success">Create</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover mb-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME CATEGORY DAD</th>
              <th>NAME</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($CategoriesChild as $CategoryChild)
            <tr>
              <td>{{ $CategoryChild->id }}</td>
              <td>{{ $CategoryChild->categoryDad->name }}</td>
              <td>{{ $CategoryChild->name }}</td>
              <td>
                <div class="w-100 d-flex">
                  <button id="edit-{{ $CategoryChild->id }}" class="edit-data btn btn-warning mr-2" data-name="{{ $CategoryChild->name }}" data-id-category-dad="{{ $CategoryChild->categoryDad->id }}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  <button id="delete-{{ $CategoryChild->id }}" class="delete-data btn btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            @endforeach
        </table>
        {{ $CategoriesChild->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal-edit')
<div class="modal fade bd-example-modal-lg" id="modal-edit" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-content modal-lg">
    <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLongTitle">Edit Category Dad Table</h2>
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
        </div>
        <div class="col-12">
              <label for="id-category-dad-edit" class="form-label">Name Category Dad:</label>
              <select id="id-category-dad-edit" class="form-control" name="category_dad_id">
                @foreach ($CategoriesDad as $CategoryDad)
                <option value="{{ $CategoryDad->id }}">{{ $CategoryDad->name }}</option>
                @endforeach
              </select>
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
<!-- Link script admin/category-child-table -->
<script src="{{ asset('/js/admin/category-child-table.js') }}"></script>
@endpush