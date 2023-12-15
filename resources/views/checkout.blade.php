@extends('layout')
@section('content')
    <br><br><br><br><br>

    <!-- Items to purchase -->
    <div class="container">

        <div class="row" style="margin: 30px">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Parking Subscription</strong></h3>
                    </div>
                    <div class="panel-body">
                        <!-- Add more details about the parking subscription -->
                        Price: $50
                        <br>
                    </div>
                </div>
            </div>

            @if (auth()->check() && auth()->user()->parking_subscription == 0)
                <form action="/session" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" id="checkout-live-button">Checkout</button>
                </form>
            @else
                <div class="row">
                    <div class="col-xs-12">
                        <p class="btn btn-primary btn-lg btn-block" style="color: red;">Already Bought</p>
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection
