<x-app-layout>
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Fecha de lanzamiento</th>
            <th>Desarrolladora</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
                <tr>
                    <td>
                        <a class="link link-primary"
                           href="{{ route('videojuegos.show', $videojuego) }}">
                            {{ $videojuego->nombre }}
                        </a>
                    </td>
                    <td>{{ $videojuego->precio_formateado }}</td>
                    <td>{{ $videojuego->lanzamiento_formateado }}</td>
                    <td>{{ $videojuego->desarrolladora->denominacion }}</td>
                    <td>
                        <div class="flex gap-2">
                            @can('update', $videojuego)
                            <a
                                class="btn btn-sm btn-ghost btn-info"
                                href="{{ route('videojuegos.edit', $videojuego) }}"
                            >
                                Editar
                            </a>
                            @endcan
                            @can('delete', $videojuego)
                                <form
                                    method="POST"
                                    action="{{ route('videojuegos.destroy', $videojuego) }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-ghost btn-error"
                                        onclick="return confirm('¿Está seguro de que desea eliminar este videojuego?')"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
    @can('videojuego-create')
        <a class="btn btn-sm btn-ghost btn-primary" href="{{ route('videojuegos.create') }}">Dar de alta un nuevo videojuego</a>
    @endcan
</x-app-layout>
