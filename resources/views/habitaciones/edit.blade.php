<x-app-layout>
    <x-errores />

    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Editar una habitación</h2>
        <form action="{{ route('habitaciones.update', $habitacion) }}" method="POST"
            class="card bg-base-200 p-6 shadow">
            @method('PUT')
            @csrf
            <label for="numero" class="floating-label">
                <span>Número:*</span>
                <input class="input" type="text" id="numero"
                    name="numero" value="{{ old('numero', $habitacion->numero) }}"><br>
            </label>
            <label for="planta" class="floating-label">
                <span>Planta:</span>
                <input class="input" type="text" id="planta"
                    name="planta" value="{{ old('planta', $habitacion->planta) }}"><br>
            </label>
            <label for="tipo" class="floating-label">
                <span>Tipo:</span>
                <input class="input" type="text" id="tipo"
                    name="tipo" value="{{ old('tipo', $habitacion->tipo) }}"><br>
            </label>
            <label for="precio_noche" class="floating-label">
                <span>Precio por noche:</span>
                <input class="input" type="text" id="precio_noche"
                    name="precio_noche" value="{{ old('precio_noche', $habitacion->precio_noche) }}"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                    type="submit">Editar</button>
                <a href="{{ route('habitaciones.index') }}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
