
<?php

if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ?

    $target_dir = "uploads/";  // thư mục chứa file upload

    $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // link sẽ upload file lên

    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
        echo "The file ". basename( $_FILES["ANH_SP"]["name"]). " has been uploaded.";
    } else { // Upload file có lỗi
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<form action="{{ route('superadmin.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Avatar:
    <br />
    <input type="file" name="avatar" value="{{ old('avatar') }}" />
    @if ($errors->has('avatar'))
        <span class="show_error">{{ $errors->first('avatar') }}</span>
    @endif
    <br /><br />
   Username:
    <br />
    <input type="text" name="username" value="{{ old('username') }}" />
    @if ($errors->has('username'))
        <span class="show_error">{{ $errors->first('username') }}</span>
    @endif
    <br /><br />

    Email:
    <br />
    <input type="email" name="email" value="{{ old('email') }}" />
    @if ($errors->has('email'))
        <span class="show_error">{{ $errors->first('email') }}</span>
    @endif
    <br /><br />
    Role_Type:
    <br />
    <div >
        <input type="radio" checked name="role_type" value={{config('config.admin.role_type')}}
        {{ old('role_type') == config('config.admin.role_type') }}
        > <?php echo config('config.admin.alias')?><br>
        <input type="radio" name="role_type" value={{config('config.superadmin.role_type')}}
                {{ old('role_type') == config('config.superadmin.role_type') }}
        > <?php echo config('config.superadmin.alias')?><br>
    </div>

    Password:
    <br />
    <input type="password" name="password" value="{{ old('password') }}" />
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
</form>