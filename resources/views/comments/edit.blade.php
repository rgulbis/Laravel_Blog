<x-layout>
    <x-slot:title>{{ $comment->post->content }}</x-slot:title>
    <h1>Show</h1>
    <h3>{{ $comment->post->content }}</h3>
    <h3>{{ $comment->post->category->category_name ?? "" }}</h3>
    <a href="/posts/{{ $comment->post->id }}/edit">Edit</a>
    <form method="POST" action="/posts/{{ $comment->post->id }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
    <h3>Comments</h3>
    <hr>
    @foreach ($comment->post->comments as $comment_regular)
        <h4>{{ $comment_regular->name }}</h4>
        <h4>{{ $comment_regular->created_at->timezone('Europe/Riga')->format('d.m.Y H:i:s') }}</h4>
        @if ($comment_regular->id == $comment->id)
            <form method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method('PUT')
                <input name="comment" value="{{ old("comment", $comment_regular->comment) }}">
                <button>Submit</button>
            </form>
        @else
            <p>{{ $comment_regular->comment }}</p>
        @endif
        <div id="comment-menu">
            <div id="comment-dots">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                <input type="checkbox">
            </div>
            <div id="comment-options">
                <a href="/comments/{{ $comment_regular->id }}/edit">Edit</a>
                <form method="POST" action="/comments/{{ $comment_regular->id }}">
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
        <input name="post_id" value="{{ $comment->post->id }}" hidden>
        <input name="name" type="text"><br> 
        <textarea name="comment"></textarea><br>
        <button>Submit</button>
    </form>
</x-layout>
