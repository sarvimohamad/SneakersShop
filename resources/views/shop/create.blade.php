<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            create
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form class="grid grid-cols-3 gap-4" method="POST" action="{{ route('shop.store') }}">
        @csrf

        <div>
            <x-jet-label for="title" value="عنوان فروشگاه " />
            <x-jet-input id="title" class="block mt-3 w-full" type="text" name="title" :value="old('title')" required autofocus />
        </div>
        <div >
            <x-jet-label for="first_name" value="نام" />
            <x-jet-input id="first_name" class="block mt-3 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
        </div>
        <div >
            <x-jet-label for="last_name" value="نام خانوادگی" />
            <x-jet-input id="last_name" class="block mt-3 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
        </div>
        <div >
            <x-jet-label for="telephone" value="شماره تماس" />
            <x-jet-input id="telephone" class="block mt-3 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus />
        </div>
        <div >
            <x-jet-label for="address" value="آدرس" />
            <x-jet-input id="address" class="block mt-3 w-full" type="text" name="address" :value="old('address')" required autofocus />
        </div>
        <div >
            <x-jet-label for="username" value="نام کاربری" />
            <x-jet-input id="username" class="block mt-3 w-full" type="text" name="username" :value="old('username')" required autofocus />
        </div>
        <div >
            <x-jet-label for="email" value="ایمیل " />
            <x-jet-input id="email" class="block mt-3 w-full" type="text" name="email" :value="old('email')" required autofocus />
        </div>
        <div>
            <x-jet-button>
                ذخیره
            </x-jet-button>
        </div>
    </form>

        </div>
</x-app-layout>
