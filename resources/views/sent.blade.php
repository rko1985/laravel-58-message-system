@extends('layouts.app')

@section('content')
    @if(count($messages) > 0)
        @foreach ($messages as $message)
            <ul class="list-group">
                <li class="list-group-item"><strong>To: {{$message->userTo->name}}, {{$message->userTo->email}}</strong> Subject: {{$message->subject}}</li>
            </ul>                            
        @endforeach
    @else
        <p>No messages!</p>
    @endif
@endsection