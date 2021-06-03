<x-app-layout>
    <ul>
        @foreach ($products as $product)
            <li>{{$product}}</li>
        @endforeach
    </ul>
</x-app-layout>