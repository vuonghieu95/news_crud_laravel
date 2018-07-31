
<form action="{{ route('superadmin.store') }}" method="get">
    {{ csrf_field() }}
    <?php foreach ($superadmins as $superadmin) {?>
    ID:
    <br />
    <input type="text" name="id" value="{{ $superadmins->id }}" />

    <br /><br />
    Avatar:
    <br />
    <input type="text" name="avatar" value="{{ $superadmins->avatar }}" />
    @if ($errors->has('avatar'))
        <span class="show_error">{{ $errors->first('avatar') }}</span>
    @endif
    <br /><br />
   Username:
    <br />
    <input type="text" name="username" value="{{ $superadmins->username }}" />
    @if ($errors->has('username'))
        <span class="show_error">{{ $errors->first('username') }}</span>
    @endif
    <br /><br />

    Email:
    <br />
    <input type="email" name="email" value="{{ $superadmins->email }}" />
    @if ($errors->has('email'))
        <span class="show_error">{{ $errors->first('email') }}</span>
    @endif
    <br /><br />
    Role_Type:
    <br />
    <div >
        <input type="radio" checked name="role_type" value={{ $superadmins->role_type }}
        {{ old('role_type') == config('config.admin.role_type') }}
        > <?php echo config('config.admin.alias')?><br>
        <input type="radio" name="role_type" value={{$superadmins->role_type}}
                {{ old('role_type') == config('config.superadmin.role_type') }}
        > <?php echo config('config.superadmin.alias')?><br>
    </div>

    Password:
    <br />
    <input type="password" name="password" value="{{ $superadmins->password }}" />
    @if ($errors->has('password'))
        <span class="show_error">{{ $errors->first('password') }}</span>
    @endif
    <br /><br />
    Confirm:
    <br />
    <input type="password" name="password_confirmation"  />
    @if ($errors->has('password_confirmation'))
        <span class="show_error">{{ $errors->first('password_confirmation') }}</span>
    @endif
    <br /><br />
    <input type="submit" value="Submit" class="btn btn-default" />

    <?php }?>
</form>
