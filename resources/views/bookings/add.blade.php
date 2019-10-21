@extends('layouts.app')

@section('content')
 {{-- .container>.row>.col-md-12 --}}
 <div class="container">
     <div class="row">
         <div class="col-md-12">
         {{-- h1.page-header{New Booking} --}}
         <h1 class="page-header">New Booking</h1>
         {{-- form:post --}}
         <form action="{{route('booking:store')}}" method="post">
            @csrf

        {{-- .form-group>label{Purpose}+textarea[name=purpose].form-control --}}
         <div class="form-group"><label for="">Purpose</label><textarea name="purpose" id="" cols="30" rows="10" class="form-control"></textarea></div>

         {{-- .form-group>label{Start Date}+input:datetime[name=start_date].form-control --}}
         <div class="form-group"><label for="">Start Date</label><input type="datetime-local" name="start_date" id="" class="form-control"></div>

         {{-- .form-group>label{Duration}+input:number[name=duration].form-control --}}
         <div class="form-group"><label for="">Duration</label> <div class="input-group-prepend"><input type="number" name="duration" id="" class="form-control">
            <select class="custom-select" nama="type">
                <option value="hour">Hour</option>
                <option value="day">Day</option>
                <option value="week">Week</option>
            </select>
        </div>
     </div>

     {{-- .form-group>label{Room}+select[name:room_id].form-control --}}
     <div class="form-group"><label for="">Room</label><select name="room_id" class="form-control">
         <option value ="">---Select room---</option>
         @foreach ($rooms as $r)
     <option value="{{$r->id}}">{{$r->name}}</option>
         @endforeach
             </select></div>

               {{-- button:submit.btn.btn-primary{Submit} --}}
               <button type="submit" class="btn btn-primary">Submit</button>
               <button type="submit" class="btn btn-danger">Reset</button>
    </form>
         </div>
 </div>
 </div>
@endsection
