<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $students[0]->first_nm }} {{ $students[0]->last_nm }}
        </h2>
    </x-slot>

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

{{--                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">--}}


{{--                        </th>--}}


                    </tr>

                    </thead>

                    <tbody>

{{--                    {{ dd($students[0]['subject_choice']) }}--}}

                    @forelse($students as $student)

                        @foreach($student->subjectChoice as $choice)
{{--                        {{ dd($pStudentChoice) }}--}}

                        <tr>

                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">


                                {{ ($choice->subjects->subject_nm) }}

                            </td>

                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">

                                {{ ($choice->status) === true ? 'Approve' : 'Rejected' }}

                            </td>

                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                                {{ $choice->year_of_exam }}

                            </td>

{{--                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">--}}

{{--                                <a href="{{ route('Student.edit',$student['id']) }}"--}}
{{--                                   class="text-white shadow-md font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-800">Edit</a>--}}

{{--                            </td>--}}


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
