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

    public $puedeEditarse = false;

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
            $this->puedeEditarse = true;
        }
    }

    public function update()
    {
        if ($this->desarrolladora !== null) {
            $this->validate();
            $this->desarrolladora->denominacion = $this->denominacion;
            $this->desarrolladora->save();
            $this->resetFormulario();
        }
    }

    public function resetFormulario()
    {
        $this->desarrolladora = null;
        $this->denominacion = '';
        $this->puedeEditarse = false;
    }

    public function eliminar($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        if ($desarrolladora !== null) {
            $desarrolladora->delete();
        }
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
            <a class="btn btn-sm btn-ghost btn-primary" href="#">Dar de alta una nueva desarrolladora</a>
        </div>

        <!-- Formulario de creación y edición de desarrolladoras -->
        <div class="w-full max-w-sm mx-auto">
            <h2 class="text-2xl font-bold mb-3">Editar una desarrolladora</h2>
            <form class="card bg-base-200 p-6 shadow" wire:submit.prevent="update">
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
                        wire:show="puedeEditarse"
                    >
                        Editar
                    </button>
                    <button
                        class="btn btn-soft btn-error"
                        type="button"
                        wire:show="puedeEditarse"
                        wire:click="resetFormulario"
                    >
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
