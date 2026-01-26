<?php

use Livewire\Component;

new class extends Component
{
    public int $contador = 0;
    public string $texto = '';

    public function incrementar()
    {
        $this->contador++;
    }

    public function mayusculas()
    {
        $this->texto = mb_strtoupper($this->texto);
    }
};
?>

<div>
    <h1 class="text-2xl font-bold mb-3">Contador: {{ $contador }}</h1>
    <button wire:click="incrementar" class="btn btn-primary">Incrementar</button>
    <input
        type="text"
        wire:model="texto"
        wire:blur="mayusculas"
        wire:keydown.enter="mayusculas"
        class="input mt-4"
        placeholder="Escribe algo aquí"
    >
    <div class="mt-4">
        <strong>Texto en mayúsculas:</strong> {{ $texto }}
    </div>
</div>
