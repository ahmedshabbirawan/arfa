@extends('layout.master')
@section('title','Role Create')
@section('Title','User Management')
@section('URL',route("usermanagement.role.list"))
@section('PageName','Roles')
@section('content')
    <div class="pc-container">
        <div class="pc-content">


        <div class="page-header">
            <h1>
                Roles
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Create
                </small>
            </h1>
            {{-- <a href="{{route('category.parent.create')}}"><button class="btn btn-primary" style="position:absolute;right:20px;top:15px;">Add New</button></a> --}}
        </div><!-- /.page-header -->
        @include('layout.alerts')


            <div class="card">
                <form class="form-horizontal" method="POST" action="{{route('usermanagement.role.store')}}">
                <div class="card-header">
                    <h3 class="card-title">Create Role</h3>
                </div>
                <div class="card-body">

                        @csrf
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label><b>Enter Role Name</b></label>
                                <input type="text" name="name" placeholder="Role Name" class="form-control"
                                       required/>
                            </div>
                        </div>

                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-success">
                </div>
                </form>
            </div>

        </div></div>
@stop

@section('script')

@stop
