<x-app-layout>
    <x-errores />

    <div class="w-full max-w-sm mx-auto">
        <form action="/clientes" method="POST" class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="dni" class="floating-label">
                <span>DNI:*</span>
                <input class="input" type="text" id="dni" name="dni" value="{{ old('dni') }}"><br>
            </label>
            <label for="nombre" class="floating-label">
                <span>Nombre:*</span>
                <input class="input" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br>
            </label>
            <label for="apellidos" class="floating-label">
                <span>Apellidos:</span>
                <input class="input" type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}"><br>
            </label>
            <label for="direccion" class="floating-label">
                <span>Dirección:</span>
                <input class="input" type="text" id="direccion" name="direccion" value="{{ old('direccion') }}"><br>
            </label>
            <label for="codpostal" class="floating-label">
                <span>Código postal:</span>
                <input class="input" type="text" id="codpostal" name="codpostal" value="{{ old('codpostal') }}"><br>
            </label>
            <label for="telefono" class="floating-label">
                <span>Teléfono:</span>
                <input class="input" type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success" type="submit">Insertar</button>
                <a href="/clientes" class="btn btn-soft btn-info">Volver</a>

            </div>
        </form>
    </div>
</x-app-layout>
