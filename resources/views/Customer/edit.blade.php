@extends('layout.master')

@section('title')
    Customer
@endsection

@section('content')
    <div class="pc-container">
        <div class="pc-content">
    @include('Customer.form')
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
