@if (count($packs) > 0)
        @foreach ($packs as $pack)
        <tr>
            <td class="type">{{$pack['type']}}</td>
            <td class="numberPack">{{$pack['number']}}</td>
            <td class="weight">@if ($pack['weight']) {{$pack['weight']}} kg @endif</td>
            <td class="volume">@if ($pack['volume']) {{$pack['volume']}} m3 @endif</td>
            <td class="inner_packs">{{$pack['inner_packs']}}</td>
            <td class="description">{{$pack['description']}}</td>
            <td class="length">@if ($pack['length']) {{$pack['length']}} m @endif</td>
            <td class="width">@if ($pack['width']) {{$pack['width']}} m @endif</td>
            <td class="height">@if ($pack['height']) {{$pack['height']}} m @endif</td>
            @if (auth()->user()->authorizeDisplay(['editor','manager','director','admin']))
                <td>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['pack.delete', $pack['id']]]) }}
                        <button data-toggle="modal" data-target="#packModal" data-packId="{{$pack['id']}}" type="button" class="btn btn-primary btn-xs editPackButton">edit</button> 
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

<script>
    $(".editPackButton").click(function(e){ 
        //console.log($(this).parents('tr').children(".toto").text());
        var row = $(this).parents('tr');
        var packDetails = {
            id: $(this).attr('data-packId'),
            type: row.children(".type").text(), 
            number: row.children(".numberPack").text().replace(/[^\d.-]/g, ''),
            weight: row.children(".weight").text().replace(/[^\d.-]/g, ''), 
            inner_packs: row.children(".inner_packs").text().replace(/[^\d.-]/g, ''), 
            volume: row.children(".volume").text().replace(/[^\d.-]/g, ''), 
            description: row.children(".description").text(), 
            length: row.children(".length").text().replace(/[^\d.-]/g, ''), 
            width: row.children(".width").text().replace(/[^\d.-]/g, ''), 
            height: row.children(".height").text().replace(/[^\d.-]/g, ''),
        };
        //console.log(packDetails);
        e.preventDefault()
        editPack(packDetails)
    });
</script>
