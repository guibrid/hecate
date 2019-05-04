
@if (count($shipments) === 0)
  <p>No shipment registered for this order</p>
@else
  <table id="listShipments-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <tbody>
      @foreach ($shipments as $shipment)
      <tr>
              @if (is_null($order_id))
                <td style="text-align:center; vertical-align:middle; 	">
                  <input type="radio" name="shipment_id" value="{{$shipment->id}}"></td>
                
              @endif
              <td>
                @if ($shipment->cutoff) {{$shipment->title}}<br /> @endif
                @if ($shipment->number) <b>#</b>: {{$shipment->number}} - @endif
                @if ($shipment->cutoff) <b>Cutoff</b>: {{\Carbon\Carbon::parse($shipment->cutoff)->format('d/m/Y')}} - @endif
                @if ($shipment->container_number ) <b>Container</b>: {{$shipment->container_number }} @endif
                <br />
                @foreach(Helpers::getTransshipments($shipment->id) as $transshipment)
                  {!! Helpers::transshipmentIcon($transshipment['type'])!!} 
                  {{ $transshipment['origin']['abbreviation']}}-
                  {{ \Carbon\Carbon::parse($transshipment['departure'])->format('d/m/Y')}}
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  {{ $transshipment['destination']['abbreviation']}}-
                  {{ \Carbon\Carbon::parse($transshipment['arrival'])->format('d/m/Y')}}<br />
                @endforeach 
              </td>

            </tr>
      @endforeach
    </tbody>
  </table>

@endif


