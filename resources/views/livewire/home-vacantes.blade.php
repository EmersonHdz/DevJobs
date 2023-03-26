<div>
    <livewire:filtrar-vacantes/>
      <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12 text-center">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                       <div>
                             <a href="{{  route('vacantes.show', $vacante->id) }}" class="text-3xl font-extrabold text-gray-600">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-600 mb-3">{{ $vacante->company }}</p>
                            <p class="font-bold text-xs text-gray-600">Last Day
                                <span class="font-normal">{{$vacante->last_day}}</span>
                            </p>
                       </div>
                       <div class="mt-5">
                         <a href="{{ route('vacantes.show', $vacante->id) }}" class="bg-gray-800 p-3 mb-5 text-sm uppercase font-bold text-white rounded-lg">See Vacancy</a>
                       </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">Not Vacancies</p>
                @endforelse
            </div>
        </div>
      </div>
</div>
