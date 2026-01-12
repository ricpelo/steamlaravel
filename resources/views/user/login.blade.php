<x-app-layout>
    <div class="w-full max-w-md mx-auto">
        <x-errores />
        <form action="{{ route('login.perform') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <label for="email" class="floating-label">
                <span>Email:</span>
                <input class="input w-full" type="email" name="email" id="email"
                       value="{{ old('email') }}" required>
            </label>
            <label for="password" class="floating-label">
                <span>Contraseña:</span>
                <input class="input w-full" type="password" name="password" id="password" required>
            </label>
            <button class="btn btn-active" type="submit">Iniciar Sesión</button>
        </form>
    </div>
</x-app-layout>
