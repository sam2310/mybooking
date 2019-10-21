@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <!--h1.page header-->
                    <h1 class="page-header">New Room</h1>

                    @if(session()->has('alert'))
                    {{-- display alert message --}}
                     <div class="alert alert-success">
                         {{session()->get('alert')}}
                     </div>
                     @endif

                <form action="{{ route('room:store') }}" method="post">
                        @csrf
                        {{-- .form-group>label{Name}+input:text[name=name].form-control --}}
                        <div class="form-group"><label for="">Name</label><input type="text" value="{{old('name')}}" name="name" id="" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        @enderror
                        </div>

                        {{-- .form-group>label{DEscription}+textarea[name=description].form-control --}}
                        <div class="form-group"><label for="">Description</label><textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" >{{old('description')}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        @enderror
                        </div>
                        {{-- .form-group>label{apacity}+input:number[name=capacity].form-control --}}
                    <div class="form-group"><label for="">Capacity</label><input type="number" value="{{old('capacity')}}" name="capacity" id="" class="form-control  @error('capacity') is-invalid @enderror"  >
                        @error('capacity')
                            <div class="invalid-feedback">
                                {{$errors->first('capacity')}}
                            </div>
                        @enderror
                        </div>
                        {{-- .form-group>label{Status}+select.form-control[name=status]>option[value=1]{Active}+option[value=0]{inactive} --}}
                        <div class="form-group"><label for="">Status</label>
                            <select name="status" id="" class="form-control  @error('status') is-invalid @enderror">
                                <option value="" @if(old('status')==='') selected @endif>---Sila Pilih--</option>
                                <option value="1" @if(old('status')=='1') selected @endif>Active</option>
                                <option value="" @if(old('status')=='0') selected @endif >Inactive</option>
                            </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{$errors->first('status')}}
                            </div>
                        @enderror

                        </div>
                        {{-- button:submit.btn.btn-primary{Submit} --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">Reset</button>


                    </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

