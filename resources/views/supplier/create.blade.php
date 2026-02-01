@extends('layout.master')

@section('title')
    Create Supplier
@endsection

@section('content')

    <div class="pc-container">
        <div class="pc-content">
        <div class="page-header"><h1>Suppliers</h1></div>

        @include('supplier.form')

    </div></div>

@endsection

