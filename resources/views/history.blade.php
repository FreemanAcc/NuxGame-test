<h1>Last 3 Results</h1>
<ul>
    @foreach ($history as $record)
        <li>Number: {{ $record->random_number }}, Result: {{ $record->result }}, Win Amount: {{ $record->win_amount }}</li>
    @endforeach
</ul>
