<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت فروشنده ها
        </h2>
    </x-slot>


    <div class="flex justify-end">
        <a href="{{route('shop.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            تعریف فروشنده جدید
        </a>

    </div>
    <hr class=" py-4">


    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th>نام شخص</th>
                <th>تلفن</th>
                <th>تاریخ</th>
                <th colspan="2" >عملیات</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shops as $key=>$shop)
            <tr>
                <th>{{$key + 1}}</th>
                <td>{{$shop->title}}</td>
                <td>{{$shop->full_name}}</td>
                <td>{{$shop->telephone}}</td>
                <td>{{$shop->created_at}}</td>
                <td>
                    <a href="{{route('shop.edit' , $shop->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                        ویرایش
                    </a>
                </td>
                <td>
                    <form method="post" action="{{route('shop.destroy' , $shop->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('آیا از پاک کردن این محصول اطمینان دارید؟')"
                                class="inline-flex items-center px-4 py-2 bg-red-100 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-green-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
</x-app-layout>
