<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
    
 
<form method="POST" action="/jobs">
    @csrf
    <!-- create the token to the form. -->
     
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new job</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">This information will be required, So be careful what you put out there.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Manager" required>
            </div>

            @error('title')
                <p class="text-xs text-red-500 font-semibold mt-1"> {{ $message }} </p>
            @enderror



            {{-- 
            <div class="mt-10">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li class="text-red-500 text-xs">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            </div>
            --}}

          </div>
        </div>

    
        <div class="sm:col-span-4">
        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" name="description" id="description" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Onderhandelt mensen." required>
            </div>

            @error('description')
                <p class="text-xs text-red-500 font-semibold mt-1"> {{ $message }} </p>
            @enderror

          </div>


        
      

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>

</x-layout>