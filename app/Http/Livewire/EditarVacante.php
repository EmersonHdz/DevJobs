<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $image_nueva;

    use WithFileUploads;
    

         //Validation rules
   protected $rules = [
    'titulo' => 'required|string',
    'salario' => 'required',
    'categoria' => 'required',
    'company' => 'required',
    'last_day' => 'required',
    'description' => 'required',
    'image_nueva' => 'nullable|image|max:1024',

     ];

         
    public function mount(Vacante $vacante){

        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->company = $vacante->company;
        $this->last_day = $vacante->last_day;
        $this->description = $vacante->description;
        $this->image = $vacante->image;
    }

    public function EditarVacante(){
        //validar
        $datos = $this->validate();

        if($this->image_nueva) {
            $image = $this->image_nueva->store('public/vacantes');
            $datos['image'] = str_replace('public/vacantes/', '', $image);
        }

        //encontrar vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //Asignar valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->company = $datos['company'];
        $vacante->last_day = $datos['last_day'];
        $vacante->description = $datos['description'];
        $vacante->image = $datos['image'] ?? $vacante->image;
      
        //Guardar vacante
        $vacante->save();

      //redireccionar
      session()->flash('message', 'It was updated correctly');

      return redirect()->route('vacantes.index');

    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
