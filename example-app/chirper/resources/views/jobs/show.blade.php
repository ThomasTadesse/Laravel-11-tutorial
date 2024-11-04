<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2><strong>{{ $job->title }}</strong></h2>

    <p>
        This job requires of you to {{ $job->description }} .
    </p>

    @can('edit-job', $job)
        <p>
            <a href="/jobs/{{ $job->id }}/edit">Edit Job</a>
        </p>
    @endcan


</x-layout>