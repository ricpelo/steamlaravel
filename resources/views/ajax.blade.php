<x-app-layout>
    <input type="text" id="texto" />
    <button id="enviar">Enviar</button>
    <p id="resultado"></p>

    <script>
        document.getElementById('enviar').addEventListener('click', function() {
            const texto = document.getElementById('texto').value;

            fetch('/ajax/mayusculas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ texto: texto })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('resultado').textContent = data.resultado;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>
