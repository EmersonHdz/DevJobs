<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante) {
        $this->vacante = $vacante;
    }
    public function postularme(){
        $datos = $this->validate();

        //save cv
      $cv =  $this->cv->store('public/cv');
      $datos['cv'] = str_replace('public/cv/' , '', $cv);

         //crear el candidato a la vacante
      $this->vacante->candidatos()->create([
        'user_id' => auth()->user()->id,
        'cv' => $datos['cv']
      ]);  

   //crear notificacion y enviarlo al email
      $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

      // mostrar el usuario un mensaje de ok
      session()->flash('message', 'The information was sent correctly, good luck');
      return redirect()->back();
    }

 


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
