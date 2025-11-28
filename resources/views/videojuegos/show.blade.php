<x-app-layout>
    <div class="card bg-base-100 w-full shadow-sm">
        <figure>
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
                        <button class="btn btn-square btn-ghost">
                            <svg class="size-[1.2em]"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <g stroke-linejoin="round"
                                    stroke-linecap="round" stroke-width="2"
                                    fill="none" stroke="currentColor">
                                    <path d="M6 3L20 12 6 21 6 3z"></path>
                                </g>
                            </svg>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
