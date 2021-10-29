@extends('layouts.navbar')


@section('title')
    Add Subject

@endsection




@section('body')

    <!-- component -->
    <div class="bg-gray-400 shadow rounded-lg p-6">
      <div>{{ $student[0]['student']['first_nm'] }}</div>
        <div class="grid lg:grid-cols-2 gap-6">
            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <form action="{{ route('SubjectChoice.store') }}" method="POST">
                    @csrf
                    <div>
                    </div>
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                        </p>
                    </div>
                    <p>
                        <input name="fname" autocomplete="false" tabindex="0" type="hidden"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" value="{{ $student[0]['student']['id'] }}"
                            required>
                    </p>
            </div>

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="dob" class="bg-white text-gray-600 px-1">DATE OF EXAM</label>
                    </p>
                </div>
                <p>
                    <input name="dob" autocomplete="false" tabindex="0" type="date"
                        class="py-1 px-1 outline-none block h-full w-full" value="{{ old('dob') }}" required>
                </p>
            </div>

            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="gender" class="bg-white text-gray-600 px-1">Subjects</label>
                    </p>
                </div>
                <Select class="py-1 px-1 outline-none block h-full w-full" name="gender" required>
                  @foreach ($subjects as $sub)
                  <option value="{{ $sub->id }}">{{ $sub->subject_nm }}  <span class="text-green-500">${{ $sub->cost_amt }}</span></option>
                  @endforeach
                </Select>
            </div>
        </div>
            <div class="border-t mt-6 pt-3">
                <button
                    class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300"
                    type="submit">
                    ADD
                </button>
                </form>
            </div>
        </div>


        <div class="mx-w-full mx-auto">
          <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
              <thead>
                <tr>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Choices</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">COST</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($student as $stud)
                <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light">{{ $stud['subject']['subject_nm'] }}</td>
                  <td class="py-4 px-6 border-b border-grey-light">{{ $stud['subject']['cost_amt'] }}</td>
                </tr>
                @endforeach
                <tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    @endsection
