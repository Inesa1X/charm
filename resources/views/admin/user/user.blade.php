@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="float-left">Users</h1>
            <a class="btn btn-sm btn-success float-right" href="{{route('admin.user.create') }}" role="button">Create</a>
    </div>
    </div>


    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td style="color: {{$user->role->id == 1 ?  "#f886e6" : ""}}">{{$user->role->name}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('admin.user.edit', $user->id) }}" role="button">Edit</a>

                        <button  type="button" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault();
                            document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                            Delete
                        </button>

                        <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: none">
                             @csrf
                             @method("DELETE")
                        <button>delet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
