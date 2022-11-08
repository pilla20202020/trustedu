<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($successstory->name, 47) }}</td>
    <td>{{ Str::limit($successstory->link, 47) }}</td>
    <td>
        @if($successstory && isset($successstory->image))
            <img id="holder" style="margin-top:15px;max-height:50px;" class="img img-fluid" src="{{$successstory->image}}">
        @endif
    </td>
    <td>
        <a href="{{route('successstory.edit', $successstory->id)}}"  class="btn btn-icon-toggle btn-sm" title="edit">
            <i class="mdi mdi-pencil"></i>
        </a>
        <button type="button" class="btn btn-icon-toggle" onclick="deleteThis(this); return false;" link="{{ route('successstory.destroy', $successstory->id) }}">
            <i class="far fa-trash-alt"></i>
        </button>
    </td>
</tr>

