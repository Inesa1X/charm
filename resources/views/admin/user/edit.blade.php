@extends('layouts.admin')
@section('content')

    <h1 style="color: grey">{{$user->name}} {{$user->surname}}</h1>


    <form method="POST" action="{{route('admin.user.update', $user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" aria-describedby="emailHelp" placeholder="{{$user->name}}" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="inputSurname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="inputSurname" name="surname" aria-describedby="emailHelp" placeholder="{{$user->surname}}" value="{{$user->surname}}">
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="{{$user->email}}" value="{{$user->email}}">
        </div>

        <div class="mb-3">
            <label for="password" class="col-form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" value="{{$user->password}}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>

        <div class="mb-3">
            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  value="{{$user->password}}" autocomplete="new-password">
        </div>

        <div class="mb-3">
            <label for="inputSalon" class="form-label">Salon</label>
                @if($user->role_id == 1 || $user->role_id == 2)
                    <select class="form-select" aria-label="Default select example" id="inputSalon" name="salon_id">
                        @foreach($salons as $salon)
                            @if($user->salon_id == $salon->id)
                                <option value="{{$salon->id}}" selected>{{$salon->title}}</option>
                            @else
                                <option value="{{$salon->id}}" >{{$salon->title}}</option>
                            @endif
                        @endforeach
                @else
                    <select disabled class="form-select" aria-label="Default select example" id="inputSalon" name="salon_id">
                        <option selected>________________</option>
                @endif


            </select>
        </div>

        <div class="mb-3">
            <label for="inputSalon" class="form-label">Role</label>
            <select class="form-select" aria-label="Default select example" id="inputSalon" name="role_id">
                @foreach($roles as $role)
                    @if($user->role_id == $role->id)
                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                    @else
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <br>
        <hr>

        <a class="btn btn-md btn-info" href="{{route('admin.user.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-md btn-danger" role="button">Save</button>
    </form>

@endsection
