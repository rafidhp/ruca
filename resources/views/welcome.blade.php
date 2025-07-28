@if (Auth::check())
    <h2>Welcome {{ Auth::user()->name }}</h2>

    <br>
    <a href="{{ route('eduhub') }}">Ruca EduHub</a>

    <br><br>
    <a href="{{ route('auth.logout') }}">Logout</a>
@else
    <h2>Silakan login</h2>

    <br><br>
    <a href="{{ route('auth.login') }}">Login</a>
@endif
