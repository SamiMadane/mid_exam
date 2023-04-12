@extends('layout.dashboard')
@section('content')
    <?php
    if ($status == 0) {
        $name = ' ';
        $email = ' ';
        $phone = ' ';
        $address = ' ';
        $product = ' ';
        $quantity = ' ';
        $date = ' ';
    
        $placeHolder = 'Add Order';
    } else {
        foreach ($selectedOrder as $key => $order) {
            $id = $order->id;
            $name = $order->Name;
            $email = $order->Email;
            $phone = $order->Phone;
            $address = $order->Address;
            $product = $order->Product;
            $quantity = $order->Quantity;
            $date = $order->Date;
    
            $placeHolder = 'Update Order';
        }
    }
    ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container" style="margin-top: 20px;">
            @if ($status == 0)
                <form method="POST" action="{{ route('orders.insert') }}">
                @else
                    <form method="POST" action="{{ route('orders.update', $id) }}">
            @endif

            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $phone }}"
                    required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" required> {{ $address }} </textarea>
            </div>
            <div class="form-group">
                <label for="product">Product:</label>
                <select class="form-control" id="product" name="product" required>
                    <option value="">Choose a product</option>
                    <option value="Product A">Product A</option>
                    <option value="Product B">Product B</option>
                    <option value="Product C">Product C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" value="{{ $quantity }}" name="quantity"
                    min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="delivery">Delivery Date:</label>
                <input type="date" class="form-control" id="delivery" name="delivery" value="{{ $date }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">{{ $placeHolder }}</button>
            </form>

        </div>

    </main>
@endsection
