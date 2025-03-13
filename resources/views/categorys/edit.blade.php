<x-layout>
    <x-slot:title>{{ $category->category_name }}</x-slot:title>
    <h1>Edit "{{ $category->category_name }}"</h1>  
    <form method="POST" action="/categorys/{{ $category->id }}">
        @csrf
        @method('PUT')
        <input name="category_name" type="text" placeholder="Edited post.." value="{{ old("category_name", $category->category_name) }}">
        @error('category_name')
            <p>{{ $message }}</p>
        @enderror
        <button>Confirm</button>
    </form>
</x-layout>