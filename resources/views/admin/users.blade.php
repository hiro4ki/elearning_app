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
      <td>{{ $category->title }}</td>
      <td>{{ $category->description }}</td>
      <td class="d-flex justify-content-center">
        <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-secondary mr-1">
          Edit
        </a>
        <a class="btn btn-primary mr-1" href="/admin/category/{{ $category->id }}/question/add">Add question</a>
        <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
          @method("DELETE")
          @csrf
          <button type="submit button" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection