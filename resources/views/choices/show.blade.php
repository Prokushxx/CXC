@extends('layouts.navbar')


@section('title')

    {{ $name[0]['first_nm'] }}
@endsection


@section('body')

    <!-- component -->
    <div class="bg-gray-400 shadow rounded-lg p-6">
        <div class="grid lg:grid-cols-2 gap-6">

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <form action="{{ route('SubjectChoice.store') }}" method="POST">
                    @csrf
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="firstname" class="bg-white text-gray-600 px-1">Year of Exam</label>
                        </p>
                    </div>
                    <p>
                        <input name="year" autocomplete="false" tabindex="0" type="date"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" value="{{ old('year') }}"
                            required>
                    </p>
            </div>
            <input type="hidden" value="{{ $name[0]['id'] }}" name="id">

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="subject" class="bg-white text-gray-600 px-1">Subjects</label>
                    </p>
                </div>
                <Select class="py-1 px-1 outline-none block h-full w-full" name="subject" required>
                    @foreach ($subjects as $sub)
                        <option value="{{ $sub->id }}">{{ $sub->subject_nm }}</option>
                    @endforeach
                </Select>
            </div>
        </div>
        <div class="border-t mt-6 pt-3">
            <button
                class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300"
                type="submit">
                Save
            </button>
            </form><br>
            <h2 class="mx-w-screen text-center text-white font-bold">{{ $name[0]['first_nm'] }}</h2>
        </div>
    </div>


    <div class="mx-w-full mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Subject</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Cost</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Year of Exam</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Option</th>
                        {{-- <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Options</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $stud)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $stud['subject']['subject_nm'] }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">${{ $stud['subject']['cost_amt'] }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $stud['year_of_exam'] }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">

                                {{-- {{ dd($sub) }} --}}
                                <form action="{{ route('SubjectChoice.destroy', $name[0]['subject_choices'][0]['id']) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-grey-lighter font-bold py-1 px-3 rounded text-white text-xs bg-red-600 hover:bg-red-700">Delete</button><br>
                                </form>
                                <button class="bg-green-600 text-white py-1 px-3 hover:bg-green-400 rounded text-xs">
                                  <h1 id="pay-btn">Make Pay</h1>
                              </button>
                            </td>
                            
                    @endforeach
                    </tr>
                    <tr>

                        <td class="py-4 px-6 border-b border-grey-light font-bold">
                            <H3>TOTAL:</H3>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light font-bold">
                            <H3> $ {{ $total }} </H3>
                        </td>


                    </tr>
                    <tr>
                        <td class="py-4 px-6 border-b border-grey-light font-bold">
                            <h4>Amount Paid: </h4>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light font-bold">
                            @if ($payment > $total)
                                <h4>You have exceeded the amount</h4>
                            @elseif ($payment < $total) <h4>$ {{ $payment }}</h4>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        {{ $student->links() }}
                    </tr>
                    <tr>
                        <td class="py-4 px-6 border-b border-grey-light font-bold">
                            <h4>Amount Due: </h4>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light font-bold">
                            @if ($payment > $total)
                                <h4>You have exceeded the amount</h4>
                            @elseif ($payment < $total) 
                            
                            <h4>$ {{ $total - $payment }}</h4>
              
                            @elseif ($payment === $total)
                              <h4>{{ PAID }}</h4>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div>
        {{-- <button class="bg-green-600 text-white py-1 px-2 hover:bg-green-400"> --}}
        {{-- <h1 id="pay-btn2">MAKE PAYMENT</h1>
        </button> --}}

        <div class="hidden bg-gray-300 absolute inset-0 bg-opacity-50 flex justify-center items-center" id="overlay">

            <div class="bg-blue-400 w-1/3 py-2 px-3 ml-20 mt-24 rounded shadow-xl h-1/4">
                <div class="flex justify-between items-center">
                    <H4 class="text-lg font-bold">PAYMENT</H4>
                    <svg class="w-7 h-7 cursor-pointer hover:bg-blue-300 rounded-full p-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" id="close" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
                <div class=" text-sm text-white h-1/4">
                    <form action="{{ route('Payment.store') }}" method="POST">
                        @csrf
                        {{-- <h1>{{ $total }}</h1> --}}
                        <input type="hidden" value="{{ $name[0]['id'] }}" name="StudentId">
                        <input type="hidden" value="{{ $sub->id }}" name="SubjectId">
                        <input type="hidden" value="{{ $total }}" name="Total">
                        <input type="hidden" value="{{ $student[0]['year_of_exam'] }}" name="date">
                        <input type="hidden" value="{{ $payment }}" name="payment">
                        <input type="hidden" value="{{ $total - $payment }}" name="balance_amt">
                        <input type="number" class="mt-6 px-2 py-1 text-black w-full" name="amount" placeholder="$USD"
                            required>
 {{-- {{ dd($student[0]['year_of_exam']) }} --}}
                </div>
                <div class="mt-3 flex justify-end space-x-3">
                    {{-- <button class="px-3 py-1 bg-red-500 rounded text-white hover:bg-red-700">Cancel</button> --}}
                    <button type="submit"
                        class="px-3 py-1 mt-6 bg-green-500 rounded text-white hover:bg-green-700">Pay</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {

            const pay2 = document.querySelector('#pay-btn2')
            const overlay = document.querySelector('#overlay')
            const pay = document.querySelector('#pay-btn')
            const close = document.querySelector('#close')
            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }
            pay.addEventListener('click', toggleModal)
            close.addEventListener('click', toggleModal)
            pay2.addEventListener('click', toggleModal)
        })
    </script>

@endsection
