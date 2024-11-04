<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-6">
    @foreach ($jobs as $job)
            <a href="/jobs/ {{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
            <div>
            <strong class="text-Laravel">{{ $job['title'] }}:</strong> {{ $job['description'] }}
            </div>    
        </a>
    @endforeach

    <div>
        {{ $jobs->links() }}
    </div>
    </div>
</x-layout>
