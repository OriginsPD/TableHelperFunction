<x-app-layout>
    <x-slot name="header">
        {{ $infos[0]->students->first_nm }} {{ $infos[0]->students->last_nm }}
    </x-slot>

    <x-alert message="Payment Made Successful"/>

    <x-alert-failed message="Payment Failed"/>

    <div class=" space-y-2">

        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                <div class="rounded-t mb-0 px-4 py-3 border-0">

                    <div class="flex flex-wrap items-center">

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                            <h3 class="font-semibold text-base text-blueGray-700">Payment Information</h3>

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


                            </tr>
                        @empty

                            <td colspan="8" class="border-t-0 px-6 text-center  align-middle
                            border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                No Payment Founded

                            </td>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                <div class="rounded-t mb-0 px-4 py-3 border-0">

                    <div class="flex flex-wrap items-center">

                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                            <h3 class="font-semibold text-base text-blueGray-700">Transaction Information</h3>

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

                                Amount Due

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

                                Year of Exam

                            </th>

                        </tr>

                        </thead>

                        <tbody>

                        @forelse($transactions as $transaction)

                            <tr>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                    {{ $transaction->students->first_nm }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    {{ $transaction->students->last_nm }}

                                </td>


                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                   $ {{ number_format($transaction->amount_due,'2') }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    $ {{ $transaction->amount_paid }}

                                </td>

                                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                    $ {{ number_format($transaction->balance_amt,'2') }}

                                </td>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                    {{ $transaction->year_of_exam }}

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

                </div>

            </div>

        </div>


        <div class="p-4 flex flex-col" x-data="{ Open: false, btn: true , text: 'Begin Payment' }">

            <div class="flex justify-center items-center my-2">


                <button @click="{ Open = !Open }"

                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-700 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600">

                    <span x-cloak x-text="text"></span>

                </button>

            </div>

            <div x-show="Open" x-transition.duration.500ms
                 @click.away="Open = false"
                 @keydown.esc.window="Open = false"
                class="max-w-4xl -mt-16 z-50 p-6 bg-white rounded-md shadow-md dark:bg-gray-800">

                <h2  class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Make Payment</h2>

                <form action="{{ route('Payments.update',$infos[0]->id) }}" method="POST">

                    @method('PUT')
                    @csrf

                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">

                        <div>

                            <label class="text-gray-700 dark:text-gray-200" for="amount_paid">Amount Being Paid</label>

                            <input id="amount_paid" type="text"
                                   name="amount_paid" autofocus
                                   class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

                            <div>

                                @error('amount_paid')

                                <div class="text-red-700 font-light text-sm m-1">

                                    * {{ $message }}

                                </div>

                                @enderror

                            </div>

                        </div>

                        <div>

                            <input id="subject" type="hidden"
                                   name="subject" value="{{ $infos[0]->subjects->subject_nm }}" />
                            <div>

                                @error('amount_paid')

                                <div class="text-red-700 font-light text-sm m-1">

                                    * {{ $message }}

                                </div>

                                @enderror

                            </div>

                        </div>


                    </div>

                    <div class="flex justify-end mt-6">

                        <button type="submit"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-700
                             rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600">
                            Paid
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
