@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
@if(count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach($favorites as $favorite)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($favorite->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $favorite->user->name, ['id' => $favorite->user->id]) !!} <span class="text-muted">posted at {{ $favorite->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                </div>
            </div>
        </li> 
    <div class="row">
                    
        <div class="col-sm-2 mr-0 pr-0">
         @if (Auth::user()->is_favorite($favorite->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-success"]) !!}
        {!! Form::close() !!}
         @else
        {!! Form::open(['route' => ['favorites.favorite', $favorite->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
        @endif
    </div>
    <div class="col-sm-2 ml-0 pl-0">
        @if(Auth::id() == $favorite->user_id)
                    {!! Form::open(['route'=>['microposts.destroy',$favorite->id],'method' => 'delete']) !!}
                        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endif
        @endforeach
    </div>
    </ul>
    {{ $favorites->render('pagination::bootstrap-4') }}
@endif
        </div>
    </div>
@endsection