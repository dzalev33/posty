@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-10/12 bg-white p-6 rounded-lg">
            @if ($message = Session::get('success'))

                <div style="color: green;" class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
                    <div class="flex" >
                        <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                        <div>
                            <p class="font-bold">{{$message}}</p>

                        </div>
                    </div>
                </div>

            @endif
            <h1 class=" p-4">Изберете клиент за да видите конечен извештај:</h1>
            <ul class="px-0">
                @foreach($clients as $client)
                <a href="{{ route('clients.info', $client->name) }}"><li class="border list-none  rounded-sm px-3 py-3" style='border-bottom-width:0'>{{$client->name}} {{$client->surname}}</li></a>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
