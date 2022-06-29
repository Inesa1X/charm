@extends('layouts.user')
@section('content')

    {{-- <h1>{{$salon->city->title}}, {{$salon->title}}, {{$procedure->title}}, {{$procedure->price}}</h1>--}}


    <div class="booking-container">
        {{--    <div class="booking-img" style="background-image: url({{$salon->image_slug}})">adsf</div>--}}

        <div class="card booking-card">

            @if($errors->any())
                <div class="alert alert-success booking-alert" role="alert" style="">

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h4 class="alert-heading">Well done!</h4>
                    <p><strong>You have successfully booked!</strong></p>

                    <hr>
                    <span>Salon: </span><strong>{{$salon->title}}</strong><br>
                    <span>Procedure: </span><strong>{{$procedure->title}}</strong><br>
                    <span>City: </span><span>{{$salon->street}}</span>, <strong>{{$salon->city->title}}</strong><br>
                    <span>Price: </span><strong>€{{$procedure->price}}</strong><br>
                    <span>Date: </span><strong>{{$procedure->date}}</strong>


                </div>
            @endif
            <div class="booking-card-header">
                <div class="top clear-fix">
                    <h1>
                        <strong>{{$salon->title}}</strong>
                    </h1>
                    <p class="booking-address">{{$salon->street}}, {{$salon->city->title}}</p>
                </div>

                <div class="bottom">
                    <p class="booking-procedure-title">{{$procedure->category->title}} • {{$procedure->title}}</p><p class="booking-price">€{{$procedure->price}}</p>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title booking-card-title">Choose Master</h3>

                <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    {{-- @method('PUT') --}}
                    <select name="master" class="form-select" aria-label="Default select example" id="masters">
                        <option data-bookings="[]" selected disabled value="0">Choose Master</option>

                        @foreach($salon->users as $user)
                            <option id="{{$user->id}}" data-bookings="{{$user->master_bookings}}" value="{{$user}}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <h3 class="booking-card-title">Choose Time</h3>

                    <input type="text" style="display: none;" name="city" value="{{$salon->city->title}}">
                    <input type="text" style="display: none;" name="salon" value="{{$salon->title}}">
                    <input type="text" style="display: none;" name="salon_address" value="{{$salon->street}}">
                    <input type="text" style="display: none;" name="category" value="{{$procedure->category->title}}">
                    <input type="text" style="display: none;" name="procedure" value="{{$procedure->title}}">
                    <input type="number" style="display: none;" name="user" value="{{Auth::user()->id}}">
                    <input type="text" style="display: none;" name="user_email" value="{{Auth::user()->email}}">
                    <input type="number" style="display: none;" name="price" value="{{$procedure->price}}">
{{--                    <input type="text" style="display: none;" name="date_type" value="BOOKING">--}}
                    <div> <input id="datetimepicker" type="text" name="date_time" style="display: none"></div>



                    <button type="submit" class="btn btn-primary reservation" style="margin-top: 15px; background-color: #F886E6FF; border:none">Reserve</button>
                </form>
            </form>
        </div>
    </div>



@endsection


















