@extends('layouts.admin')
@section('content')
    <form method="POST" action="{{route('admin.procedures.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="categories" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" id="categories" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputName" name="title" aria-describedby="emailHelp" placeholder="Enter title">
            @error('title')<span style="color: #AA0000; font-weight: bold;">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="inputSurname" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputSurname" name="price" aria-describedby="emailHelp" placeholder="Enter procedure price">
            @error('price')<span style="color: #AA0000; font-weight: bold;">{{ $message }}</span> @enderror
        </div>

        <br>
        <a class="btn btn-md btn-info" href="{{route('admin.procedures')}}" role="button">Back</a>
        <button type="submit" class="btn btn-md btn-danger" role="button">Save</button>
    </form>
@endsection
