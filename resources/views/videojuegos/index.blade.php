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
                    <td>{{ $videojuego->nombre }}</td>
                    <td>{{ $videojuego->precio_formateado }}</td>
                    <td>{{ $videojuego->lanzamiento_formateado }}</td>
                    <td>{{ $videojuego->desarrolladora->denominacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
