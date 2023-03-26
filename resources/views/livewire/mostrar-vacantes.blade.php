  <div>
  <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">

            
        @forelse ($vacantes as $vacante)
            
        
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
           <div class="leading-10 mb-5">
            <a class="text-xl font-bold" href="{{ route('vacantes.show', $vacante->id) }}">
                {{$vacante->titulo}}
            </a>
            <p class="test-sm text-gray-600 font-bold">{{$vacante->company}}</p>
            <p>Last Day: {{$vacante->last_day}}</p>
           </div>

           <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center ">
                {{ $vacante->candidatos->count()}}
                Candidatos
            </a>

            <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Edit
            </a>

            <button wire:click="$emit('mostrarAlerta', {{ $vacante->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Delete
            </button>
           </div>
        </div>

        @empty
            <p class="p-3 text-center text-sm text-gray-600">There is not any vacancy</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{$vacantes->links()}}
    </div>

    </div>

       <!-- Script de alertas sweetalert-->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
                //eliminar vacante
                Livewire.emit('eliminarVacante', vacanteId )
              Swal.fire(
               'Deleted!',
               'Your file has been deleted.',
               'success'
    )
  }
})
        })
       
    </script>
    @endpush

