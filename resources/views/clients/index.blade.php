@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <div class="flex justify-center">
                <div class="w-4/12 bg-white p-6 rounded-lg">
                    <p><span>  Внеси нов Клиент</span></p>
                </div>

            </div>

            <form action="{{route('clients')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="type_of_client" class="sr-only">Тип на Клиент</label>
                    <input type="text" name="type_of_client" id="type_of_client" placeholder="Тип на Клиент"
                           class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('type_of_client') }}">
                    @error('type_of_client')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">Име</label>
                    <input type="text" name="name" id="name" placeholder="Име на Клиент"
                           class="bg-gray-100 border-200 w-full p-4 rounded-lg " value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="surname" class="sr-only">Презиме</label>
                    <input type="text" name="surname" id="surname" placeholder="Презиме"
                           class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('surname') }}">
                    @error('surname')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="address" class="sr-only">Адреса</label>
                    <input type="text" name="address" id="address" placeholder="Адреса"
                           class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('address') }}">
                    @error('address')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Е-маил</label>
                    <input type="text" name="email" id="email" placeholder="Е-маил"
                           class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Креирај Клиент
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
