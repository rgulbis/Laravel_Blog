<x-layout>
    <x-slot:title>Login</x-slot:title>
    <form class="auth-form" method="POST" action="/login">
        <h1>Login</h1>
        <hr>
        @csrf
        <div>
            <input type="email" name="email" placeholder="Email" value="{{ old("email", "") }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <div>
                <button id="pointer">Submit</button>
                <a href="/register">Dont have an account?</a>
            </div>
        </div>
    </form>
</x-layout>