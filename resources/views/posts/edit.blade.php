<x-layout>
    <x-slot:title>{{ $post->content }}</x-slot:title>
    <h1>Edit "{{ $post->content }}"</h1>  
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <textarea name="content" placeholder="Edited post..">{{ old("content", $post->content) }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror
        <select name="category_id">
            <option value="">None</option>
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