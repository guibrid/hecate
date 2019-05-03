@if (count($documents) > 0)
<table class="table">
    <tbody>
        @foreach ($documents as $document)
        <tr>
            <td>{{$document['title']}}</td>
            <td class="fs15 fw700 text-right">
                <a href="{{ url('documents/download',$document['id']) }}" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-download"></i> Download
                </a>
                @if (auth()->user()->authorizeDisplay(['editor','manager','director','admin']))

                    <a href="{{ URL::route('document.delete', $document['id']) }}" type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete</button>

                @endif
            </td>
        </tr>  
        @endforeach
    </tbody>
</table>
@else
<p>No document available for the moment</p>
@endif