<x-layout>
    <x-slot:title>Categories</x-slot:title>
    <div class="categories-all">
        <h1>Categories</h1>
        <hr>
        <ul>
            @foreach ($categorys as $category)
                <li><a href="/categorys/{{ $category->id }}">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
    </div>
</x-layout>