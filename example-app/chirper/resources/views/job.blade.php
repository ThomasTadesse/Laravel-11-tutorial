<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>{{ $job ['title'] }}</strong></h2>

    <p>
        This job requires you to {{ $job['description'] }} .
    </p>
</x-layout>