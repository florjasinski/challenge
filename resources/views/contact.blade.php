<x-layout>

    <h1>Contact</h1>
    @foreach($jobs as $job)
        <li>{{ $job ['title'] }}</li>

    @endforeach

</x-layout>