<x-app-layout>
    <x-slot name="header">
        {{ __('Report Information') }}
    </x-slot>

    <div x-data="{ tabs: 'tab1' }">

        <ul class="flex text-center bg-white border-t border-b border-gray-200">

            <li @click.prevent="tabs = 'tab1'"
                class="flex-1">

                <a class="block p-4 text-sm font-medium justify-center items-center text-black"
                   :class="{ 'relative block p-4 text-sm font-medium bg-white border-t border-l border-r border-gray-200' : tabs === 'tab1' }"
                   href="">

                    <span :class="{ 'absolute inset-x-0 w-full h-px bg-white -bottom-px' : tabs === 'tab1' }"></span>

                    Payment Details

                </a>

            </li>

            <li @click.prevent="tabs = 'tab2'"
                class="flex-1">

                <a class="block p-4 text-sm font-medium justify-center items-center text-black"
                   :class="{ 'relative block p-4 text-sm font-medium bg-white border-t border-l border-r border-gray-200' : tabs === 'tab2' }"
                   href="">

                    <span :class="{ 'absolute inset-x-0 w-full h-px bg-white -bottom-px' : tabs === 'tab2' }"></span>

                    Transaction Details

                </a>

            </li>

            <li @click.prevent="tabs = 'tab3'"
                class="flex-1">

                <a class="block p-4 text-sm font-medium justify-center items-center text-black"
                   :class="{ 'relative block p-4 text-sm font-medium bg-white border-t border-l border-r border-gray-200' : tabs === 'tab3' }"
                   href="">

                    <span :class="{ 'absolute inset-x-0 w-full h-px bg-white -bottom-px' : tabs === 'tab3' }"></span>

                    Payment Log

                </a>

            </li>

        </ul>

        <div x-show="tabs === 'tab1'" x-transition.duration.300ms
             class=" space-y-2">

            <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                    <div class="rounded-t mb-0 px-4 py-3 border-0">

                        <div class="flex flex-wrap items-center">

                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                                <h3 class="font-semibold text-base text-blueGray-700">Payment Information (Sum)</h3>

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

                                    Total Amount Paid

                                </th>

                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                    Total Balance_Amount

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


                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        $ {{ number_format($info->sum,'2') }}

                                    </td>

                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        $ {{ number_format($info->balance_amt,'2') }}

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

                                <h3 class="font-semibold text-base text-blueGray-700">Payment Information (Avg)</h3>

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

                                    Total Amount Paid

                                </th>

                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                    Total Balance_Amount

                                </th>

                            </tr>

                            </thead>

                            <tbody>

                            @forelse($infoavg as $infoa)

                                {{--                            {{ dd($info) }}--}}

                                <tr>

                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                        {{ $infoa->students->first_nm }}

                                    </td>

                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        {{ $infoa->students->last_nm }}

                                    </td>


                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        $ {{ number_format($infoa->Avg,'2') }}

                                    </td>

                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        $ {{ number_format($infoa->balance_amt,'2') }}

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


        </div>

        <div x-show="tabs === 'tab2'" x-transition.duration.300ms
             class=" space-y-2">

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

        </div>

        <div x-show="tabs === 'tab3'" x-transition.duration.300ms
             class=" space-y-2">

            <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                    <div class="rounded-t mb-0 px-4 py-3 border-0">

                        <div class="flex flex-wrap items-center">

                            <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                                <h3 class="font-semibold text-base text-blueGray-700">Payment History</h3>

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

                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                    Date Paid

                                </th>

                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">

                                    Description

                                </th>

                            </tr>

                            </thead>

                            <tbody>

                            @forelse($histories as $history)

                                <tr>

                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                        {{ $history->students->first_nm }}

                                    </td>

                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        {{ $history->students->last_nm }}

                                    </td>

                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        $ {{ number_format($history->amount_paid,'2') }}

                                    </td>

                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                        {{ $history->date_paid }}

                                    </td>

                                    <td class="border-t-0 break-words px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                        {{ $history->description }}

                                    </td>


                                </tr>
                            @empty

                                <td colspan="8" class="border-t-0 px-6 text-center  align-middle
                            border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                    No Payment History

                                </td>

                            @endforelse

                            </tbody>

                        </table>

                        <span>

                           <div
                                class="mt-2 p-5 bg-gray-100 text-white">

                            {{ $histories->links() }}

                            </div>

                       </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


</x-app-layout>
