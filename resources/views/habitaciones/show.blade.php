<x-app-layout>
    <x-errores />
    <div class="card bg-base-300 w-full shadow-sm">
        <figure class="p-4">
            <img width="320" height="200"
                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title text-3xl uppercase tracking-wide">
                {{ $habitacion->numero }}
            </h2>

            <div class="list bg-base-100 rounded-box shadow-md">
                <span class="p-4 pb-2 opacity-60 tracking-wide text-xl">
                    Reservas
                </span>

                <table class="table">
                    <thead>
                        <th>Fecha de entrada</th>
                        <th>Fecha de salida</th>
                        <th>Precio total</th>
                        <th>Acciones</th>
                    </thead>
                    @foreach ($habitacion->reservas_activas as $reserva)
                        <tr>
                            <td>{{ $reserva->fecha_entrada_formateada }}</td>
                            <td>{{ $reserva->fecha_salida_formateada }}</td>
                            <td>
                                {{ $reserva->precio_total_formateado }}
                            </td>
                            <td>
                                <form
                                    action="{{ route('reservas.destroy', $reserva->id) }}"
                                    method="POST"
                                >
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-error" type="submit">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
        </div>
    </div>
</x-app-layout>
