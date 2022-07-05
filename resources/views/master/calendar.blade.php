@extends('layouts.user')

@section('content')
    <div class="my-calendar">
        <h1>My schedule</h1>

        @php $count = 0; @endphp
        @for($col = 1; $col <= 4; $col++)
            <div class="date__row">
                @for($row = 1; $row <= 8; $row++)

                    @if(in_array(\Carbon\Carbon::now()->addDays($count)->format("Y-m-d"), $availabilityDates))
                        <form method="POST" action="{{route('destroySavedDate', \Carbon\Carbon::now()->addDays($count)->format("Y-m-d"))}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="month-btn btn-active">
                                {{\Carbon\Carbon::now()->addDays($count)->format("Y-m-d")}}
                                <input type="text" name="date" hidden value="{{\Carbon\Carbon::now()->addDays($count)->format("Y-m-d")}}">
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{route('savedate')}}">
                            @csrf
                            <button type="submit" class="month-btn">
                                {{\Carbon\Carbon::now()->addDays($count)->format("Y-m-d")}}
                                <input type="text" name="date" hidden value="{{\Carbon\Carbon::now()->addDays($count)->format("Y-m-d")}}">
                            </button>
                        </form>
                    @endif
                    @php $count++; @endphp
                @endfor
            </div>
        @endfor
    </div>
@endsection
