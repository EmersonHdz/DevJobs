<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
     public $titulo;
     public $salario;
     public $categoria;
     public $company;
     public $last_day;
     public $description;
     public $image;

     use WithFileUploads;
  

     //Validation rules
     protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
     ];

    // validate 
     public function crearVacante(){
        $datos = $this->validate();

        //save image
      $imagen =  $this->image->store('public/vacantes');
      $datos['image'] = str_replace('public/vacantes' , '', $imagen);

     // Create a vacancy
      Vacante::create([
        'titulo' => $datos['titulo'],
        'salario_id' => $datos['salario'],
        'categoria_id' => $datos['categoria'],
        'company' => $datos['company'],
        'last_day' => $datos['last_day'],
        'description' => $datos['description'],
        'image' => $datos['image'],
        'user_id' => auth()->user()->id,

     ]);

     //create a message alert
     session()->flash('message', 'Vacancy has been posted');

     //redirectionar user
     return redirect()->route('vacantes.index');

 }


    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
