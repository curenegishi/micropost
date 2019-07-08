 @if (Auth::user()->is_favorite($favorite->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfollow', ['class' => "btn btn-success"]) !!}
        {!! Form::close() !!}
@else
        {!! Form::open(['route' => ['favorites.favorite', $favorite->id]]) !!}
            {!! Form::submit('Follow', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
@endif