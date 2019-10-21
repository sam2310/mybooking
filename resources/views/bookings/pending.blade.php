@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <!--h1.page header-->
                    <h1 class="page-header">Pending Bookings
                        <div class="float-right">
                            <a href="{{route('booking:index')}}" class="btn btn-secondary">Back</a>
                            </div>
                    </h1>
                </div>

                <div class="card">
                        <div class="card-header">showing{{$bookings->count()}} of {{$bookings->total()}}</div>
                <div class="card-body">
                @csrf
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
                            {{-- ,$r
                            ,$r --}}
                         <td>
                         <a href="{{route('booking:approve', $r->id)}}" class="btn btn-success">Approve</a>
                         <a href="{{route('booking:reject', $r)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</a>
                         </td>
                        </tr>
                    @empty
                                  <tr>
                                      <td colspan="4">
                                          {{-- .alert.alert-warning.text-center{Nothing t show} --}}
                                          <div class="alert alert-warning text-center">Nothing to show</div>
                                      </td>
                                  </tr>

                     @endforelse

                </form>
 @endsection
