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
    <hr>
    @foreach ($post->comments as $comment)
        <h4>{{ $comment->name }}</h4>
        <h4>{{ $comment->created_at }}</h4>
        <p>{{ $comment->comment }}</p>
        <hr>
    @endforeach
    <form method="POST" action="/comments">
        @csrf
        <input name="post_id" value="{{ $post->id }}" hidden>
        <input name="name" type="text"><br> 
        <textarea name="comment"></textarea><br>
        <button>Submit</button>
    </form>
</x-layout>