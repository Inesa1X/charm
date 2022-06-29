@extends('layouts.user')

@section('content')

    <div class="main-container">
        <h1 class="procedure-title">{{ $procedure->title }}</h1>
        <div class="cities">
            <ul class="list-group">
                @foreach(App\Models\City::all() as $city)
                    <li class="list-group-item"><a href="#">{{$city->title}}<span class="salons-city">{{count($city->salons)}}</span></a></li>
                @endforeach


            </ul>
        </div>

        <div class="salons">
            @foreach($procedure->salons as $salon)

                <div class="salons-card card" style="max-width: 880px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $salon->image_slug }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title"><a href="{{route('salon', $salon->id)}}">{{ $salon->title }}</a></h3>
                                <p class="card-text">{{ $salon->street }}, {{ $salon->city->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
