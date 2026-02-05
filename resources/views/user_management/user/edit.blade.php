@extends('layout.master')
@section('title','User Edit')
@section('Title','User Management')
@section('URL',route("usermanagement.user.list"))
@section('PageName','User')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="card">
                <div class="card-header">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    @include('layout.alerts')
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-horizontal" method="POST"
                                  action="{{route('usermanagement.user.update',['id'=>$obj->id])}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Person Name</b></label>
                                        <input type="text" name="name" placeholder=" Person Name" value="{{$obj->name}}"
                                               class="form-control" required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Enter Email</b></label>
                                        <input type="email" name="email" placeholder="Abc@gmail.com" value="{{$obj->email}}"
                                               class="form-control" required/>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <label><b>Enter User Name</b></label>
                                        <input type="text" name="username" placeholder="Please Provide Username"
                                               value="{{$obj->userName}}" class="form-control" required/>
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
                                                <option
                                                    value="{{$role->id}}"{{$obj->roles[0]->id == $role->id?'selected':'' }}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-top:10px;">
                                        <label><b>Shop</b></label>
                                        <select class="form-control" name="shop_id">
                                            <option value="" hidden selected>Choose Shop</option>
                                            @foreach ($shops as $id => $val )
                                                <option
                                                    value="{{$id}}" {{ ($id == auth()->user()->shop_id)?'selected="selected"':'' }} >{{ $val }}</option>
                                            @endforeach
                                        </select>
                                        <small class="" style="color:red">Only one user assign to one shop</small>
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
