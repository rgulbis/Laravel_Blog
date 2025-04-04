<x-layout>
    <x-slot:title>Create</x-slot:title> 
    <div class="create-category">
        <h1>Create Category</h1>
        <hr>
        <form method="POST" action="/categorys">
            @csrf
            <input name="category_name" type="text" placeholder="New category..">
            <button>Submit</button>
        </form>
    </div>
</x-layout>