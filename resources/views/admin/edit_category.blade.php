@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h2>Edit Category / Questions</h2>
      {{-- <hr> --}}
      <div class="card mt-4">
        <div class="card-header p-3">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{ route('admin.category_update', ['id' => $category->id]) }}" method="POST">
            @method("PATCH")
            @csrf
            <div class="form-group">
              <label for="text1">Title:</label>
              <input name="title" type="text" id="text1" class="form-control" value="{{ $category->title }}" required>
            </div>
            <div class=" form-group">
              <label for="textarea1">Description:</label>
              <textarea name="description" id="textarea1" class="form-control"
                required>{{ $category->description }}</textarea>
            </div>

            <div class="col-md-12 text-right">
              <div class="buttons">
                <button type="submit" class="btn btn-primary btn-sm px-5 py-2">Save</button>
                <a href="{{ route('admin.users') }}" name="back" role="button" class="btn btn-secondary mr-2">
                  Back
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-borderless mt-5">
        <thead class="thead-light">
          <tr class="text-center">
            <th class="h3">Questions</th>
          </tr>
        </thead>
        @foreach ($category->questions as $question)
        <tr>
          <td class="d-flex">
            <div class="col-md-6 align-self-center">
              <a class="h4" href="{{ route('admin.edit_question', ['id' => $question->id]) }}">
                {{ $question->question }}
              </a>
            </div>
            <div class="col-md-6 text-right">
              <form action="{{ route('question.destroy', ['id' => $question->id]) }}" method="POST">
                @method("DELETE")
                @csrf
                <button type="submit button" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </table>

    </div>
  </div>
</div>
@endsection