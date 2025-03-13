<x-layout>
    <x-slot:title>Create</x-slot:title>
    <h1>Create</h1>  
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        <input name="content" type="text" placeholder="New post..">
        <select name="category_id">
            <option value="0">None</option>
            @foreach ($categorys as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        @error('content')
            <p>{{ $message }}</p>
        @enderror
        <button>Submit</button>
    </form>
</x-layout>
{{-- meowmeowmeowmeowmeow         wilu tevi meow --}}