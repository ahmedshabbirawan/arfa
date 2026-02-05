@extends('layout.master')

@section('title')
    Create Customer
@endsection

@section('content')
    <div class="pc-container">
        <div class="pc-content">
        @include('Customer.form')
    </div>
    </div>
@endsection

