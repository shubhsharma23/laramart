@extends('layouts.app')
@section('content')

@php $total=0; $count=0; @endphp

@if(session('bucket'))
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-bucket">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <h6>My bucket</h6>
                <hr>
                @foreach (session('bucket') as $id=>$product)
                @php

                $subtotal=$product['quantity']*$product['price'];
                $total+=$subtotal;
                @endphp
                <form action='remove?action=remove&id={{$product['id']}}' method='get' name='submitForm'
                    class='cart-items'>
                    <div class='border rounded'>
                        <div class='row bg-white my-1'>
                            <div class='col-md-3 pl-0'>
                                <img src='Assests/images/{{$product['image']}}' alt='Image1' class='img-fluid'>
                            </div>
                            <div class='col-md-5'>
                                <h5 class='pt-2'>{{$product['name']}}</h5>
                                <small class='text-secondary'>description: {{$product['description']}}</small>
                                <h5 class='pt-2'>${{$subtotal}}/-</h5>
                                <button type='submit' class='btn btn-warning'>Save for Later</button>
                                <button type='submit' class='btn btn-danger mx-2' name='remove'><a
                                        href="{{route('remove', $product['id'])}}">Remove</a></button>
                            </div>
                            <div class='col-md-4 py-5'>
                                <div>
                                    <button type='button' class='btn bg-dark border rounded-circle'><i
                                            class='fas fa-minus'></i></button>
                                    <input type='text' value='{{$product['quantity']}}' name="quantity"
                                        class='form-control w-25 d-inline'>
                                    <button type='button' class='btn bg-dark border rounded-circle'><i
                                            class='fas fa-plus'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @php
                $count;
                @endphp
                @endforeach
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                if (isset($_SESSION['bucket'])){
                    $count  = count($_SESSION['bucket']);
                    echo "<h6>Price</h6>";
                }else{
                    echo "<h6>Price</h6>";
                }
                ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$@php echo $total; @endphp</h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$@php
                            echo $total;
                            @endphp
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@endif