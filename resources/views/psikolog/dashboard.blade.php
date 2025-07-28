<h2>Welcome {{ $psikolog->user->name }}</h2>

<br>
<a href="">Ruca EduHub</a>

@foreach ($eduvids as $eduvid)
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $eduvid->youtube_id }}?rel=0"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
@endforeach
<br><br>
<a href="{{ route('auth.logout') }}">Logout</a>
