<x-app-layout>
    <x-errores />

    <form action="/clientes/{{ $cliente->id }}" method="POST">
        @method('PUT')
        @csrf
        <label for="dni">DNI:* </label>
        <input type="text" id="dni" name="dni" value="{{ old('dni', $cliente->dni) }}"><br>
        <label for="nombre">Nombre:* </label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}"><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $cliente->apellidos) }}"><br>
        <label for="direccion">Dirección: </label>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}"><br>
        <label for="codpostal">Código postal: </label>
        <input type="text" id="codpostal" name="codpostal" value="{{ old('codpostal', $cliente->codpostal) }}"><br>
        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"><br>
        <button type="submit">Modificar</button>
    </form>
</x-app-layout>
