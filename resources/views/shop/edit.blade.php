@extends('layout.master')

@section('title')
    Shop / Branch
@endsection

@section('content')
    <div class="pc-container">
        <div class="pc-content">
    @include('shop.form')
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
