<ul class="list-unstyled">
    @foreach($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name,['id'=> $micropost->user->id]) !!}
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                <div class="row">
                    
                    <div class="col-sm-2 mr-0 pr-0">
                     @if (Auth::user()->is_favorite($micropost->id))
                    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Unfavorite', ['class' => "btn btn-success"]) !!}
                    {!! Form::close() !!}
                     @else
                     {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
                           {!! Form::submit('Favorite', ['class' => "btn btn-primary"]) !!}
                      {!! Form::close() !!}
                      @endif
                      </div>
                      <div class="col-sm-2 ml-0 pl-0">

                    @if(Auth::id() == $micropost->user_id)
                    {!! Form::open(['route'=>['microposts.destroy',$micropost->id],'method' => 'delete']) !!}
                        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endif
                    </div>
                </div>
                    
                    
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->render('pagination::bootstrap-4') }}