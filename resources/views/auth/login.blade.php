<x-layout>
    <x-slot:title>Login</x-slot:title>
    <form class="auth-form" method="POST" action="/login">
        <h1>Login</h1>
        <hr>
        @csrf
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div>
                <button id="pointer">Submit</button>
                <a href="/register">Dont have an account?</a>
            </div>
        </div>
    </form>
</x-layout>