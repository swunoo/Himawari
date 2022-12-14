@extends('layouts.baseLayout')

@section('services')
    @include('navbar', ['selectedTab' => 'n-details'])

    <div class="mx-10">

        @include('detailsNav', ['selectedDetails' => 'd-messages'])

        <div id="message-list" class="mt-20 mx-2 md:mt-6 md:ml-80">

            <div>
                <h3 class="font-thin text-5xl mb-10 flex items-end gap-5">
                    {{__("Messages")}}
                </h3>

                <div class="relative shadow-md sm:rounded-lg -z-10">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 -z-10">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    {{__("Sender")}}
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    {{__("Date")}}
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    {{__("Title")}}
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    {{__("Content")}}
                                </th>
                                {{-- <th scope="col" class="py-3 px-6"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message )
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $message['sender_name'] }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $message['date_time'] }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $message['title'] }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $message['content'] }}
                                    </td>
                                    {{-- <td class="py-1 px-6 flex justify-between">
                                        <a href="#"
                                            class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <img class="w-10" src="{{ URL::asset('/img/icons/info.svg') }}"
                                                alt="" />
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="w-2/3 m-auto my-10">
                    {{ $messages->links() }}
                </div>

            </div>


        </div>


    </div>


@endsection
