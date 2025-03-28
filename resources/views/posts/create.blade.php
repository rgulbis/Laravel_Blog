<x-layout>
    <x-slot:title>Create</x-slot:title>
    <div class="create-post">
        <h1>Create</h1>  
        <hr>
        <form method="POST" action="/posts">
            @csrf
            <textarea name="content" placeholder="New post.."></textarea>
            <select name="category_id">
                <option value="">None</option>
                @foreach ($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <button id="pointer">Submit</button>
        </form>
    </div>
    <x-slot:categories>
    </x-slot:categories>
</x-layout>
{{-- meowmeowmeowmeowmeow         wilu tevi meow --}}