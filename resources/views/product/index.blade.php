<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            مدیریت محصولات
        </h2>
    </x-slot>


    <div class="flex justify-end">
        <a href="{{route('product.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            تعریف محصول جدید
        </a>

    </div>
    <hr class=" py-4">


    <table>
        <thead>
        <tr>
            <th>#</th>
        @admin
            <th>فروشگاه</th>
        @endadmin
            <th>عنوان</th>
            <th> قیمت</th>
            <th>تخفیف</th>
            <th>قیمت کل</th>
            <th>تصویر</th>
            <th colspan="2" >عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key=>$product)
            <tr>
                <th>{{$key + 1}}</th>
                @admin
                <td>{{$product->shop->title  ?? '-'}}</td>
                @endadmin
                <td>{{$product->title}}</td>
                <td>{{number_format($product->price)}}</td>
                <td>{{$product->discount}}</td>
                <td>{{number_format($product->cost)}}</td>
                <td>
                    @if($product->image)
                        <span class="text-green-500">دارد</span>
                    @else()
                    <span class="text-red-500">ندارد</span>
                    @endif
                </td>

                <td>
                    <a href="{{route('product.edit' , $product->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        ویرایش
                    </a>
                </td>
                <td>
                    <form method="post" action="{{route('product.destroy' , $product->id)}}">
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
    <hr class="mb-6">
    @if($deleted_product)
        برای بازیابی محصول حذف شده <a class=" mb-4 text-red-500 " href="{{route('product.undo' , ['id'=>$deleted_product])}}">
            کلیک کنید
        </a>
    @endif

</x-app-layout>
