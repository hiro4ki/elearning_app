@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
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
              <textarea rows="4" name="description" id="textarea1" class="form-control"
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

      <div class="text-right">
        <a class="btn col-sm-2 btn-info mt-5" href="{{ route('admin.add_question', ['id' => $category->id]) }}">+ Add
          Question</a>
      </div>
      <table class="table mt-1">
        <thead class="thead-light">
          <tr class="text-center">
            <th>#</th>
            <th scope="col">Question</th>
            <th scope="col">Choice1</th>
            <th scope="col">Choice2</th>
            <th scope="col">Choice3</th>
            <th scope="col">Choice4</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category->questions as $key => $question)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td class="h4">
              {{ $question->question }}
            </td>
            @foreach ($question->choices as $choice)
            <td class="text-center {{ $choice->is_correct ? 'text-success' : '' }}">
              {{ $choice->choice }}
            </td>
            @endforeach
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('admin.edit_question', ['id' => $question->id]) }}">
                <button type="btn" class="btn btn-primary mr-1">Edit</button>
              </a>
              <form action="{{ route('question.destroy', ['id' => $question->id]) }}" method="POST">
                @method("DELETE")
                @csrf
                <button type="submit button" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection