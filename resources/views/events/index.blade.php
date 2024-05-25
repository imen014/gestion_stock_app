<ul> 
@foreach($events as $event)
<li>  {{ $event->event_title  }}  </li>
<li>  {{ $event->event_creator  }}  </li>
<li>  {{ $event->event_content	  }}  </li>
<li>  {{ $event->image_event_path	  }}  </li>
<li>  {{ $event->event_date  }}  </li>
<li>  {{ $event->event_state  }}  </li>
<li>  <a href="{{ route('edit_event', ['id'=>$event->id])  }}">update</a>  </li>
<li>  <a href="{{ route('destroy_event', ['id'=>$event->id])  }}">delete</a>  </li>



<li><img src="{{ Storage::url($event->image_event_path) }}" alt="event image"></li> 
@endforeach
</ul>

<a href="{{ route('create_event')  }}">Create Event</a> 