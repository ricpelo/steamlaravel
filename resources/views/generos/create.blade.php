<x-app-layout>
    <x-errores />

    <div class="w-full max-w-sm mx-auto">
        <h2 class="text-2xl font-bold mb-3">Insertar un género</h2>
        <form action="{{ route('generos.store') }}" method="POST"
            class="card bg-base-200 p-6 shadow">
            @csrf
            <label for="genero" class="floating-label">
                <span>Género:*</span>
                <input class="input" type="text" id="genero"
                    name="genero" value="{{ old('genero') }}"><br>
            </label>
            <div class="flex-2">
                <button class="btn btn-soft btn-success"
                    type="submit">Insertar</button>
                <a href="{{ route('generos.index') }}" class="btn btn-soft btn-info">Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>
