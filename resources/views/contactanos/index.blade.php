<x-store-layout>
    <div class="container py-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <img src="{{ Storage::url('home/1045-web.jpg') }}" />
            </div>
            <div>
                <h1>xxxxxxxxxxxxxxxxxxxxxxx</h1>
                <form action="{{route('contactanos.store')}}" method="post">
                    @csrf
                    <label>
                        Nombre:
                        <br>
                        <input type="text" name="name">
                    </label>
                    @error('name')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                    <br>
                    <label>
                        Correo:
                        <br>
                        <input type="text" name="correo">
                    </label>
                    @error('correo')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                    <br>
                    <label>
                        Mensaje:
                        <br>
                        <textarea name="mensaje" rows="4"></textarea>
                    </label>
                    @error('mensaje')
                        <p><strong>{{$message}}</strong></p>
                    @enderror
                    <br>
                    <button type="submit">Enviar mensaje</button>
                </form>
            </div>
        </div>

        @if (session('info'))
            <script>
                alert("{{session('info')}}");
            </script>
        @endif
    </div>
</x-store-layout>