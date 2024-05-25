@extends('base')
@section('content')
<form action="{{ route('update_event',['id'=>$event->id])   }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="event_title">Event Title</label>
    <input type="text" name="event_title" id="event_title" value="{{ $event->event_title }}"/> <br/>

    <label for="event_creator">Event Creator</label>
    <input type="text" name="event_creator" id="event_creator" value="{{ $event->event_creator }}" /> <br/>

    <label for="event_content">Event Content</label>
    <textarea name="event_content" id="event_content">{{ $event->event_content }}</textarea> <br/>

    <label for="image_event_path">Choose Image</label>
    <input type="file" name="image_event_path" id="image_event_path"/> <br/>

    <label for="event_date">Event Date</label>
    <input type="date" name="event_date" id="event_date" value="{{ $event->event_date }}" /> <br/>
    
    <label for="event_state">Event State</label>
    <select name="event_state" id="event_state">
        <option value=""> ------------ </option>
        <option value="Finished" {{ $event->event_state == 'Finished' ? 'selected' : '' }}> Finished </option>
        <option value="In Progress" {{ $event->event_state == 'In Progress' ? 'selected' : '' }}> In Progress </option>
        <option value="Not Yet Started" {{ $event->event_state == 'Not Yet Started' ? 'selected' : '' }}> Not Yet Started </option>
    </select>
    <input type="submit" value="Validate" />
</form>
@endsection
