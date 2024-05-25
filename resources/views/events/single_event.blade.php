<ul>
<li>  {{ $event->event_title  }}  </li>
<li>  {{ $event->event_creator  }}  </li>
<li>  {{ $event->event_content	  }}  </li>
<li>  {{ $event->image_event_path	  }}  </li>
<li>  {{ $event->event_date  }}  </li>
<li>  {{ $event->event_state  }}  </li>
<li><img src="{{ Storage::url($event->image_event_path) }}" alt="event image"></li>
</ul>