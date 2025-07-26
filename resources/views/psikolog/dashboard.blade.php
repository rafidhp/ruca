<h2>Welcome {{ $psikolog->user->name }}</h2>

<br>
<a href="">Ruca EduHub</a>

<iframe width="560" height="315" src="https://www.youtube.com/embed/kNyJPlOdxQs" title="YouTube video player"
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen></iframe>
<br><br>
<a href="{{ route('auth.logout') }}">Logout</a>
