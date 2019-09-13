<table id="packsTable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Pk. type</th>
            <th>Packs</th>
            <th>Weight</th>
            <th>Volume</th>
            <th>Inner packs</th>
            <th>Goods description</th>
            <th>Lenght</th>
            <th>Width</th>
            <th>Height</th>
            @if (auth()->user()->authorizeDisplay(['editor','manager','director','admin']))
              <th>Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>