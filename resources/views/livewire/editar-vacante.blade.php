<div>
<form  class="md:w-1/2 space-y-5"  wire:submit.prevent='EditarVacante'>
    <!-- Title vacancy -->
    <div>
      <x-label for="titulo" :value="__('Title Vacancy')" />
  
      <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Title Vacancy" />
  
      @error('titulo')
         <livewire:mostrar-alerta :message="$message" />
      @enderror
  </div>
  
   <!-- Salary vacancy -->
   <div class="mt-4">
      <x-label for="salario" :value="__('Salary Vacancy')" />
  
      <select wire:model="salario" id="salario" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        <option value="">Get Opcion</option>
        @foreach ($salarios as $salario)
            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
        @endforeach
      </select>
  
      @error('salario')
      <livewire:mostrar-alerta :message="$message" />
   @enderror
  </div>
  
  <!-- Category vacancy -->
  <div class="mt-4">
      <x-label for="categoria" :value="__('Category Vacancy')" />
  
      <select wire:model="categoria" id="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
        <option value="">Get Category</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
        @endforeach
      </select>
  
      @error('categoria')
      <livewire:mostrar-alerta :message="$message" />
   @enderror
  </div>
  
    <!-- Company vacancy -->
    <div class="mt-4">
      <x-label for="company" :value="__('Company Vacancy')" />
  
      <x-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" placeholder="Company e. Netflix, Uber, Shopify" />
  
      @error('company')
      <livewire:mostrar-alerta :message="$message" />
   @enderror
  </div>
  
    <!-- Last day vacancy -->
    <div class="mt-4">
      <x-label for="last_day" :value="__('Last day vacancy')" />
  
      <x-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" />
  
      @error('last_day')
      <livewire:mostrar-alerta :message="$message" />
   @enderror
  </div>
  
    <!-- Description -->
    <div class="mt-4">
      <x-label for="description" :value="__('Vacancy Description')" />
  
      <textarea wire:model="description" id="" placeholder="Description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72">
  
      </textarea>
  
      @error('description')
      <livewire:mostrar-alerta :message="$message" />
   @enderror
      
  
        <!-- Image vacancy -->
    <div class="mt-4">
      <x-label for="image" :value="__('Image')" />
  
      <x-input accept="image/*" id="image" class="block mt-1 w-full" type="file" wire:model="image_nueva" />
  
       <!-- create a temporari Image-->

       <div class="my-5">
        <x-label :value="__('Old Image')" />

        <img src="{{ asset('storage/vacantes/' . $image) }}" alt="{{ 'Image Vacancy' . $titulo }}">

       </div>

   <div class="my-5">
        @if($image_nueva)
          Imagen:
          <img src="{{ $image_nueva->temporaryUrl() }}">
        @endif
      </div>
   
  
      @error('image_nueva')
      <livewire:mostrar-alerta :message="$message" />
   @enderror
  </div>
  
  </div>
  
  <x-button>
   Save Changes
  </x-button>    
  </form>

</div>
  
