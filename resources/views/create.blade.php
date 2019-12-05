@extends('layouts.app')

@section('content')

<form action="{{ route('send') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="to">To</label>       
            <select name="to" id="to" class="form-control">
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}, {{$user->email}}</option>
                @endforeach
            </select>        
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" class="form-control" name="subject" id="subject" value="{{$subject}}" placeholder="Enter subject">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" id="message" placeholder="Enter message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection