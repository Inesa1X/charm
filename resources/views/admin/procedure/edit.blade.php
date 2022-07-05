@extends('layouts.admin')
@section('content')
    <h1><a href="{{route('admin.procedures')}}">back</a></h1>

    <form method="POST" action="{{route('admin.procedures.update', $procedure->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="inputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title" aria-describedby="emailHelp" value="{{$procedure->title}}">
            @error('title')<span style="color: #AA0000; font-weight: bold;">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="inputSurname" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputSurname" name="price" aria-describedby="emailHelp" value="{{$procedure->price}}">
            @error('price')<span style="color: #AA0000; font-weight: bold;">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" id="categories" name="category_id">
                @foreach($categories as $category)
                    @if($category->id == $procedure->category_id )
                        <option selected value="{{$category->id}}">{{$category->title}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
@endsection
