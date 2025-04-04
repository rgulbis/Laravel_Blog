<x-layout>
    <x-slot:title>Register</x-slot:title>
    <form class="auth-form" method="POST">
        <h1>Register</h1>
        <hr>
        @csrf
        <div>
            <input type="text" name="first_name" placeholder="Name" value="{{ old("first_name", "") }}" required>
            <input type="text" name="last_name" placeholder="Last Name" value="{{ old("last_name", "") }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old("email", "") }}" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <div>
                <button>Submit</button>
                <a href="/login">Have an account?</a>
            </div>
        </div>
    </form>
</x-layout>