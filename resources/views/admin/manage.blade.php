@extends('layouts.app')
@section('content')

<body class="bg-light">
    <div class="form-body">
        <h1 class="text-center">Enter Product Detail</h1>

        <form class="bg-gradient-dark" action="{{$p['id']??'' ? route('manage/update',['id'=>$p['id']] ) :route('manage/add')}}" id="product_manage_form" method="post">
             @csrf
                    <input type="text" class="form-control" id="productInput" name="product_name"
                        value="{{ $p['prd_name'] ??'' }}" placeholder="Enter product name" autofocus /><br />
                    @error('product_name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" id="productInput" name="product_price"
                        value="{{ $p['prd_price'] ??'' }}" placeholder="Enter product price" autofocus /><br />
                    @error('product_price')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" id="productInput" name="product_image"
                        value="{{ $p['prd_image'] ??'' }}" placeholder="Enter product image" autofocus /><br />
                    @error('product_image')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" id="productInput" name="product_description"
                        value="{{ $p['prd_desc'] ??'' }}" placeholder="Enter product description" autofocus /><br />
                    @error('product_desc')
                    <p class="error">{{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Category</label>
                            @error('product_category')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <select class="custom-select" name="product_category" id="inputGroupSelect01">
                          <option selected value='{{ $p['cat_name'] ??'' }}'>{{$p['cat_name']??'' ? $p['cat_name']: 'choose...'}}</option>
                          @foreach ($c as $c)
                            <option value="{{$c['cat_name']??''}}">{{$c['cat_name']}}</option>
                          @endforeach
                        </select>
                        
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Sellers</label>
                            @error('product_seller')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <select class="custom-select" name="product_seller" id="inputGroupSelect01">
                          <option selected value='{{ $p['seller_name'] ??'' }}'>{{$p['seller_name']??'' ? $p['seller_name']: 'choose...'}}</option>
                          @foreach ($s as $s)
                            <option value="{{$s['seller_name']}}">{{$s['seller_name']}}</option>
                          @endforeach
                        </select>
                    </div>

            <div class="text-center">
                    <input type="submit" value="submit" />
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
        
                   $("#product_manage_form").submit(function (e) {
                       e.preventDefault();
                    });
                    });
                </script>
        </form>
    </div>
</body>
@endsection