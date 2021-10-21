<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>


    <div
        class="bg-white m-2 mx-auto w-3/4 rounded ">

        <div class="w-full text-center p-3">

            <h1 class="lg:text-xl font-semibold">Edit Student Information</h1>

        </div>

        <form action="{{ route('Student.update',$student['id']) }}" method="POST" class="p-5">

            @method('PUT')

            @csrf

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 ">

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="first_nm">

                        First Name

                        <input name="first_nm" id="first_nm" value="{{ $student['first_nm']}}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                            border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </label>

                    <div>

                        @error('first_nm')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="last_nm">Last Name</label>

                    <input name="last_nm" id="last_nm" value="{{ $student['last_nm'] }}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                            border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    <div>

                        @error('last_nm')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="dob">

                        Date of Birth

                        <input name="dob" id="dob" value="{{ $student['dob'] }}" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border
                            border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </label>

                    <div>

                        @error('dob')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="last_nm">Class</label>

                    <input name="class" id="class" value="{{ $student['class'] }}" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                            border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    <div>

                        @error('class')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="email_addr">
                        Email Address

                        <input name="email_addr" id="email" value="{{ $student['email_addr'] }}" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700
                            bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                            focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </label>

                    <div>

                        @error('email_addr')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="phone_nbr">

                        Phone Number

                        <input name="phone_nbr" id="phone_no" value="{{ $student['phone_nbr'] }}" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white
                             border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600
                             focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                    </label>

                    <div>

                        @error('phone_nbr')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

                </div>

                <div>

                    <label class="text-gray-700 dark:text-gray-200" for="gender">Gender</label>

                    <select id="gender"
                            name="gender"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                                    rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500
                                    dark:focus:border-blue-500 focus:outline-none focus:ring">

                        <option selected disabled> Please Select Gender</option>

                        <option value="Male"> Male</option>

                        <option value="Female"> Female</option>

                    </select>

                    <div>

                        @error('gender')

                        <div class="text-red-700 font-light text-sm m-1">

                            * {{ $message }}

                        </div>

                        @enderror

                    </div>

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


</x-app-layout>
