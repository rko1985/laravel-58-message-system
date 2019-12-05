@extends('layouts.app')

@section('content')


    @if(count($messages) > 0)
        @foreach ($messages as $message)
            <ul class="list-group">
                <li class="list-group-item"><strong>From: {{$message->userFrom->name}}, {{$message->userFrom->email}}</strong> Subject: {{$message->subject}}</li>
            </ul>                            
        @endforeach
    @else
        <p>No messages!</p>
    @endif
    

@endsection
