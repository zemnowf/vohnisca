<form method="post" action="{{ route('completeRegister') }}">
    @csrf
    <label>Name</label>
    <input type="text" name="name" value="">
    <label>Email</label>
    <input type="email" name="email" value="">
    <label>Password</label>
    <input type="password" name="password" value="">
    <button type="submit">Register</button>
</form>
