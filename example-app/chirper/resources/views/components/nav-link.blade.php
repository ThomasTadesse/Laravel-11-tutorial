<a class="{{ request()->is('home') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
   aria-current="{{ request()->is('home') ? 'page' : 'false' }}">
	{{ $slot }}
</a>

{{-- Debugging output --}}
@if(request()->is('home'))
	<p>Current URL matches 'home'</p>
@else
	<p>Current URL does not match 'home'</p>
@endif