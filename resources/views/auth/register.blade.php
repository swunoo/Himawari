@extends('layouts.baseLayout')

@section('login')

        <div class="container w-1/3 mt-10 m-auto">
            <div class="flex items-center mb-10">
                <img class="w-8 h-8 border-gray-900 border p-1" style="border-radius:50%;" src="{{ URL::asset('/img/icons/languages.svg') }}" alt="icon" onclick="toggleLangs()"/>
                <div id="languages" class="flex gap-3 text-gray-700 mx-5 font-semibold">
                    <a href="/lang/en" class="hover-selected-tab text-sm">EN</a>
                    <a href="/lang/jp" class="hover-selected-tab text-sm">JP</a>
                    <a href="/lang/mm" class="hover-selected-tab text-sm">MM</a>
                </div>
            </div>

            <p class="text-3xl font-weight-thin mb-5"> {{__("Registration Demo")}} </p>
            <p class="mb-10"> ({{__("No email verification necessary.")}}) </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-300 dark:focus:border-orange-300" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="w-full mt-5 flex gap-3 justify-end">
                    <a href="{{ route('login') }}"
                        class="cursor-pointer text-white bg-[#3b5998] hover:bg-[#3b5998]/90 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6">
                        {{__('Log In')}}
                        
                    </a>
                    <button type="submit"
                        class="cursor-pointer text-white bg-[#D57538] hover:bg-[#D57538]/90 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6">
                        {{__('Register')}}
                </button>
                </div>
            
            </form>
    </div>
@endsection
