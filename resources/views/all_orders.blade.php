@extends('layout.dashboard')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">All Orders</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ url('create_order') }}" class="btn btn-outline-secondary">Add New Order</a>
                </div>
            </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            @if (!count($orders))
                <p>
                <h5> No Orders Yet !! </h5>
                </p>
            @else
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Customer Name</th>
                            <th>Product</th>
                            <th>Purchase Date</th>
                            <th>Delivery Date</th>
                            <th>Quantity</th>
                            <th width="280px">Actions</th>
                        </tr>
                        @foreach ($orders as $order)
                        <?php 
                        $created_at = explode($order->created_at,'2017-12-09 09:28:06');
                        $created_at = $created_at[0];
                        ?>
                            <tr>
                                <td>{{ $order->Name }}</td>
                                <td>{{ $order->Product }}</td>
                                <td> {{$created_at}} </td>
                                <td>{{ $order->Date }}</td>
                                <td>{{ $order->Quantity }}</td>
                                <td>
                                    <form method="Post" action="{{ route('orders.delete', $order->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a class="btn btn-info" href="{{ route('orders.changeState', $order->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif

        </div>
    </main>
@endsection
