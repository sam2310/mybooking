@extends('layouts.app')

@section('content')

    <!--.container>.row>.col-md-12-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- h1.page-header{Rooms} --}}
                <h1 class="page-header">Rooms
                    <div class="float-right">
                    <a href="{{route('room:add')}}" class="btn btn-primary">New Room</a>
                    </div>
                </h1>

                {{-- .card>.card-header{List of Rooms}+.card-body --}}
                <div class="card">
                <div class="card-header">showing{{$rooms->count()}} of {{ $rooms->total()}}</div>
                    <div class="card-body">

                    {{-- .form:post.form-inline>input:text.form-control.mb-2.mr-sm-2+button:submit.btn.btn-primary{submit} --}}
                    <form action="{{route('room:search')}}" method="get" class="form-inline"><input type="text" name="keyword" id="" class="form-control mb-2 mr-sm-2" value="{{request()->get('keyword')}}"><button type="submit" class="btn btn-primary">Search</button></form>

                    {{--table.table>thead>tr>th*4  --}}
                        <table class="table">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Room Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- @foreach ($rooms as $r) --}}

                            @forelse($rooms as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{!!$r->status_html!!}</td>
                                    <td>
                                        {{-- a.btn.btn-success{Edit}+a.btn.btn-danger{Delete} --}}
                                    <a href="{{route('room:edit',$r)}}" class="btn btn-success">Edit</a> <a href="{{route('room:delete',$r)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        {{-- .alert.alert-warning.text-center{Nothing t show} --}}
                                        <div class="alert alert-warning text-center">Nothing t show</div>
                                    </td>
                                </tr>

                            @endforelse
                            {{-- @endforeach --}}
                        </table>

                        {{$rooms->appends( ['keyword'=> request()->get('keyword')] )->links()}}

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
