<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserTable; // Asegúrate de que el nombre del modelo es correcto
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination;
    public $user, $user_edit, $modal = false;

    public function mount()
    {

        $this->user = [
            'nombre' => '',
            'apellido' => '',
            'correo' => '',
            'telefono' => '',
            'contrasena' => '',
        ];
    }

    public function render()
    {
        $users = UserTable::paginate(10);
        return view('livewire.usuarios', compact('users'));
    }

    protected function rules()
    {
        return [
            'user.nombre' => 'required|string|max:255',
            'user.apellido' => 'required|string|max:255',
            'user.correo' => 'required|email|unique:users,email',
            'user.telefono' => 'required|string|max:20',
            'user.contrasena' => 'required|string|min:6',
        ];
    }

    protected function messages()
    {
        return [
            'user.nombre.required' => 'El nombre es obligatorio.',
            'user.apellido.required' => 'El apellido es obligatorio.',
            'user.correo.required' => 'El correo es obligatorio.',
            'user.correo.email' => 'El correo debe ser una dirección de correo válida.',
            'user.correo.unique' => 'El correo ya está registrado.',
            'user.telefono.required' => 'El teléfono es obligatorio.',
            'user.contrasena.required' => 'La contraseña es obligatoria.',
            'user.contrasena.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ];
    }

    protected function attributes()
    {
        return [
            'user.nombre' => 'nombre',
            'user.apellido' => 'apellido',
            'user.correo' => 'correo',
            'user.telefono' => 'teléfono',
            'user.contrasena' => 'contraseña',
        ];
    }

    public function save()
    {
        $this->validate();
        $user = new UserTable;
        $user->nombre = $this->user['nombre'];
        $user->apellido = $this->user['apellido'];
        $user->correo = $this->user['correo'];
        $user->telefono = $this->user['telefono'];
        $user->contrasena = bcrypt($this->user['contrasena']);
        $user->save();

        $registro = new User;
        $registro->name = $this->user['nombre'];
        $registro->email = $this->user['correo'];
        $registro->password = bcrypt($this->user['contrasena']);
        $registro->save();

        session()->flash('success', 'Usuario registrado correctamente.');

        $this->user = [
            'nombre' => '',
            'apellido' => '',
            'correo' => '',
            'telefono' => '',
            'contrasena' => '',
        ];
    }
    public function delete($id)
    {
        $user = UserTable::find($id);
        $user->delete();
        return redirect()->route('dashboard');
    }
}
