<x-app-layout>
    <div class="w-full max-w-md mx-auto">
        <form action="{{ route('habitaciones.index') }}" method="GET">
            <label for="fecha_entrada" class="floating-label">
                <span>Fecha de entrada:</span>
                <input class="input w-2xs" type="date" name="fecha_entrada" id="fecha_entrada"
                value="{{ $fecha_entrada }}">
            </label>
            <label for="fecha_salida" class="floating-label mt-4">
                <span>Fecha de salida:</span>
                <input class="input w-2xs" type="date" name="fecha_salida" id="fecha_salida"
                value="{{ $fecha_salida }}">
            </label>
            <div class="mt-4">
                <button class="btn btn-active" type="submit">Buscar disponibilidad</button>
                <a class="btn btn-ghost" href="{{ route('habitaciones.index') }}">Limpiar</a>
            </div>
        </form>
        <table class="table">
            <thead>
                <th>Número</th>
                <th>Planta</th>
                <th>Tipo</th>
                <th>Precio por noche</th>
                <th colspan="2">Acciones</th>
            </thead>
            <tbody>
                @foreach ($habitaciones as $habitacion)
                    <tr>
                        <td>
                            <a class="link link-primary"
                            href="{{ route('habitaciones.show', $habitacion) }}">
                                {{ $habitacion->numero }}
                            </a>
                        </td>
                        <td>{{ $habitacion->planta }}</td>
                        <td>{{ $habitacion->tipo }}</td>
                        <td>{{ $habitacion->precio_noche }}</td>
                        <td>
                            <form
                                action="{{ route('habitaciones.destroy', $habitacion) }}"
                                method="POST"
                            >
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-error" type="submit">
                                    Borrar
                                </button>
                            </form>
                        </td>
                        <td>
                            <form
                                action="{{ route('reservas.create', $habitacion) }}"
                                method="POST"
                            >
                                @csrf
                                <input type="hidden" name="fecha_entrada" value="{{ $fecha_entrada }}">
                                <input type="hidden" name="fecha_salida" value="{{ $fecha_salida }}">
                                <button class="btn btn-sm btn-success" type="submit">
                                    Reservar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
