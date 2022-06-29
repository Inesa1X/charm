@extends('layouts.user')

@section('content')

    <div class="salon-card card">
        <h1 class="salon-title">
            {{ $salon->title}}

        </h1>
        <span class="address">{{ $salon->street }}, {{ $salon->city->title }}</span>
        <div class="card-img" style="background-image: url({{ $salon->image_slug }})"></div>
        <div class="card-body">
{{--            <h5 class="card-title">Card title</h5>--}}
{{--            <p class="card-text"></p>--}}


            {{--procedures--}}

                <h4 class="procedure-title"><strong>Procedures</strong></h4>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($salon->procedures as $procedure)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{$procedure->id}}">
                            <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$procedure->id}}" aria-expanded="false" aria-controls="flush-collapse{{$procedure->id}}">
                                {{$procedure->title}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$procedure->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$procedure->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <a href="{{route('booking', [$salon->id, $procedure->id])}}"><button type="button" class="btn btn-dark">Choose time</button></a>
                                <span class="procedure-price">€{{$procedure->price}}</span>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>

        </div>
    </div>

@endsection
