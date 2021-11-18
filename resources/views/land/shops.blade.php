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
            <a class="nav-link" href="{{route('land' , 'products')}}"> محصولات </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('land' , 'shops')}}"> فروشگاه ها </a>
        </li>
    </ul>

    @foreach ($shops as $key => $shop)
        <div class="landing-shop-card">
            <h5 class="text-primary"> {{$shop->title}} </h5>
            <p> <b> آدرس : </b> {{$shop->address ?? '-'}} </p>
            <div class="d-flex justify-content-around">
                <span> {{$shop->full_name}} </span>
                <span> {{$shop->telephone}} </span>
                <span> {{persianDate($shop->created_at)}} </span>
            </div>
            <hr>
            <a href="{{route('shop.show', $shop->id)}}" class="btn btn-primary"> رفتن به فروشگاه </a>
        </div>
    @endforeach

    {{$shops->links()}}

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="{{asset('js/public.js')}}" charset="utf-8"></script>
</body>
</html>
