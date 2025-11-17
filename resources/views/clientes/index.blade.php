<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <table class="table">
            <thead>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th colspan="2">Acciones</th>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>
                        <form action="/clientes/{{ $cliente->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                    <td>
                        <a href="/clientes/{{ $cliente->id }}/edit">
                            Modificar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
