<x-app-layout>
    <div class="w-full max-w-md mx-auto">
        <form action="{{ route('generos.index') }}" method="GET">
            <div class="flex gap-2">
                <label for="buscar" class="floating-label">
                    <span>Buscar:</span>
                    <input class="input w-2xs" type="text" name="buscar" id="buscar"
                        value="{{ $buscar }}">
                </label>
                <button class="btn btn-active" type="submit">Buscar</button>
                <a class="btn btn-ghost" href="{{ route('generos.index') }}">Limpiar</a>
            </div>
        </form>
        <table class="table">
            <thead>
                <th>Género</th>
            </thead>
            <tbody>
                @foreach ($generos as $genero)
                    <tr>
                        <td>{{ $genero->genero }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $generos->links() }}
    </div>
</x-app-layout>
