<x-layout>
    <x-slot:title>Categorys</x-slot:title>
    <h1>Categorys</h1>
    <ul>
        @foreach ($categorys as $category)
            <li><a href="/categorys/{{ $category->id }}">{{ $category->category_name }}</a></li>
        @endforeach
    </ul>
</x-layout>