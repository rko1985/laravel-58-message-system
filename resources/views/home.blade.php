@extends('layouts.app')

@section('content')


    @if(count($messages) > 0)
        @foreach ($messages as $message)
            <ul class="list-group">
                <a href="{{ route('read', $message->id) }}">
                    <li class="list-group-item"><strong>From: {{$message->userFrom->name}}, {{$message->userFrom->email}}</strong> Subject: {{$message->subject}}</li>
                </a>
            </ul>                            
        @endforeach
    @else
        <p>No messages!</p>
    @endif
    

@endsection
