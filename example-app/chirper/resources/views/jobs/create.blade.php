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
        <x-form-field>
          <x-form-label for="title"/>Title</x-form-label>

          <div class="mt-2">
          <x-form-input name="title" id="title" placeholder="Software Engineer"/>

          <x-form-error name="title"></x-form-error>

          </div>
        </x-form-field>



        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="description"/>Description</x-form-label>

          <div class="mt-2">
          <x-form-input name="description" id="description" placeholder="Makes the code like a boss"/>

          <x-form-error name="description"></x-form-error>

          </div>
        </x-form-field>        
      

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>

</x-layout>