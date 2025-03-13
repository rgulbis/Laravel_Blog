<x-layout>
    <x-slot:title>{{ $post->content }}</x-slot:title>
    <h1>Show</h1>
    <h3>{{ $post->content }}</h3>
    <a href="/posts/{{ $post->id }}/edit">Edit</a>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
    <h3>Comments</h3>
    <form method="POST">

    </form>
</x-layout>