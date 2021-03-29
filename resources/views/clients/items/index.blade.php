@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-12/12 ">
            <div class="p-6">
            </div>
            <div class="bg-white p-6 rounded-lg">
                <div class="flex justify-left">
                </div>
                <div class="flex justify-center">
                    <div class="w-4/12 bg-white p-6 rounded-lg">

                        <p><span> ИЗВЕШТАЈ ЗА ПРАТКИ </span></p>

                    </div>
                </div>
                <div class="mb-6">
                    <div class="flex flex-col">

                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-12">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">


                                    <table class="min-w-full divide-y divide-gray-200">

                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Архивски Број.
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Клиент
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                НПН БРОЈ
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Доставувач
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ПРИМАЧ НА ПРАТКА
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                НАЧИН НА ДОСТАВА
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ДАТУМ НА ДОСТАВА
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Статус на пратка
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ДОПОЛНИТЕЛНИ ИНФОРМАЦИИ
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @if($posts->count())
                                            @foreach($posts as $post)


                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $post->id }}
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <a href="{{ route('posts.show', $post) }}"> {{ $post->client->name }}</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $post->item_npn }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $post->item_package_receiver }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $post->item_receiver }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  {{ $post->item_status }}
                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $post->item_delivery_date }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $post->package_id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $post->item_body }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
{{--                                                <form action="{{ route('posts.update', $post) }}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('UPDATE')--}}
{{--                                                    <button type="submit" class="text-blue-500">ПРОМЕНИ</button>--}}
{{--                                                </form>--}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/posts/{{$post->id}}/edit"> ПРОМЕНИ </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-blue-500">ИЗБРИШИ</button>
                                                </form>
                                            </td>
                                        </tr>

                                            @endforeach
                                            {{ $posts->links() }}
                                        @else
                                            <p>Нема Запис за Клиентот</p>
                                        @endif

                                        <!-- More items... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
