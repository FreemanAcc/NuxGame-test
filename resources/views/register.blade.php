<form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <br>
    <label for="phonenumber">Phone Number:</label>
    <input type="text" name="phonenumber" required>
    <br>
    <button type="submit">Register</button>
</form>
