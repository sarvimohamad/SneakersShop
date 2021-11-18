@extends('layouts.landing')
@section('content')
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

    <div class="card mt-3">
        <div class="card-body">
            <h4> {{$shop->title}} </h4>
        </div>
        </div>
    <hr>


@endsection
