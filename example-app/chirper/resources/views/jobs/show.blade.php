<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>{{ $job->title }}</strong></h2>

    <p>
        This job requires of you to {{ $job->description }} .
    </p>

    @can('edit', $job)
        <p class="mt-4">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan


</x-layout>