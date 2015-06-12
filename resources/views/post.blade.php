@extends('template')

@section('content')
	<div class="panel panel-default" style="background-color: #f9f9f9;">
        <div class="panel-body">

        	<h4>
                {!! HTML::link(URL::previous(), '', ['class' => 'glyphicon glyphicon-triangle-left', 'style' => 'font-size: 20px', 'aria-hidden' => 'true']) !!}
                {{ $post->title }}
            </h4>

        	<b>Posted by {{ $post->name }} {!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() !!}</b>
        	<br>
            <br>
        	<p class="larger">{{ $post->description }}</p>

            <hr>

            <p>Think you've found a match? Add <b>"{{ $post->name }}"</b> to your friends-list in game and send a message!

        </div>
    </div>
@endsection