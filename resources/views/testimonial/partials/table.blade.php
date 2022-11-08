<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($testimonial->name, 47) }}</td>
    <td>{{ Str::limit($testimonial->link, 47) }}</td>
    <td>
        @if($testimonial && isset($testimonial->image))
            <img id="holder" style="margin-top:15px;max-height:50px;" class="img img-fluid" src="{{$testimonial->image}}">
        @endif
    </td>
    <td>
        <a href="{{route('testimonial.edit', $testimonial->id)}}"  class="btn btn-icon-toggle btn-sm" title="edit">
            <i class="mdi mdi-pencil"></i>
        </a>
        <button type="button" class="btn btn-icon-toggle" onclick="deleteThis(this); return false;" link="{{ route('testimonial.destroy', $testimonial->id) }}">
            <i class="far fa-trash-alt"></i>
        </button>
    </td>
</tr>

