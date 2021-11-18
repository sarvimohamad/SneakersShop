<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <title> به سایت SF خوش آمدید </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/public.css')}}">
</head>
<body>

<div class="container py-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}"> صفحه اصلی </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('land' , 'products')}}"> محصولات </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('land' , 'shops')}}"> فروشگاه ها </a>
        </li>
        <li class="nav-item align-self-center" id="auth">
            <a href="{{route('login')}}" class="btn btn-primary btn-sm">
                حساب کاربری
            </a>
        </li>
    </ul>
    <div>

        <li class="nav-item">
            <a class="nav-link" href="{{route('land' , 'cart')}}" id="cart">سبد خرید </a>

            <span> {{cartCount()}} </span>
        </li>
    </div>
    @if($error = session('error'))
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endif
    @if($message = session('message'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 my-3 product-card">
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h5> {{$product->title}} </h5>
                            <p>
                                @if ($product->discount)
                                    <span class="text-danger off mx-2"> {{number_format($product->price)}} </span>
                                @endif
                                <span> {{number_format($product->cost)}} </span>
                            </p>
                        </div>

                        <img src="{{asset($product->image) ?? 'img/empty.jpg'}}">
                        <p class="mt-3 text-xs" >
                            @if ($product->description)
                                {{$product->description}}
                            @else
                                <em> بدون توضیحات ... </em>
                            @endif
                        </p>

                        <form method="post"  action="{{route('cart.manage',$product->id )}}" class="d-flex justify-content-between align-items-center">
                            @csrf
                            <a href="#"> {{$product->shop->title ?? '-'}} </a>
                            @if ($cart_item = $product->isInCart())
                                <div>
                                    <button type="submit" name="type" value="minus" class="btn btn-warning text-white btn-sm"> - </button>
                                    <span class="cart-count"> {{$cart_item->count}} </span>
                                    <button type="submit" name="type" value="add" class="btn btn-warning text-white btn-sm"> + </button>
                                </div>
                            @else
                                <button type="submit" name="type" value="add" class="btn btn-info text-white px-3 btn-sm"> اضافه کردن به سبد خرید </button>
                            @endif
                        </form>
                    </div>

                @endforeach
            </div>

        </div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="{{asset('js/public.js')}}" charset="utf-8"></script>
</body>
</html>
