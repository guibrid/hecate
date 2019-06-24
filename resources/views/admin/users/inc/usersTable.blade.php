<table id="usersTable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Verified</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->email_verified_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>