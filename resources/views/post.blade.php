@extends('template')

@section('content')
	<div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">

        	<h4>
                {!! HTML::link(URL::previous(), '', ['class' => 'glyphicon glyphicon-triangle-left', 'style' => 'font-size: 20px', 'aria-hidden' => 'true']) !!}
                {{ $post->title }}
            </h4>

        	<b>Posted by 
                <a title="View player's highscores" href="http://services.runescape.com/m=hiscore_oldschool/hiscorepersonal.ws?user1={{ $post->name }}">
                    {{ $post->name }}
                </a> 
                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() !!}
            </b>

            <h5>
                <span class="label label-primary">Category: {{ $post->category }}</span>
                <span class="label label-success">Combat: {{ $post->combat }}</span>
                <span class="label label-info">Age: {{ $post->age }}</span>
            </h5>
            
        	<br>
        	<p class="larger">{{ $post->description }}</p>

            <hr>

            <p>Think you've found a match? Add 
                <a title="View player's highscores" href="http://services.runescape.com/m=hiscore_oldschool/hiscorepersonal.ws?user1={{ $post->name }}">
                    <b>"{{ $post->name }}"</b>
                </a>
                to your friends-list in game and send a message!
            </p>

        </div>
    </div>
@endsection