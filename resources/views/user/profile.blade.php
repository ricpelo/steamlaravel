<x-app-layout>
    <div class="card bg-base-300 w-full shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-3xl uppercase tracking-wide">
                {{ $user->name }}
            </h2>
            <span class="pb-10">{{ $user->email }}</span>

            <ul class="list bg-base-100 rounded-box shadow-md">
                <li class="p-4 opacity-60 tracking-wide text-xl">
                    Videojuegos que tengo
                </li>

                @foreach ($user->videojuegos as $videojuego)
                    <li class="list-row">
                        <div>
                            <img class="size-10 rounded-box"
                                src="https://img.daisyui.com/images/profile/demo/1@94.webp" />
                        </div>
                        <div>
                            <div class="text-lg">
                                <a class="link link-primary" href="{{ route('videojuegos.show', $videojuego) }}">
                                    {{ $videojuego->nombre }}
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card-body">
            <ul class="list bg-base-100 rounded-box shadow-md">
                <li class="p-4 opacity-60 tracking-wide text-xl">
                    Hardware que tengo
                </li>

                @foreach ($user->hardware as $hardware)
                    <li class="list-row">
                        <div>
                            <img class="size-10 rounded-box"
                                src="https://img.daisyui.com/images/profile/demo/1@94.webp" />
                        </div>
                        <div>
                            <div class="text-lg">
                                <a class="link link-primary" href="#">
                                    {{ $hardware->nombre }}
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</x-app-layout>
