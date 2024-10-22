<h1>Welcome, {{ $user->name }}</h1>

<form action="{{ route('generate.link', $user->id) }}" method="POST">
    @csrf
    <button type="submit">Generate New Link</button>
</form>

<form action="{{ route('deactivate.link', $user->id) }}" method="POST">
    @csrf
    <button type="submit">Deactivate Link</button>
</form>

<form action="{{ route('feeling.lucky', $user->id) }}" method="POST">
    @csrf
    <button type="submit">I'm Feeling Lucky</button>
</form>

<form action="{{ route('history', $user->id) }}" method="POST">
    @csrf
    <button type="submit">View History</button>
</form>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif
