@extends('layout.old__master')

@section('title')
    Customer
@endsection

@section('content')
    @include('Customer.form')
@endsection

@section('javascript')
    <script>


        $(document).ready(function () {
            //   update_all_account_balance();
        });
    </script>
@endsection
