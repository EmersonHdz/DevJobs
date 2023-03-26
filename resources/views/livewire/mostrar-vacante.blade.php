<div>
<div class="p-10">
   <div class="mb-5">
    <h3 class="font-bold text-3xl text-gray-800 my-3">
        {{ $vacante->titulo }}
    </h3>

   <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
      <p class="font-bold text-sm uppercase text-gray-800 my-3">Company:
        <span class="normal-case font-normal text-gray-800">{{ $vacante->company }}</span>
      </p>

    <p class="font-bold text-sm uppercase text-gray-800 my-3">Last Day:
      <span class="normal-case font-normal text-gray-800">{{ $vacante->last_day }}</span>
    </p>


    <p class="font-bold text-sm uppercase text-gray-800 my-3">Category:
      <span class="normal-case font-normal text-gray-800">{{ $vacante->categoria->categoria }}</span>
    </p>



    <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary:
      <span class="normal-case font-normal text-gray-800">{{ $vacante->salario->salario}}</span>
    </p>
   </div>
</div>

<div class="md:grid md:grid-cols-6 gap-5">
    <div class="md:col-span-2">
       <img src="{{ asset('storage/vacantes/' . $vacante->image) }}" alt="{{'Image Vacancy' . $vacante->titulo}}">
    </div>

    <div class="md:col-span-4">
        <h2 class="text-2xl font-bold mb-5 text-center">Vacancy Description</h2>
         <p class="gap-5">{{ $vacante->description}}</p>
    </div>
</div>
 
@guest
<div class="mt-5 border-gray-50 border border-dashed p-5 text-center">
  <p>
    you want to apply to the vacancy? <a href="{{ route('register') }}" class="font-bold text-indigo-600">create an account to apply for the vacancy</a>
  </p>
</div>
@endguest


@cannot('create', App\Models\Vacante::class)
       <livewire:postular-vacante :vacante="$vacante"/>    
@endcannot


</div>
