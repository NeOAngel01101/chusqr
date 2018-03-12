<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a> - <a href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>
    @if(Auth::user() && Auth::user()->amI())
    <div class="card-section">
        @can('update', $chusqer)
            <a href="{{ Route('chusqers.edit', $chusqer) }}" class="button warning">Editar</a>
        @endcan
        @can('delete', $chusqer)
        <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="button alert">Borra</button>

        </form>
        @endcan
                @if( Auth::user()->Liked($chusqer))
                    <form action="{{ $chusqer->id }}/dislike" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="alert button">Dislike</button>
                    </form>
                @else
                    <form action="{{ $chusqer->id }}/like" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="button">Me gusta</button>
                    </form>
                @endif
            <div class="small-5 cell">
            <table >
                <thead>
                <tr>
                    <th><a href="/">Total Likes</a></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                </tr>
                </tbody>
            </table></div>
    </div>
    @endif
</div>