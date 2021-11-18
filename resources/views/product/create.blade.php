<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            create
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />


    <form enctype="multipart/form-data"  method="POST" action="{{ route('product.store') }}">
        @csrf
        @admin
        <label class="flex justify-center mb-6" class="mb-4">انتخاب فروشگاه</label>
        <div class="flex justify-center mb-6">

                <select class="select2" name="shop_id">
                    <option  >-- انتخاب کنید --</option>
                    @foreach($shops as $shop)
                        <option VALUE="{{$shop->id}}">{{$shop->title}}</option>
                    @endforeach

                </select>
        </div>
        <hr class="mb-4">
        @endadmin


        <div class="grid grid-cols-6 gap-4">

            <div class="col-span-3">
                <x-jet-label for="title" value="عنوان محصول " />
                <x-jet-input id="title" class="block mt-3 w-full" type="text" name="title" :value="old('title')" />
            </div>
            <div class="col-span-3">
                <x-jet-label for="price" value="قیمت " />
                <x-jet-input id="price" class="block mt-3 w-full" type="text" name="price" :value="old('price')"  />
            </div>
            <div class="col-span-3">
                <x-jet-label for="discount" value=" تخفیف " />
                <x-jet-input id="discount" class="block mt-3 w-full" type="text" name="discount" :value="old('discount')" />
            </div>

            <div class="col-span-12">
                <x-jet-label for="description" value="توضیحات" />
                <x-jet-input id="description" class="block mt-3 w-full" type="text" name="description"  :value="old('description')"  />
            </div>
            <div class="col-span-3">
                <x-jet-label for="image" value="تصویر" />
                <input id="image" class=" mt-5 " type="file" name="image" />
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <x-jet-button>
                ذخیره
            </x-jet-button>
        </div>
    </form>


</x-app-layout>





















