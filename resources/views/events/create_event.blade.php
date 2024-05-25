@extends('base')
@section('content')
        <form action="{{ route('create_event') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="event_title">event title</label>
            <input type="text" name="event_title" id="event_title"/> <br/>

            <label for="event_creator">event creator</label>
             <input type="text" name="event_creator" id="event_creator"/> <br/>

             <label for="event_content">event content</label>
             <textarea name="event_content" id="event_content"></textarea> <br/>

             <label for="image_event_path">Choose Image</label>
             <input type="file" name="image_event_path" id="image_event_path"/> <br/>

             <label for="event_date">Event Date</label>
             <input type="date" name="event_date" id="event_date" /> <br/>
            
             <label for="event_state">Event State</label>
            <select name="event_state" id="event_state"> 
                <option value=""> ------------ </option>
                <option value="Finished"> Finished </option>
                <option value="In Progress"> In Progress </option>
                <option value="Not Yet Started"> Not Yet Started </option>
            </select>
            <input type="submit" value="validate" />
        </form>
@endsection