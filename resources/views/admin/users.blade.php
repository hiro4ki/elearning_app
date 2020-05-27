@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h3 class="col-sm-10">Categories</h3>
    <a class="btn col-sm-2 btn-info" href="{{ route('admin.add_category') }}">+ Add Category</a>
  </div>

  <table class="table table-bordered mt-3">
    <thead class="thead-light text-center">
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>

    @foreach ($categories as $category)
    <tr>
      <td>
        <div>{{ $category->title }}</div>
      </td>
      <td>{{ $category->description }}</td>
      <td class="card bg-white text-white" style="position: relative;">
        <img class="card-img" src="/storage/category_images/{{ $category->has_image() ? $category->id : '0' }}.jpg" alt="カードの画像" style="filter: blur(0px); width: 10rem;">
        <div class="card-img-overlay pt-5">
          <div class="d-flex justify-content-center">
            <a href="{{ route('admin.edit_category', ['id' => $category->id]) }}" class="btn btn-secondary mr-1">
              Edit
            </a>
            <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
              @method("DELETE")
              @csrf
              <button type="submit button" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
        {{-- <div class="d-flex justify-content-center">
        <a href="{{ route('admin.edit_category', ['id' => $category->id]) }}" class="btn btn-secondary mr-1">
          Edit
        </a>
        <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
          @method("DELETE")
          @csrf
          <button type="submit button" class="btn btn-danger">Delete</button>
        </form>
      </div> --}}
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection