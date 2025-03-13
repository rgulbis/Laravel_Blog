<x-layout>
    <x-slot:title>{{ $post->content }}</x-slot:title>
    <h1>Edit "{{ $post->content }}"</h1>  
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <input name="content" type="text" placeholder="Edited post.." value="{{ old("content", $post->content) }}">
        @error('content')
            <p>{{ $message }}</p>
        @enderror
        <select name="category_id">
            <option value="0">None</option>
            @foreach ($categorys as $category)
                <option 
                    {{ $category->id == $post->category_id ? "selected" : "" }} 
                    value="{{ $category->id }}"
                    >{{ $category->category_name }}
                </option>
            @endforeach
        </select>
        <button>Confirm</button>
    </form>
</x-layout>