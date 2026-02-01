@extends('layout.master')

@section('title')
    Product
@endsection

@section('content')
    <div class="pc-container">
        <div class="pc-content p-3 ">
            @include('product.simple.form')
        </div>
    </div>
@endsection

@section('javascript')
    <script>


        $(document).ready(function () {
            //   update_all_account_balance();
        });
    </script>
@endsection
