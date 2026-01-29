<?php

use App\Models\Desarrolladora;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    public ?Desarrolladora $desarrolladora = null;

    #[Validate('required|string|max:255')]
    public string $denominacion = '';

    public $modal = false;

    public $esEditar = false;

    #[Computed]
    public function desarrolladoras()
    {
        return Desarrolladora::all();
    }

    public function editar($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        if ($desarrolladora !== null) {
            // Lógica para cargar los datos de la desarrolladora en el formulario de edición
            $this->desarrolladora = $desarrolladora;
            $this->denominacion = $desarrolladora->denominacion;
            $this->modal = true;
            $this->esEditar = true;
        }
    }

    public function createUpdate()
    {
        $this->validate();
        if ($this->desarrolladora === null) {
            Desarrolladora::create([
                'denominacion' => $this->denominacion,
                'editora_id' => 1,
            ]);
        } else {
            $this->desarrolladora->denominacion = $this->denominacion;
            $this->desarrolladora->save();
        }
        $this->resetFormulario();
    }

    public function resetFormulario()
    {
        $this->desarrolladora = null;
        $this->denominacion = '';
        $this->modal = false;
    }

    public function eliminar($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        if ($desarrolladora !== null) {
            $desarrolladora->delete();
        }
    }

    public function crear()
    {
        $this->resetFormulario();
        $this->modal = true;
        $this->esEditar = false;
    }
}
?>

<div>
    <div class="flex justify-center">
        <div class="mx-auto p-4">
            <h1 class="text-3xl font-bold mb-4">Desarrolladoras</h1>
            <table class="table">
                <thead>
                    <th>Denominación</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($this->desarrolladoras as $desarrolladora)
                        <tr>
                            <td>{{ $desarrolladora->denominacion }}</td>
                            <td>
                                <div class="flex gap-2">
                                    <button
                                        class="btn btn-sm btn-info btn-ghost"
                                        wire:click="editar({{ $desarrolladora->id }})"
                                    >
                                        Editar
                                    </button>
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-ghost btn-error"
                                        onclick="return confirm('¿Está seguro de que desea eliminar esta desarrolladora?')"
                                        wire:click="eliminar({{ $desarrolladora->id }})"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-soft btn-primary mt-4"
                wire:click="crear">
                Dar de alta una nueva desarrolladora
            </button>
        </div>

        <!-- Formulario de creación y edición de desarrolladoras -->
        <div class="w-full max-w-sm mx-auto" wire:show="modal">
            <h2 class="text-2xl font-bold mb-3">{{ $esEditar ? 'Editar una desarrolladora' : 'Crear una desarrolladora' }}</h2>
            <form class="card bg-base-200 p-6 shadow" wire:submit.prevent="createUpdate">
                <label for="denominacion" class="floating-label">
                    <span>denominacion:*</span>
                    <input class="input" type="text" id="denominacion"
                        name="denominacion" wire:model="denominacion">
                    @error('denominacion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>
                <div class="flex-2 mt-2">
                    <button
                        class="btn btn-soft btn-success"
                        type="submit"
                    >
                        {{ $esEditar ? 'Editar' : 'Crear' }}
                    </button>
                    <button
                        class="btn btn-soft btn-error"
                        type="button"

                        wire:click="resetFormulario"
                    >
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
