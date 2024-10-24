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