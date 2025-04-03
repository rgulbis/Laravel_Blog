<x-layout>
    <x-slot:title>Posts</x-slot:title>
    <div class="head">
        <h1>Posts</h1>
        <hr>
        <div class="filters">
            <form id="{{ $searchQuery ? "" : "hidden"}}" >
                {{-- Seit ir lai paliktu categorijas filtrs bet searchs ne --}}
                <input hidden name="query" value="">
                <input hidden name="query-category" value="{{ $categoryQuery }}">
                <button class="tag">
                    <p>{{ $searchQuery }}</p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                </button>
            </form>
            <form id="{{ $categoryTag ? "" : "hidden"}}">
                {{-- Un te otradak --}}
                <input hidden name="query" value="{{ $searchQuery }}">
                <input hidden name="query-category" value="">
                <button class="tag">
                    <p>{{ $categoryTag }}</p>
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                </button>
            </form>
        </div>
    </div>
    <ul class="posts">
        @if ($posts->isEmpty())
            <div class="no-post">
                <h3>
                    No Posts
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 10l.01 0" /><path d="M15 10l.01 0" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>
                </h3>
            </div>
        @endif
        @foreach ($posts as $post)
            <li>
                <div class="post">
                    <p>{{ $post->content }}</p>
                    <div class="options-wrap" id="{{ !(Auth::user()->id == $post->user_id) ? "hidden" : "" }}">
                        <svg class="options-dots" id="pointer" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                        <div class="options">
                            <a href="/posts/{{ $post->id }}/edit">Edit</a>
                            <form method="POST" action="/posts/{{ $post->id }}">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                    </div>
                    <p class="post-category">{{ $post->category?->category_name ? '#' . $post->category->category_name : '' }}</p>
                </div>
                <div class="comments">
                    @if ($post->comments->isEmpty())
                        <div class="no-comment">
                            <h3>
                                No Comments
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 10l.01 0" /><path d="M15 10l.01 0" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>
                            </h3>
                        </div>
                    @endif
                    @foreach ($post->comments as $comment)
                        <div class="comment">
                            <h4 class="comment-name">{{ $comment->name }}</h4>
                            <h4 class="comment-date">{{ $comment->created_at->timezone('Europe/Riga')->format('d.m.Y H:i:s') }}</h4>
                            <p class="comment-comment">{{ $comment->comment }}</p>
                            <div class="options-wrap" id="{{ !(Auth::user()->id == $comment->user_id) ? "hidden" : "" }}">
                                <svg class="options-dots" id="pointer" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                <div class="options">
                                    <a href="/comments/{{ $comment->id }}/edit">Edit</a>
                                    <form method="POST" action="/comments/{{ $comment->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="create-comment">
                    <form method="POST" action="/comments">
                        @csrf
                        <input name="post_id" value="{{ $post->id }}" hidden>
                        <input class="create-comment-name" name="name" value="{{ Auth::user()->first_name ?? "" }}" type="text" placeholder="Name.." readonly> 
                        <textarea class="create-comment-comment" name="comment" placeholder="Your Comment.."></textarea>
                        <button class="create-comment-button" id="pointer">Submit</button>
                    </form>
                </div>
                <div class="comments-bar">
                    <p class="comment-bar-comments" id="pointer">
                        {{ $post->comments->count() }}
                        -
                        Comments
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M16 9l-4 -4" /><path d="M8 9l4 -4" /></svg>
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M16 15l-4 4" /><path d="M8 15l4 4" /></svg>
                    </p>
                    <p class="comment-bar-new" id="pointer">
                        New
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg>                    
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    </p>
                </div>
            </li>
        @endforeach
    </ul>
    <x-slot:categories>
        <form>
            <div class="search-field">
                <h1>Search</h1>
                <hr>
                <div>
                    <input name="query" placeholder="Search posts.."  value="{{ $searchQuery }}">
                    <button id="pointer">Search</button>
                </div>
            </div>
            <div class="search-categories">
                <h2>Search Categories</h2>
                <hr>
                <div>
                    <select name="query-category">
                        <option selected disabled value="">Choose a Category</option>
                        @foreach ($categorys as $category)
                            <option @selected($category->id == $categoryQuery) value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <button id="pointer">Search</button>
                </div>
            </div>
        </form>
    </x-slot:categories>
</x-layout>
