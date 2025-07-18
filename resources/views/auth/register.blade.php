<form action="{{ route('auth.postregister') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="username">
    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="example@gmail.com">
    <input type="number" name="age" placeholder="20">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="password_confirmation" placeholder="confirm password">

    <br><br>
    <button type="submit">Register</button>
</form>

<br>
<a href="{{ route('auth.login') }}">Kembali</a>
