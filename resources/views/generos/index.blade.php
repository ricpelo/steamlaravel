<x-app-layout>
    <div class="w-full max-w-sm mx-auto">
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
    </div>
</x-app-layout>
