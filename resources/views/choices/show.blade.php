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
              <h1>MAKE PAYMENT</h1>
            </div>
          </div>
          
          
          <div class="mx-w-full mx-auto">
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Subject</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Cost</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Year of Exam</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                {{-- <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Options</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($student as $stud)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">{{ $stud['subject']['subject_nm'] }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $stud['subject']['cost_amt'] }}</td>
                <td class="py-4 px-6 border-b border-grey-light">{{ $stud['year_of_exam'] }}</td>
                <td class="py-4 px-6 border-b border-grey-light">
                  {{-- <a href="{{ route('Student }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-dark">Edit</a><br> --}}
                </td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
 <H3>TOTAL: </H3>
 {{-- @foreach ($total as $t) --}}
 {{ $total }}
 {{-- @endforeach --}}
@endsection


