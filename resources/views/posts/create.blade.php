<x-layout>
    <x-slot:title>Create</x-slot:title>
    <h1>Create</h1>  
    <form method="POST" action="/posts">
        @csrf
        <textarea name="content" placeholder="New post.."></textarea>
        <select name="category_id">
            <option value="">None</option>
            @foreach ($categorys as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        @error('content')
            <p>{{ $message }}</p>
        @enderror
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror
        <button>Submit</button>
    </form>
    <x-slot:categories>
    </x-slot:categories>
</x-layout>
{{-- meowmeowmeowmeowmeow         wilu tevi meow --}}