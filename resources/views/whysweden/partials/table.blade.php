<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($whysweden->name, 47) }}</td>
    <td>{{ Str::limit($whysweden->link, 47) }}</td>
    <td>
        @if($whysweden && isset($whysweden->image))
            <img id="holder" style="margin-top:15px;max-height:50px;" class="img img-fluid" src="{{$whysweden->image}}">
        @endif
    </td>
    <td>
        <a href="{{route('why-sweden.edit', $whysweden->id)}}"  class="btn btn-icon-toggle btn-sm" title="edit">
            <i class="mdi mdi-pencil"></i>
        </a>
        <button type="button" class="btn btn-icon-toggle" onclick="deleteThis(this); return false;" link="{{ route('why-sweden.destroy', $whysweden->id) }}">
            <i class="far fa-trash-alt"></i>
        </button>
    </td>
</tr>

