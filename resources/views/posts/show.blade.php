<x-layout>
    <x-slot:title>{{ $post->content }}</x-slot:title>
    <h1>Show</h1>
    <h3>{{ $post->content }}</h3>
    <h3>{{ $post->category->category_name ?? "" }}</h3>
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
        <h4>{{ $comment->created_at->timezone('Europe/Riga')->format('d.m.Y H:i:s') }}</h4>
        <p>{{ $comment->comment }}</p>
        <div class="comment-menu">
            <div class="comment-dots">
                <svg class="pointer" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
            </div>
            <div class="comment-options">
                <a href="/comments/{{ $comment->id }}/edit">Edit</a>
                <form method="POST" action="/comments/{{ $comment->id }}">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        </div>
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