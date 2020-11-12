@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($product as $p)
        <div class='col-lg-3 col-md-4 col-sm-12'>
            <form method='get' action="{{route('add-cart', ['product'=>$p['id']])}}">
            {{-- <form method='get' action="{{route('add-cart')}}"> --}}
            <div class='card text-center text-success mb-5'>
            <h6 class='card-title bg-info text-white p-2 text-uppercase'>{{$p->prd_name}}</h6>
            <div class='card-body'>
            <img src='Assests/images/{{$p->prd_image}}' alt='phone' class='img-fluid mb-2' >
          
            <h6>{{$p->prd_price}}/-</h6>
            <p class='card-text'>{{$p->cat_name}}</p>
            <p class='card-text text-danger'>{{$p->seller_name}}</p>
            </div>
            <div class='btn-group btn-group-lg d-flex'>
            <button class='btn btn-danger flex-fill'> Add to bucket </button>
            <button class='btn btn-success flex-fill text-white'> Buy Now </button>
            
            <input type='hidden' name='product_id' value='{{$p->id}}'>
            </div>
            </div>
            </form>
            </div>
            @endforeach
    </div>
</div>
@endsection


