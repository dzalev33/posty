@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth


                <form action="{{ route('posts') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="client_id">Избери Клиент:</label>

                        <select id="client_id" name="client_id" class="bg-gray-100 border-200 w-full p-4 rounded-lg">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">

                                    {{ $client->name }}

                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="item_npn" class="sr-only">NPN Број</label>
                        <input type="text" name="item_npn" id="item_npn" placeholder="NPN Број"
                               class="bg-gray-100 border-200 w-full p-4 rounded-lg " value="{{ old('item_npn') }}">
                        @error('item_npn')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="item_receiver" class="sr-only">Примач на Пратка</label>
                        <input type="text" name="item_receiver" id="item_receiver" placeholder="Примач на Пратка"
                               class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('item_receiver') }}">
                        @error('item_receiver')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="item_status" class="sr-only">Начин на Достава</label>
                        <input type="text" name="item_status" id="item_status" placeholder="Начин на Достава"
                               class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('item_status') }}">
                        @error('item_status')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="item_delivery_date" class="sr-only">Датум на Достава</label>
                        <input type="text" name="item_delivery_date" id="item_delivery_date" placeholder="Датум на Достава"
                               class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('item_delivery_date') }}">
                        @error('item_delivery_date')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="package_id" class="sr-only">Статус на пратка</label>
                        <input type="text" name="package_id" id="package_id" placeholder="Статус на пратка"
                               class="bg-gray-100 border-200 w-full p-4 rounded-lg" value="{{ old('package_id') }}">
                        @error('package_id')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="item_body" class="sr-only">Дополнителни Информации</label>
                        <textarea name="item_body" id="item_body" cols="30" rows="4" class="bg-gray-100"
                                  placeholder="Дополнителни Информации ..."></textarea>
                        @error('item_body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white mt- px-4 py-2 rounded font-medium">
                            Креирај Пратка
                        </button>
                    </div>
                </form>
            @endauth

            @if($posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                {{ $posts->links() }}
            @else
                <p>Немате внесено пратки</p>
            @endif
        </div>

    </div>
@endsection
