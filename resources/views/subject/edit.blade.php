<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subject') }}
        </h2>
    </x-slot>


    <div
         class=" w-full flex items-center justify-center p-5 ">

        <div
             class="bg-white w-3/4 rounded ">

            <div class="w-full text-center p-3">

                <h1 class="lg:text-xl font-semibold">Edit Subject Information</h1>

            </div>

            <form action="{{ route('Subject.update',$subject->id)  }}" method="POST" class="p-5">

                @method('PUT')
                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 ">

                    <div>

                        <label class="text-gray-700 dark:text-gray-200" for="subject_nm">

                            Subject Name

                            <input name="subject_nm" value="{{ $subject['subject_nm'] }}"
                                   id="subject_nm" type="text"
                                   class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                            border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                        </label>

                        <div>

                            @error('subject_nm')

                            <div class="text-red-700 font-light text-sm m-1">

                                * {{ $message }}

                            </div>

                            @enderror

                        </div>

                    </div>

                    <div>

                        <label class="text-gray-700 dark:text-gray-200" for="cost_amt">

                            Cost Amount

                            <input name="cost_amt" value="{{ $subject['cost_amt'] }}"
                                   id="cost_amt" type="number"
                                   class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                             border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                             focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                        </label>

                        <div>

                            @error('cost_amt')

                            <div class="text-red-700 font-light text-sm m-1">

                                * {{ $message }}

                            </div>

                            @enderror

                        </div>

                    </div>


                    <div class="flex justify-end mt-6">

                        <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform
                        bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">

                            Save

                        </button>

                    </div>
            </form>
        </div>

    </div>

</x-app-layout>
