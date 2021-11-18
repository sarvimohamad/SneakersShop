<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div><a class="border py-2 px-4 hover:bg-gray-700 " href="{{route('land' ,'products')}}">برو به صفحه محصولات</a> </div>

</x-app-layout>
