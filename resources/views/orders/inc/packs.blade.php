@if (count($packs) > 0)
        @foreach ($packs as $pack)
        <tr>
            <td>{{$pack['number']}}</td>
            <td>{{$pack['type']}}</td>
            <td>{{$pack['inner_packs']}}</td>
            <td>{{$pack['description']}}</td>
            <td>{{$pack['weight']}}</td>
            <td>{{$pack['volume']}}</td>
            <td>{{$pack['length']}}</td>
            <td>{{$pack['width']}}</td>
            <td>{{$pack['height']}}</td>
            @if (auth()->user()->authorizeDisplay(['editor','manager','director','admin']))
                <td>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['pack.delete', $pack['id']]]) }}
                        <input class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this pack?');" type="submit" value="Del"> 
                    {{ Form::close() }}
                </td>
            @endif
        </tr>  
        @endforeach
@else
<tr class="odd">
    <td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
</tr>
@endif
