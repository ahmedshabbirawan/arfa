@extends('layout.master')
@section('title','User Create')
@section('Title','User Management')
@section('URL',route("usermanagement.user.list"))
@section('PageName','User')
@section('content')

    <div class="pc-container">
        <div class="pc-content">
            <div class="card">
                <div class="card-header">
                    <h5>User Create</h5>
                </div>
                <div class="card-body" >
                    @include('layout.alerts')
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-horizontal" method="POST" action="{{route('usermanagement.user.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Person Name</b></label>
                                        <input type="text" name="name" placeholder=" Person Name" class="form-control"
                                               required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Enter Email</b></label>
                                        <input type="email" name="email" placeholder="Abc@gmail.com" class="form-control"
                                               required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Enter User Name</b></label>
                                        <input type="text" name="username" placeholder="Please Provide Username"
                                               class="form-control" required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Enter Password</b></label>
                                        <input type="password" name="password" placeholder="******" class="form-control"
                                               required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Confirm Password</b></label>
                                        <input type="password" name="password_confirmation" placeholder="******"
                                               class="form-control" required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Upload Picture</b></label>
                                        <input type="file" name="image" class="form-control"/>
                                    </div>


                                    <div class="col-md-3" style="margin-top:10px;">
                                        <label><b>Select Role</b></label>
                                        <select class="form-control" name="roleId" required>
                                            <option value="" hidden selected>Choose Role</option>
                                            @foreach ($roles as $role )
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-3" style="margin-top:10px;">
                                        <label><b>Shop</b></label>
                                        <select class="form-control" name="shop_id">
                                            <option value="" hidden selected>Choose Shop</option>
                                            @foreach ($shops as $id => $val )
                                                <option value="{{$id}}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div style="margin-top:10px;">
                                    <input type="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div><!-- /.span -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')

@stop
