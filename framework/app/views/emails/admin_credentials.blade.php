<div style="width:700px;margin: 0 auto;padding: 10px;background: #ffffff;border:1px solid #cccccc;border-radius: 2px">
    <h1 style="text-align: center">Thank you for installing LaraCMS.</h1>
    <h2 style="text-align: center">Your user credentials follow:</h2>
    <dl>
        <dt>Username:</dt>
        <dd>{{$admin_email}}</dd>
        <dt>Password:</dt>
        <dd>{{$pass}}</dd>
    </dl>
    <strong>You can login and start adding content at: <a href="http://{{$_SERVER['SERVER_NAME']}}/backend">http://{{$_SERVER['SERVER_NAME']}}/backend</a> </strong>
</div>