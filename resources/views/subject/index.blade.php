<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Subject') }}
        </h2>
    </x-slot>

    <div x-data="{ isOpen: true }">

        @if(session('saved'))

            <div  x-show="isOpen" x-transition.scale.origin.top.duration.200ms
                  class="w-full text-white bg-green-500">

                <div class="container flex items-center justify-between px-6 py-4 mx-auto">

                    <div class="flex">

                        <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">

                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>

                        </svg>


                        <p class="mx-3">Subject Added.</p>

                    </div>


                    <button @click="isOpen = false"

                            class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">

                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>

                        </svg>

                    </button>

                </div>

            </div>

        @endif

    </div>

    <div x-data="{ isOpen: false }"
         class="flex items-center justify-center w-full">

        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                <div class="rounded-t mb-0 px-4 py-3 border-0">

                    <div class="flex flex-wrap items-center">

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                            <h3 class="font-semibold text-base text-blueGray-700">Subject Listing</h3>

                        </div>

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">

                            <button @click="isOpen = !isOpen"
                                    class="bg-blue-600 text-white active:bg-blue-700 text-xs font-bold uppercase
                                 px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all
                                 duration-150" type="button">Add Subject
                            </button>

                        </div>

                    </div>

                </div>

                <div class="block w-full overflow-x-auto">

                    <table class="items-center bg-transparent w-full border-collapse ">

                        <thead>

                        <tr>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                                Subject Name

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                                Cost Amount

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">


                            </th>


                        </tr>

                        </thead>

                        <tbody>

                        @forelse($subjects as $subject)

                            <tr>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                    {{ $subject['subject_nm'] }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    {{ $subject['cost_amt'] }}

                                </td>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    <a href="{{ route('Subject.edit',$subject['id']) }}" class="text-white shadow-md font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-800">Edit</a>

                                </td>


                            </tr>
                        @empty

                            <td colspan="8" class="border-t-0 px-6 text-center  align-middle
                            border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                Not Subjects Added

                            </td>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div x-show="isOpen" x-transition.origin.top.duration.150ms
             class="fixed w-full flex items-center justify-center h-screen top-0 bg-black bg-opacity-75 ">

            <div @click.away="isOpen = false"
                 class="bg-white w-3/4 rounded ">

                <div class="w-full text-center p-3">

                    <h1 class="lg:text-xl font-semibold">Add Subject Information</h1>

                </div>

                <form action="{{ route('Subject.store')  }}" method="POST" class="p-5">

                    @csrf

                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 ">

                        <div>

                            <label class="text-gray-700 dark:text-gray-200" for="subject_nm">

                                Subject Name

                                <input name="subject_nm" id="subject_nm" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
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

                                <input name="cost_amt" id="cost_amt" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
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

    </div>


</x-app-layout>
