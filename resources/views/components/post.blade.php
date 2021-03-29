@props(['post' => $post, 'revisions' => $revisions])
<div class="mb-4">
    {{--    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>--}}
    {{--    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>--}}

    {{--    {{ $post->client->name }}--}}
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <p><span>ПРИКАЗ НА ПРАТКА</span></p>
        </div>
    </div>
    <div class="flex flex-col">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
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
                                СТАТУС НА ДОСТАВА
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
                                            {{ $post->client->name }}
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
                                            Панделина Влакевска
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
                            {{--                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}

                            {{--                                <form action="{{ route('posts.destroy', $post) }}" method="POST">--}}
                            {{--                                    @csrf--}}
                            {{--                                    @method('DELETE')--}}
                            {{--                                    <button type="submit" class="text-blue-500">ИЗБРИШИ</button>--}}
                            {{--                                </form>--}}
                            {{--                            </td>--}}
                        </tr>
                        <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-center">
        <div class=" bg-white p-6 rounded-lg">
            <p><span>ИСТОРИЈА НА ПРАТКА</span></p>
            @foreach($revisions as $history)

                @if($history->revisionable_id === $post->id)

                    @if($history->key == 'created_at' && !$history->old_value)
                        <li><strong>{{ $history->userResponsible()->username }}</strong> ја креира пратката
                            на: <strong>{{ $history->newValue() }}</strong></li>
                    @else
                        <li><strong>{{ $history->userResponsible()->username }}</strong> промени <strong>{{ $history->fieldName() }}</strong>
                            Од <strong>{{ $history->oldValue() }}</strong> Во <strong>{{ $history->newValue() }}</strong>
                            Време: <strong>{{$history->created_at}}</strong> </li>
                    @endif
                @endif

            @endforeach
        </div>
    </div>


</div>
