<x-layout>
    <x-slot:heading>
         Home Page
    </x-slot:heading>

    @foreach ($jobs as $job)
        <li>{{ $job['title'] }}: {{ $job['description'] }}</li>
    @endforeach

</x-layout>