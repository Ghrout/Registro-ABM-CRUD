<?php

namespace App\Livewire;

use App\Models\UserTable;
use Livewire\Component;

class EdicionUsuario extends Component
{
    public $id, $user, $user_edit, $modal = false, $nombre, $apellido, $telefono, $correo;
    public function mount($id)
    {
        $this->user = UserTable::find($id);
        $this->nombre = $this->user->nombre;
        $this->apellido = $this->user->apellido;
        $this->correo = $this->user->correo;
        $this->telefono = $this->user->telefono;
    }

    public function openModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function render()
    {
        return view('livewire.edicion-usuario');
    }

    public function save()
    {
        $this->user->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
        ]);
        $this->closeModal();
        return redirect()->route('dashboard');
    }

    
}
