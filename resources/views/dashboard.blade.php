@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class=" p-4">Изберете клиент за да видите конечен извештај:</h1>
            <ul class="px-0">
                @foreach($clients as $client)
                <a href="{{ route('clients.info', $client->name) }}"><li class="border list-none  rounded-sm px-3 py-3" style='border-bottom-width:0'>{{$client->name}} {{$client->surname}}</li></a>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
