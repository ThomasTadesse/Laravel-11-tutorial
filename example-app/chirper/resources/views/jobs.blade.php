<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <ul>
    @foreach ($jobs as $job)
        <li>
            <a href="/jobs">
            <strong>{{ $job['title'] }}:</strong> {{ $job['description'] }}</li>
            </a>
    @endforeach
    </ul>
</x-layout>