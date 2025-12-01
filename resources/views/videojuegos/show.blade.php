<x-app-layout>
    <x-errores />
    <div class="card bg-base-300 w-full shadow-sm">
        <figure class="p-4">
            <img width="320" height="200"
                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title text-3xl uppercase">{{ $videojuego->nombre }}
            </h2>

            <ul class="list bg-base-100 rounded-box shadow-md">
                <li class="p-4 pb-2 opacity-60 tracking-wide text-xl">
                    Géneros
                </li>

                @foreach ($videojuego->generos as $genero)
                    <li class="list-row">
                        <div>
                            <img class="size-10 rounded-box"
                                src="https://img.daisyui.com/images/profile/demo/1@94.webp" />
                        </div>
                        <div>
                            <div class="text-lg">
                                <a class="link link-primary" href="{{ route('generos.show', $genero) }}">
                                    {{ $genero->genero }}
                                </a>
                            </div>
                        </div>
                        <form
                            action="{{ route(
                                'videojuegos.quitar_genero',
                                ['videojuego' => $videojuego, 'genero' => $genero]
                            ) }}"
                            method="POST"
                        >
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-square btn-ghost">🗑</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            @if ($otros_generos->isNotEmpty())
                <form
                    class="mt-4"
                    action="{{ route('videojuegos.agregar_genero', $videojuego) }}"
                    method="POST"
                    >
                    @csrf
                    <div class="flex gap-3">
                        <label for="genero_id" class="floating-label w-80">
                            <span>Género a añadir:</span>
                            <select class="select" name="genero_id" id="genero_id">
                                @foreach ($otros_generos as $otro_genero)
                                <option value="{{ $otro_genero->id }}">
                                    {{ $otro_genero->genero }}
                                </option>
                                @endforeach
                            </select>
                        </label>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
