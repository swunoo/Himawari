@extends('layouts.baseLayout')

@section('employees')
    @include('navbar', ['selectedTab' => 'n-details'])

    <div class="mx-10">

        @include('detailsNav', ['selectedDetails' => 'd-employees'])

        <div id="employee-list" class="mt-20 mx-2 md:mt-6 md:ml-80">

            @if ($msg = Session::get('msg'))
                <div class="w-full text-center">{{ $msg }}</div>
            @endif

            <div class="w-full lg:flex gap-10 items-center lg:justify-between">
                <h3 class="font-thin text-5xl mb-10 flex items-end gap-5">
                    {{ __('Employees') }}
                    <a href="/employees/create" class="add-emp text-lg font-semibold cursor-pointer text-gray-600">
                        <img class="w-8" src="{{ URL::asset('/img/icons/add.svg') }}" alt="">
                    </a>
                </h3>

                <form class="lg:w-1/2" method="POST" action="/employees/query">
                    @csrf
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">{{__("Search")}}</label>
                    <div class="relative flex items-center">
                        <input type="search"
                            class="block p-2 w-full text-sm text-gray-900 border-0 border-b border-[#D57538] bg-special-05 focus:border-none focus:ring-0"
                            placeholder="{{__("Employees by name.")}}" required name="name">
                        <button type="submit"
                            class="bg-special-05 border border-[#D57538] absolute right-2.5 bottom-1.5 hover:bg-[#D57538] hover:text-white font-medium rounded text-sm px-5 py-1">{{__("Search")}}</button>
                    </div>
                </form>

            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="text-sm text-left text-gray-500 dark:text-gray-400 lg:w-full">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Department') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Role') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Age') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                {{ __('Phone') }}
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <p class="lg:hidden">More</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $emp['name'] }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $emp['department'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $emp['role'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $emp['age'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $emp['phone'] }}
                                </td>
                                <td class="py-1 px-6 lg:flex justify-between">
                                    <a href="/employees/show/{{ $emp['id'] }}"
                                        class="font-medium flex gap-3  dark:text-blue-500 hover:underline">
                                        <img class="w-6" src="{{ URL::asset('/img/icons/info.svg') }}" alt="" />
                                        <p class="lg:hidden">Info</p>
                                    </a>
                                    <a href="/employees/edit/{{ $emp['id'] }}"
                                        class="font-medium flex gap-3 dark:text-blue-500 hover:underline">
                                        <img class="w-6" src="{{ URL::asset('/img/icons/edit.svg') }}" alt="" />
                                        <p class="lg:hidden">Edit</p>
                                    </a>
                                    <a href="/employees/destroy/{{ $emp['id'] }}"
                                        class="font-medium flex gap-3  dark:text-blue-500 hover:underline">
                                        <img class="w-6" src="{{ URL::asset('/img/icons/delete.svg') }}"
                                            alt="" />
                                        <p class="lg:hidden">Delete</p>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="w-2/3 m-auto my-10">
                {{ $employees->links() }}
            </div>

        </div>

    </div>
@endsection
