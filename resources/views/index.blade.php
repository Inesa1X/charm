@extends('layouts.user')

@section('content')

    <div class="home_container">
        <h2 class="home-title">Suggestions for you</h2>


        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div><a href="{{route('salon', $salons[0]->id)}}"><img src="{{$salons[0]->image_slug}}" class="card-img-top" alt="..."></a></div>
                    <div class="card-body">
                        <h5 class="card-title">{{$salons[0]->title}}</h5>
                        <p class="card-text">
                            @foreach($salons[0]->procedures as $procedure)
                                {{$procedure->title}} •
                            @endforeach
                        </p>
                        <a href="{{route('salon', $salons[0]->id)}}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div> <a href="{{route('salon', $salons[1]->id)}}"><img src="{{$salons[1]->image_slug}}" class="card-img-top" alt="..."></a></div>
                    <div class="card-body">
                        <h5 class="card-title">{{$salons[1]->title}}</h5>
                        <p class="card-text">
                            @foreach($salons[1]->procedures as $procedure)
                                {{$procedure->title}} •
                            @endforeach
                        </p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div><a href="{{route('salon', $salons[2]->id)}}"><img src="{{$salons[2]->image_slug}}" class="card-img-top" alt="..."></a></div
                </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$salons[2]->title}}</h5>
                        <p class="card-text">
                            @foreach($salons[3]->procedures as $procedure)
                                {{$procedure->title}} •
                            @endforeach
                        </p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>





    </div>


@endsection
