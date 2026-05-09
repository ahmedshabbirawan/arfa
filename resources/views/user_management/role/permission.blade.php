@extends('layout.master')
@section('title','Role Permissions')
@section('Title','User Management')
@section('URL',route("usermanagement.role.list"))
@section('PageName','Role Permissions')
@section('content')

    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-sm-auto">
                            <div class="page-header-title">
                                <h5 class="mb-0">Role Permission</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('layout.alerts')
        <div class="row">
<div class="card">
    <form class="form-horizontal" method="POST" action="{{route('usermanagement.role.permissionStore',['id'=>$roleId])}}">
    <div class="card-header">
        <h5>{{ $role->name }}</h5>
    </div>
    <div class="card-body">

            @csrf
            <!------------------------------------------------------------------------------>

            <!------------------------------------------------------------------------------>
            @foreach ($permissions as $lable => $permissionArr )
                <div class="control-group cb-group">
                    <label class="control-label bolder blue"><span
                            style="color: green">{{ Illuminate\Support\Str::title($lable) }}</span></label>
                    <div class="form-inline">
                        @foreach ($permissionArr as $permission )
                            <div class="checkbox right-margin-cb">
                                <label>
                                    <input type="checkbox" name="permissions[]" class="ace"
                                           value="{{$permission->id}}" {{in_array($permission->id,$rolePermissions)?'checked':''}} />
                                    <span class="lbl bigger-120"> {{$permission->description}}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach


    </div>
    <div class="card-footer">
            <input type="submit" class="btn btn-success">
    </div>
    </form>
</div> <!---card--->
        </div>
        </div></div>
@stop
@section('script')
@stop
