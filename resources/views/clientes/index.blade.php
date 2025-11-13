<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                    <th scope="col" class="px-6 py-3 font-medium">DNI</th>
                    <th scope="col" class="px-6 py-3 font-medium">Nombre</th>
                    <th scope="col" class="px-6 py-3 font-medium">Apellidos</th>
                    <th scope="col" class="px-6 py-3 font-medium">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr class="bg-neutral-primary border-b border-default">
                        <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $cliente->dni }}</td>
                        <td class="px-6 py-4">{{ $cliente->nombre }}</td>
                        <td class="px-6 py-4">{{ $cliente->apellidos }}</td>
                        <td>
                            <form action="/clientes/borrar/{{ $cliente->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
