<x-app-layout>
    <x-slot name="header">
        {{ __('Payment Details') }}
    </x-slot>

    <x-alert message="Payment Updated Successful"/>

    <x-alert-failed message="Payment Failed Please Check Student Details"/>

    <div x-data="{ isOpen: false }"
         class="flex items-center justify-center w-full">

        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                <div class="rounded-t mb-0 px-4 py-3 border-0">

                    <div class="flex flex-wrap items-center">

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                            <h3 class="font-semibold text-base text-blueGray-700">Student Information</h3>

                        </div>

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">

                            <button @click="isOpen = !isOpen"
                                    class="bg-green-500 text-white active:bg-green-600 text-xs font-bold uppercase
                                 px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all
                                 duration-150" type="button">Make Payment
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

                                First Name

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                                Last Name

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                                Subject

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                                Amount Paid

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                Balance_Amount

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                Date Paid

                            </th>

                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">


                            </th>


                        </tr>

                        </thead>

                        <tbody>

                        @forelse($infos as $info)

{{--                            {{ dd($info) }}--}}

                            <tr>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                    {{ $info->students->first_nm }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    {{ $info->students->last_nm }}

                                </td>


                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                    {{ $info->subjects->subject_nm }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                   $ {{ $info->amount_paid }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                   $ {{ number_format($info->balance_amt,'2') }}

                                </td>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                    {{ ($info->date_paid) === null ? 'Awaiting Payment' : $info->date_paid }}

                                </td>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    <a href="{{ route('Payments.show',$info['id']) }}" class="text-white shadow-md
                                    font-bold py-1 px-3 rounded text-xs bg-blue-500 hover:bg-blue-800">Update</a>

                                </td>


                            </tr>
                        @empty

                            <td colspan="8" class="border-t-0 px-6 text-center  align-middle
                            border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                No Payment Founded

                            </td>

                        @endforelse

                        </tbody>

                    </table>

                    <div class="mt-2 p-5 bg-gray-100 text-white">

                        {{ $infos->links() }}

                    </div>

                </div>

            </div>

        </div>

        <div x-show="isOpen" x-transition.duration.300ms
             class="fixed w-full flex items-center justify-center h-screen top-0 bg-black bg-opacity-75 ">

            <div @click.away="isOpen = false"
                 @keydown.esc.window="isOpen = false"
                 class="bg-white w-3/4 rounded ">

                <div class="w-full text-center p-3">

                    <h1 class="lg:text-xl font-semibold">Add Student And Subject For Payment</h1>

                </div>

                <form action="{{ route('Payments.store')}}" method="POST" class="p-5">

                    @csrf

                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 ">

                        <div>

                            <label class="text-gray-700 dark:text-gray-200" for="students_id">Student</label>

                            <select id="students_id"
                                    name="students_id"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                                    rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500
                                    dark:focus:border-blue-500 focus:outline-none focus:ring">

                                <option selected disabled="disabled"> Please Select Student</option>

                                @forelse($students as $student)

                                    <option value="{{ $student['id'] }}">
                                        {{ $student['first_nm'] }}
                                        {{ $student['last_nm'] }}
                                    </option>

                                @empty

                                    <option selected disabled> No Student Available</option>

                                @endforelse

                            </select>

                            <div>

                                @error('students_id')

                                <div class="text-red-700 font-light text-sm m-1">

                                    * {{ $message }}

                                </div>

                                @enderror

                            </div>

                        </div>

                        <div>

                            <label class="text-gray-700 dark:text-gray-200" for="subjects_id">Subjects</label>

                            <select id="subjects_id"
                                    name="subjects_id"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300
                                    rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500
                                    dark:focus:border-blue-500 focus:outline-none focus:ring">

                                <option selected disabled> Please Select Subject</option>

                                @forelse($subjects as $subject)

                                    <option value="{{ $subject['id'] }}">
                                        {{ $subject['subject_nm'] }} </option>

                                @empty

                                    <option selected disabled> No Subjects Available</option>

                                @endforelse

                            </select>

                            <div>

                                @error('subjects_id')

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

        </div>

    </div>

</x-app-layout>
