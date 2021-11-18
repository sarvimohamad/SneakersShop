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
            <a class="nav-link active" href="{{url('/')}}"> صفحه اصلی </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('land' , 'products')}}"> محصولات </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('land' , 'shops')}}"> فروشگاه ها </a>
        </li>
        @if(auth()->user())
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">داشبورد </a>
        </li>

        @else
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">ورود </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">ثبت نام</a>
        </li>
        @endif
    </ul>

    <div class="card mt-3">
        <div class="card-body">صفحه اصلی</div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="{{asset('js/public.js')}}" charset="utf-8"></script>
</body>
</html>
