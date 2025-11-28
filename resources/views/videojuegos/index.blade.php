<x-app-layout>
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Fecha de lanzamiento</th>
            <th>Desarrolladora</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
