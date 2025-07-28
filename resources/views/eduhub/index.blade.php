<h2>Articles</h2>

<table>
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>photo</th>
        <th>content</th>
        <th>upload date</th>
        <th>category</th>
        <th>action</th>
    </tr>
    @foreach ($articles as $article)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $article->title }}</td>
            @if ($article->photo != null)
                <td>
                    <img src="{{ asset('/storage/article/' . $article->hashid . '_' . $article->photo) }}"
                        alt="article image" style="width: 150px">
                </td>
            @else
                <td>
                    <img src="https://ik.imagekit.io/rafidhp/ruca/article_template.jpg?updatedAt=1753728420809"
                        alt="article template" style="width: 150px">
                </td>
            @endif
            <td>{{ $article->content }}</td>
            <td>{{ $article->upload_date }}</td>
            <td>{{ $article->category->category_name }}</td>
            <td>
                <a href="">View detail</a>
                @cannot('isUser')
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                @endcannot
            </td>
        </tr>
    @endforeach
</table>
<br>

<h2>Videos</h2>

<table>
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Video</th>
        <th>description</th>
        <th>upload date</th>
        <th>category</th>
        <th>action</th>
    </tr>
    @foreach ($eduvids as $eduvid)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $eduvid->title }}</td>
            <td>
                <iframe width="350" height="197" src="https://www.youtube.com/embed/{{ $eduvid->youtube_id }}?rel=0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </td>
            <td>{{ $eduvid->description }}</td>
            <td>{{ $eduvid->upload_date }}</td>
            <td>{{ $eduvid->category->category_name }}</td>
            <td>
                @cannot('isUser')
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                @endcannot
            </td>
        </tr>
    @endforeach
</table>

<br><br>
@can('isPsikolog')
    <a href="{{ route('psi.dashboard', ['psikolog_id' => Auth::user()->psikolog->hashid]) }}">Kembali</a>
@elsecan('isUser')
    <a href="{{ route('dashboard') }}">Kembali</a>
@endcan
