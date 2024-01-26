<div>
    Hi, {{ $name }} <br />
    To change your password, click the button below.
    <a href={{ route('reset' , ['id' => $id]) }}><button>Change Password</button></a>
</div>
