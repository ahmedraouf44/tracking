@extends('layouts.layouts')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Orders</h1>
                </div>
                <h2>Update Order ( <b>{{$order->name}}</b> ) location</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('updateLocation', ['id' => $order->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf



                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} row">
                    <label for="searchMapInput" class="col-sm-2 col-form-label">New Order Location</label>
                    <input type="text" id="searchMapInput" name="address" class="form-control map-input">
                    <div class="col-sm-10">
                        <div id="map" style="height: 500px;z-index:20"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">lat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" name="lat" id="lat">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">lng</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" name="long" id="lng">
                    </div>
                </div>

                    <div class="ln_solid"></div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" name="submit" value ="Update" class="btn btn-success">
                            <a class="btn  btn-primary" href="{{route('home')}}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
