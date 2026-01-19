<x-app-layout>
    <x-errores />

    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Insertar un videojuego</h2>
        <form action="/videojuegos" method="POST"
            enctype="multipart/form-data"
            class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="nombre" class="floating-label">
                <span>Nombre:*</span>
                <input class="input" type="text" id="nombre"
                    name="nombre" value="{{ old('nombre') }}"><br>
            </label>
            <label for="precio" class="floating-label">
                <span>Precio:</span>
                <input class="input" type="text" id="precio"
                    name="precio" value="{{ old('precio') }}"><br>
            </label>
            <label for="lanzamiento" class="floating-label">
                <span>Lanzamiento:</span>
                <input class="input" type="date" id="lanzamiento"
                    name="lanzamiento" value="{{ old('lanzamiento') }}"><br>
            </label>
            <label for="desarrolladora_id" class="floating-label">
                <span>Desarrolladora:</span>
                <select class="select" name="desarrolladora_id" id="desarrolladora_id">
                    @foreach ($desarrolladoras as $desarrolladora)
                        <option
                            value="{{ $desarrolladora->id }}"
                            {{ old('desarrolladora_id') == $desarrolladora->id ? 'selected' : '' }}
                        >
                            {{ $desarrolladora->denominacion }}
                        </option>
                    @endforeach
                </select>
            </label>
            <div class="mt-6 mb-4">
                <label for="imagen" class="floating-label">
                    <span>Imagen:</span>
                    <input class="file-input" type="file" id="imagen"
                    name="imagen" value="{{ old('imagen') }}">
                </label>
            </div>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                type="submit">Insertar</button>
                <a href="/videojuegos" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
