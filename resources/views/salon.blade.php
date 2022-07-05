@extends('layouts.user')

@section('content')

    <div class="salon-card card">
        <h1 class="salon-title">
            {{ $salon->title}}
        </h1>
        <span class="address">{{ $salon->street }}, {{ $salon->city->title }}</span>
        <div class="card-img" style="background-image: url({{ $salon->image_slug }})"></div>
        <div class="card-body">

            <h4 class="procedure-title"><strong>Procedures</strong></h4>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach($salon->procedures as $procedure)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{$procedure->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{$procedure->id}}" aria-expanded="false"
                                    aria-controls="flush-collapse{{$procedure->id}}">
                                {{$procedure->title}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$procedure->id}}" class="accordion-collapse collapse"
                             aria-labelledby="flush-heading{{$procedure->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <a href="{{route('booking', [$salon->id, $procedure->id])}}">
                                    <button type="button" class="btn btn-dark">Choose time</button>
                                </a>
                                <span class="procedure-price">€{{$procedure->price}}</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <form method="POST" action="{{route('storeComment')}}">
            @csrf
        <div class="comments card">
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10">
                    <div class="comment-box ml-2">
                        <h4 class="reviews-title">Reviews</h4>
                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>
                        @error('rating')
                            <p style="font-family: Montserrat;color:#AA0000;font-weight: bold;font-size:18px">Choose a rate</p>
                        @enderror
                        <div class="comment-area">
                            <textarea  class="form-control" name="message" placeholder="Leave your review..." rows="4"></textarea>
                        </div>
                        @error('message')
                            <p style="font-family: Montserrat;color:#AA0000;font-weight: bold;font-size:18px">Leave a comment</p>
                        @enderror

                        <input type="number" name="salon_id" value="{{$salon->id}}" style="display: none">
                        <div class="comment-btns mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-success send btn-sm">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row mt-4 d-flex justify-content-center">
                            <div class="col-12">
                                @foreach($salon->comments as $comment)
                                <div class="card p-3 mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="user d-flex flex-row align-items-center">
                                            <span>
                                                <small class="font-weight-bold text-primary">{{$comment->user->name}}</small>
                                                <small class="font-weight-bold">{{$comment->message}}</small>
                                            </span>
                                        </div>
                                        <small>{{$comment->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
@endsection
