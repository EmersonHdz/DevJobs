<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-4xl font-bold text-center my-10">Candidato Vacante: {{$vacante->titulo}}</h1>

                  <div class="md:flex md:justify-center p-5">
                   <ul class="divide-y divide-gray-200 w-full">
                      @forelse ($vacante->candidatos as $candidato)
                          <li class="p-3 flex items-center">
                            <div class="flex-1">
                                <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                <p class="text-sm font-medium text-gray-600">{{ $candidato->user->email }}</p>
                                <p class="text-sm font-medium  text-gray-600">Dia que se postulo: <span class="font-normal"> {{ $candidato->created_at->diffForHumans() }} </span> </p>
                                  
                            </div>
                               <a href="{{ asset('storage/cv/' . $candidato->cv) }}" class="inline-flex items-center shadow-sm px-2 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                 target="_blank" rel="noreferrer noopener">See CV</a>
                            <div>

                            </div>
                          </li>
                      @empty
                          <p class="p-3 text-center text-sm text-gray-600">Not Candidatos</p>
                      @endforelse
                   </ul>
                  </div>   

                </div>
            </div>
        </div>
    </div>
</x-app-layout>