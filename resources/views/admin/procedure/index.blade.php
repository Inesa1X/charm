@extends('layouts.admin')
@section('content')
    <div class="procedure-container">
        <h1 class="procedures">Procedures</h1><a href="{{route('admin.procedures.create')}}"><button type="button" class="btn btn-lg btn-outline-info add-procedure">Add Procedure</button></a>
        @foreach($categories as $category)
            <h3 class="procedure-title">{{$category->title}}</h3>
            @foreach($category->procedures as $procedure)
                <span class="procedure">

                    <a href="{{route('admin.procedures.edit', $procedure->id)}}">{{$procedure->title}}</a>
                    <form method="POST" action="{{route('admin.procedures.destroy', $procedure->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-dark">Delete</button>
                    </form>

                </span>
            @endforeach
            <hr>
        @endforeach
    </div>
@endsection
