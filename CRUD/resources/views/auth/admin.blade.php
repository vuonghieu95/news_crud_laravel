<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">

        <?php $currentlogin = Auth::user(); ?>

        @if($currentlogin->role_type == config('config.admin.role_type'))
            <h1><?php config('config.admin.alias')?></h1>
        @elseif($currentlogin->role_type == config('config.superadmin.role_type'))
                <a href="{{ route('superadmin') }}"> <h1>{{ config('config.superadmin.alias') }} </h1></a>
        @endif
        <a href="{{ route('superadmin.create') }}">
            <button class="btn-primary btn-create"> CREATE</button>
        </a>

        @foreach (['delete', 'warning', 'success', 'info'] as $key)
            @if(Session::has($key))
                <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
            @endif
        @endforeach
        <form role="search" action="{{ route('superadmin') }}" style="float: right;" method="get">
            <input type="text" value="" name="key" placeholder="Search...">

            <button type="submit" id="searchsubmit"
                    style="border: 1px solid;background: #007bff;color:white;" name="button"
                    class="search">search
            </button>

        </form>
        <table class="tbl table-bordered">
            <tr>
                <th style="background: #007bff;color: white">Avatar</th>
                <th style="background: #007bff;color: white">UserName</th>
                <th style="background: #007bff;color: white">Email</th>
                <th style="background: #007bff;color: white">Action</th>

            </tr>
            <tr>
                <?php foreach ($superadmins as $superadmin) { ?>
                <td>
                    <img src="{{ asset($superadmin->avatar ? $superadmin->avatar : '/img/default-user.png') }}"
                         alt="name img" width="30" height="30">

                </td>
                <td>
                    {{ $superadmin->username }}
                </td>
                <td>
                    {{ $superadmin->email }}
                </td>
                <td style="text-align: center">
                    <a href="{{ route('superadmin.edit', $superadmin->id) }}"
                       style="border: 1px solid;background: #007bff; color: white"
                       class="btn btn-default">Edit</a>
                    <form action="{{ route('superadmin.destroy', $superadmin->id) }}" method="post"
                          style="display: inline"
                          onsubmit="return confirm('Are you sure to delete the user?');">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        @if($superadmin->id != getCurrentUser()->id)
                            <button type="hidden" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </td>

            </tr>
            <?php }?>
            @if($superadmins->count()>=5)
                <form> {{ $superadmins->links() }}</form>
            @endif
        </table>

        <a href="{{ route('getLogout') }}">
            <button class="btn-primary btn-logout">Logout</button>
        </a>
    </div>
</div>
</body>
</html>
