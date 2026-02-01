@extends('layout.master')
@section('title')
    Create Product
@endsection
@section('content')
    <div class="pc-container">
        <div class="pc-content">
            @include('product.simple.form')
        </div>
    </div>

@endsection

