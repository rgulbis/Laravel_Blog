<x-layout>
    <x-slot:title>{{ $category->category_name }}</x-slot:title>
    <h1>Show</h1>
    <h3>{{ $category->category_name }}</h3>
    <a href="/categorys/{{ $category->id }}/edit">Edit</a>
    <form method="POST" action="/categorys/{{ $category->id }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
</x-layout>