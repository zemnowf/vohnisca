<form method="post" action=" {{ route('authenticate') }}">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="">
    <label>Password</label>
    <input type="password" name="password" value="">
    <button type="submit">Log in</button>
</form>
