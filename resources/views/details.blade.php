@extends('layouts.baseLayout')

@section('details')

@include('navbar', ['selectedTab' => 'n-details'])

<div class="mx-10">

    @include('detailsNav', ['selectedDetails' => 'd-appointments'])

    <div id="appointment-details" class="mt-20 mx-2 md:mt-6 md:ml-80">
        
        <h3 class="font-thin text-5xl mb-5">
            {{__("Appointments")}}
            <span class="text-lg font-semibold  text-gray-600">
                <div class="add-app px-3 py-2  rounded-lg gap-3 flex my-5">
                    {{-- <img class="w-6" src="{{URL::asset('/img/icons/add.svg')}}" alt=""> --}}
                    {{-- {{__("Add Appointments")}} --}}
                </div> 
            </span>
        </h3>
        <ul class="leading-loose ml-10">
            @foreach ($appointments as $app)
                <li class="font-semibold text-xl list-disc flex gap-5 items-end"> 
                    Dr. {{$app['doctor']}} on {{$app['department']}} 
                    <span class="text-base flex gap-3 text-gray-600">
                        {{-- <a href="/details/edit/{{$app['id']}}" class="edit-app">
                            <img class="w-6" src="{{URL::asset('/img/icons/edit.svg')}}" alt=""/>
                        </a>
                        <a href="/details/destroy/{{$app['id']}}" class="delete-app">
                            <img class="w-6" src="{{URL::asset('/img/icons/delete.svg')}}" alt=""/>
                        </a> --}}
                    </span>
                </li>
                <p class="font-light italic"> 
                    {{$app['date_time']}}, 
                    @if(isset($app['duration_minutes']))
                        Took {{$app['duration_minutes']}} minute{{$app['duration_minutes'] > 1 ? 's' : ''}}.
                    @else
                        Expected to take {{$app['expected_minutes']}} minute{{$app['expected_minutes'] > 1 ? 's' : ''}}.
                    @endif
                </p>
                <p class="mb-5"> {{$app['description']}} </p>

            @endforeach
        </ul>


        <div class="w-96 m-auto my-10">
            {{$appointments->links()}}
        </div>
    </div>
    
    <div id="appointment-form" class="hidden ml-80 mt-6">@include('forms.appointment')</div>
    
</div>

<script>
    let main = document.querySelector('#appointment-details'); 
    let form = document.querySelector('#appointment-form'); 
    document.querySelector('#appointment-details .add-app').addEventListener('click', e => {
        main.style.display = 'none';
        form.style.display = 'block';
    });
</script>

@endsection