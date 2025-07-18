<form action="{{ route('auth.postlogin') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="Username">
    @error('username')
        {{ $message }}
    @enderror
    <input type="password" name="password" placeholder="Password">
    @error('password')
        {{ $message }}
    @enderror
    <button type="submit">Login</button>
</form>
@if (session('success'))
    <br>
    {{ session('success') }}
@endif

<br>
<a href="{{ route('auth.register') }}">Register</a>
<br><br>
<a href="{{ route('dashboard') }}">Kembali</a>
