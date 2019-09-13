@if (count($packs) > 0)
        @foreach ($packs as $pack)
        <tr>
            <td>{{$pack['type']}}</td>
            <td>{{$pack['number']}}</td>
            <td>@if ($pack['weight']) {{$pack['weight']}} kg @endif</td>
            <td>@if ($pack['volume']) {{$pack['volume']}} m3 @endif</td>
            <td>{{$pack['inner_packs']}}</td>
            <td>{{$pack['description']}}</td>
            <td>@if ($pack['length']) {{$pack['length']}} m @endif</td>
            <td>@if ($pack['width']) {{$pack['width']}} m @endif</td>
            <td>@if ($pack['height']) {{$pack['height']}} m @endif</td>
            @if (auth()->user()->authorizeDisplay(['editor','manager','director','admin']))
                <td>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['pack.delete', $pack['id']]]) }}
                        <input class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this pack?');" type="submit" value="Del"> 
                    {{ Form::close() }}
                </td>
            @endif
        </tr>  
        @endforeach
        <tr style="background-color:#ddd; font-weight:bold;">
            <td>TOTAL</td>
            <td>{{$sum->packs}}</td>
            <td>{{$sum->weight}} kg</td>
            <td>{{$sum->volume}} m3</td>
            <td colspan="6"></td>
            
        </tr>
@else
<tr class="odd">
    <td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
</tr>
@endif
