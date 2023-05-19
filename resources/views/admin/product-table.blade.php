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
Product Table
@endsection

@section('title-sub')
Product Table
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h3 class="card-title w-100 d-flex align-items-center">Product Table</h3>
        <a href="{{ route('admin.insert-product-table') }}" class="btn btn-success">Create</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover mb-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME CATEGORY CHILD</th>
              <th>NAME SHOP</th>
              <th>TITLE</th>
              <th>IMAGES</th>
              <th>VIDEO</th>
              <th>SOLD</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($Product as $Products)
            <tr>
              <td>{{ $Products->id }}</td>
              <td>{{ $Products->categoryChild->name }}</td>
              <td>{{ $Products->shop->name }}</td>
              <td>{{ $Products->title }}</td>
              <td>
                @php
                $arrayImage = explode(', ', $Products->img);
                $arrayImageLength = count($arrayImage);
                for ($i = 0; $i < $arrayImageLength; $i++) { 
                  echo "<img src='$arrayImage[$i]'>" ; 
                }; 
                @endphp 
              </td>
              <td>
                @php
                if($Products->video != "") {
                  $arrayVideo = explode(', ', $Products->video);
                  $arrayVideoLength = count($arrayVideo);
                  for ($i = 0; $i < $arrayVideoLength; $i++) {
                    echo "<video src='$arrayVideo[$i]' controls></video>" ; 
                  };
                } 
                @endphp 
              </td>
              <td>{{ $Products->sold }}</td>
              <td>
                <div class="w-100 d-flex">
                  <button id="edit-{{ $Products->id }}" class="edit-data btn btn-warning mr-2" data-img="{{ $Products->img }}" data-video="{{ $Products->video }}" data-title="{{ $Products->title }}" data-sold="{{ $Products->sold }}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  <button id="delete-{{ $Products->id }}" class="delete-data btn btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            @endforeach
        </table>
        {{ $Product->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal-edit')
<div class="modal fade bd-example-modal-lg" id="modal-edit" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-content modal-lg">
    <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLongTitle">Edit Product Table</h2>
      <button id="x-modal-edit" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>
        <div class="row m-0">
          <input id="id-edit" class="d-none" type="text">
          <div class="col-12">
            <label for="title-edit" class="form-label">Title:</label>
            <input id="title-edit" class="w-100 form-control bg-white" type="text" placeholder="Name">
          </div>
          <div class="col-12">
            <label for="image-edit" class="form-label">Image:</label>
            <label for="image-edit" class="btn btn-primary w-100 col-12">Choose Image</label>
            <input id="image-edit" class="d-none" type="file" accept="image/*" multiple>
            <div class="gallery-image-edit"></div>
          </div>
          <input id="image-old" class="d-none" type="text">
          <div class="col-12">
            <label for="video-edit" class="form-label">Video:</label>
            <label for="video-edit" class="btn btn-primary w-100 col-12">Choose Video</label>
            <input id="video-edit" class="d-none" type="file" accept="video/*" multiple>
            <div class="gallery-video-edit"></div>
          </div>
          <input id="video-old" class="d-none" type="text">
          <div class="col-12">
            <label for="sold-edit" class="form-label">Sold:</label>
            <input id="sold-edit" class="w-100 form-control bg-white" type="text" placeholder="Sold">
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
<!-- Link script admin/product-table -->
<script src="{{ asset('/js/admin/product-table.js') }}"></script>
@endpush