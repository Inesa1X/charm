@extends('layouts.user')
@section('content')

    <table class="table align-middle mb-0 bg-white mybookings-table" style="max-width: 1200px; margin: 50px auto;">
        <thead class="bg-light">
        <tr>

            @if(Auth::user()->role_id == 2)
                <th>User</th>
            @elseif(Auth::user()->role_id == 3)
                <th>Master</th>
            @endif
            <th>Procedure</th>
            <th>Salon</th>
            <th>City</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
            @if(Auth::user()->role_id == 3)
                @foreach(Auth::user()->user_bookings as $booking)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{$booking->master_name}}</p>
                                    <p class="text-muted mb-0">{{$booking->master_email}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{$booking->procedure}}</p>
                            <p class="text-muted mb-0">€{{$booking->price}}</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{$booking->salon}}</p>
                            <p class="text-muted mb-0">€{{$booking->salon_address}}</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{$booking->city}}</p>
                            {{-- <p class="text-muted mb-0">€{{$booking->price}}</p> --}}
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{Carbon\Carbon::parse($booking->date)->format('Y-m-d')}}</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{$booking->time}}</p>
                        </td>
                        <td>
                            <form method="POST" action="{{route('destroy', [$booking->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

            @if(Auth::user()->role_id == 2)
                @foreach(Auth::user()->master_bookings as $booking)
                    @if($booking->date_type == 'BOOKING')
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{\App\Models\User::find($booking->user)->name}}</p>
                                    <p class="text-muted mb-0">{{\App\Models\User::find($booking->user)->email}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{$booking->procedure}}</p>
                            <p class="text-muted mb-0">€{{$booking->price}}</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{$booking->salon}}</p>
                            <p class="text-muted mb-0">€{{$booking->salon_address}}</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{$booking->city}}</p>
                            {{-- <p class="text-muted mb-0">€{{$booking->price}}</p> --}}
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{Carbon\Carbon::parse($booking->date)->format('Y-m-d')}}</p>
                        </td>
                        <td>
                            <p class="fw-bold mb-1">{{$booking->time}}</p>
                        </td>
                        <td>
                            <form method="POST" action="{{route('destroy', $booking->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endif

        </tbody>
    </table>
@endsection
