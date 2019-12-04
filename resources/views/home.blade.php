@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inbox</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($messages) > 0)
                        @foreach ($messages as $message)
                            <ul class="list-group">
                                <li class="list-group-item"><strong>From: {{$message->userFrom->name}}, {{$message->userFrom->email}}</strong> Subject: {{$message->subject}}</li>
                            </ul>                            
                        @endforeach
                    @else
                        <p>No messages!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
