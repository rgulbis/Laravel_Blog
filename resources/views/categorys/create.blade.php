<x-layout>
    <x-slot:title>Create</x-slot:title>
    <h1>Create</h1>  
    <form method="POST" action="/categorys/{{ $category->id }}">
        @csrf
        <input name="category_name" type="text" placeholder="New category..">
        @error('category_name')
            <p>{{ $message }}</p>
        @enderror
        <button>Submit</button>
    </form>
</x-layout>