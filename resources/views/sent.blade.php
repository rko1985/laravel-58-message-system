@extends('layouts.app')

@section('content')
    @if(count($messages) > 0)
        @foreach ($messages as $message)
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>To: {{$message->userTo->name}}, {{$message->userTo->email}}</strong> Subject: {{$message->subject}}
                    @if($message->read)
                        <span class="badge badge-success float-right">Read</span>
                    @endif
                </li>                
            </ul>                            
        @endforeach
    @else
        <p>No messages!</p>
    @endif
@endsection