
<form action="{{ route('superadmin.update',['id'=>$superadmin->id]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br/>
    <input type="hidden" name="id" value="{{ $superadmin->id }}"/>

    <br/><br/>
    Avatar:
    <br/>
    <img src="{{ asset($superadmin->avatar ? $superadmin->avatar : '/img/default-user.png') }}" alt="name img" width="30" height="30">
    <input type="file" name="avatar" value="{{ old('avatar') }}" />
    @if ($errors->has('avatar'))
        <span class="show_error">{{ $errors->first('avatar') }}</span>
    @endif
    <br/><br/>
    Username:
    <br/>
    <input type="text" name="username" value="{{ $superadmin->username }}"/>
    @if ($errors->has('username'))
        <span class="show_error">{{ $errors->first('username') }}</span>
    @endif
    <br/><br/>

    Email:
    <br/>
    <input type="email" name="email" value="{{ $superadmin->email }}"/>
    @if ($errors->has('email'))
        <span class="show_error">{{ $errors->first('email') }}</span>
    @endif
    <br/><br/>
    Role_Type:
    <br/>
    <div>
        <input type="radio" checked name="role_type" value={{ $superadmin->role_type }}
                {{ old('role_type') == config('config.admin.role_type') }}
        > <?php echo config('config.admin.alias')?><br>
        <input type="radio" name="role_type" value={{$superadmin->role_type}}
                {{ old('role_type') == config('config.superadmin.role_type') }}
        > <?php echo config('config.superadmin.alias')?><br>
    </div>

    <br/><br/>
    <input type="submit" value="Submit" class="btn btn-default"/>

</form>
