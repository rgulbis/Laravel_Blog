<x-layout>
    <x-slot:title>Register</x-slot:title>
    <form class="auth-form" method="POST">
        <h1>Register</h1>
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
            <input type="text" name="first_name" placeholder="Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <div>
                <button>Submit</button>
                <a href="/login">Have an account?</a>
            </div>
        </div>
    </form>
</x-layout>