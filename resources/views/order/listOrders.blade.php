@extends('layouts.layouts')

@section('content')



    <div class="content">

        <div class="card">
            <div class="card-header">



                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Orders</h1>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Order name</th>
                            <th>Client name</th>
                            <th>Order Address</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->client->name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        @role('admin')
                                        <a class="btn btn-success mr-2" href="{{ route('orderTracking', ['id' => $order->id]) }}"><i class="fas fa-map-marked" ></i> </a>
                                        @endrole
                                        @role('client')
                                        <a class="btn btn-primary mr-2" href="{{ route('updateLocation', ['id' => $order->id]) }}"><i class="fas fa-map-pin"></i> </a>
                                        @endrole
                                        @role('admin')
                                        <form action="{{ route('deleteOrder', ['id' => $order->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash" title="Delete"></i></button>
                                        </form>
                                        @endrole
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
