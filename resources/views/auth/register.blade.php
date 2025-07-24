<form action="{{ route('auth.postregister') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="username">
    @error('username')
        {{ $message }}
    @enderror
    <input type="text" name="name" placeholder="name">
    @error('name')
        {{ $message }}
    @enderror
    <input type="email" name="email" placeholder="example@gmail.com">
    @error('email')
        {{ $message }}
    @enderror
    <label for="birth_date">Tanggal lahir</label>
    <input type="date" name="birth_date" id="birth_date" min="{{ date('1960-m-d') }}" max="{{ date('2020-m-d') }}"
        required>
    @error('birth_date')
        {{ $message }}
    @enderror
    <input type="password" name="password" placeholder="password">
    @error('password')
        {{ $message }}
    @enderror
    <input type="password" name="password_confirmation" placeholder="confirm password">

    <br><br>
    <button type="submit">Register</button>
</form>

<br>
<a href="{{ route('auth.login') }}">Kembali</a>
