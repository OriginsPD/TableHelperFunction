<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Information') }}
        </h2>
    </x-slot>

    <x-alert message="Student Status Updated Successful"/>

    <div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-8">

        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

            <div class="rounded-t mb-0 px-4 py-3 border-0">

                <div class="flex flex-wrap items-center">

                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">

                        <h3 class="font-semibold text-base text-blueGray-700">Student Choice Information</h3>

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

                            Subject

                        </th>

                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                            Status

                        </th>

                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid
                                border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap
                                font-semibold text-left">

                            Year of Exam

                        </th>

                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">


                        </th>


                    </tr>

                    </thead>

                    <tbody>

{{--                    {{ dd($students[0]['subject_choice']) }}--}}

                    @forelse($students as $student)

                        @foreach($student->subjectChoice as $choice)
{{--                        {{ dd($choice) }}--}}

                        <tr>

                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                {{ ($choice->subjects->subject_nm) }}

                            </td>

                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                @if($choice['status'] === null)
                                    Pending
                                @elseif($choice['status'])
                                    Approved
                                @else
                                    Rejected
                                @endif

                            </td>

                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                {{ $choice->year_of_exam }}

                            </td>

                            <td class="flex space-x-2 border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                @if($choice['status'] === null)

                                    <form action="{{ route('Choice.update',$choice['id']) }}" method="POST" name="approve">

                                        @csrf

                                        @method('PUT')

                                        <button id="approve" type="submit" name="status" value="1"
                                                class="text-white shadow-md font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-800">

                                            Approve

                                        </button>

                                    </form>

                                    <form action="{{ route('Choice.update',$choice['id']) }}" method="POST" name="rejected">

                                        @csrf

                                        @method('PUT')

                                    <button type="submit" name="status" value="0" id="rejected"
                                            class="text-white shadow-md font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-red-800">

                                        Rejected

                                    </button>

                                    </form>
                                @endif

                            </td>


                        </tr>
                        @endforeach
                    @empty

                        <td colspan="8" class="border-t-0 px-6 text-center  align-middle
                            border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                            Not Choices Have Been Made

                        </td>


                    @endforelse

                    </tbody>

                </table>

                <div class="mt-2 p-5 bg-gray-100 text-white">

                    {{ $students->links() }}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
