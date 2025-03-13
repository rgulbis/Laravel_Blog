<x-layout>
    <x-slot:title>Posts</x-slot:title>
    <h1>Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{ $post->id }}">{{ $post->content }}</a></li>
        @endforeach
    </ul>
</x-layout>