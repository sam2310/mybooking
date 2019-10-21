@extends('layouts.app')

@section('content')

    <!--.container>.row>.col-md-12-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <h1>Booking index
                <div class="float-right">
                    <a href="{{route('booking:pending')}}" class="btn btn-info">Pending Booking</a>
                    </div>
               </h1>


           <div class="card">
                <div class="card-header">showing {{$bookings->count()}} of {{$bookings->total()}}</div>
            <div class="card-body">

            {{--table.table>thead>tr>th*4  --}}
            <table class="table">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Purpose</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Room</th>
                            <th>Reserved By</th>
                            <th>status</th>
                        </tr>
                    </thead>

                    @forelse($bookings as $r)
                        <tr>
                            <td>{{$r->id}}</td>
                            <td>{{$r->purpose}}</td>
                            <td>{{$r->start_date->format('d-m-Y h:i A')}}</td>
                            <td>{{$r->end_date->format('d-m-Y h:i A')}}</td>
                            <td>{{$r->room->name }}</td>
                            <td>{{$r->user->name}}</td>
                            <td>{{$r->status}}</td>


                        </tr>
                    @empty
                                  <tr>
                                      <td colspan="4">
                                          {{-- .alert.alert-warning.text-center{Nothing t show} --}}
                                          <div class="alert alert-warning text-center">Nothing t show</div>
                                      </td>
                                  </tr>

                     @endforelse
 @endsection


