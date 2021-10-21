@extends('layouts.navbar')

@section('title')
    Subjects
@endsection


@section('body')

    <!-- component -->
    <div class="w-1/2 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Subject Name</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $sub)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $sub->subject_nm }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">${{ $sub->cost_amt }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <form action="{{ route('Subject.destroy', $sub->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-blue-da"
                                        type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <section class="">
      <div class="ml-20 mx-auto bg-red-500 mt-20 max-h-0">
        <h5 class="text-white font-bold max-w-xl">Add A Subject</h5>
      <form action="{{ route('Subject.store') }}" method="post">
        @csrf
        <span class="text-red-600 font-semibold">@error('subject')
          {{ $message }}
        @enderror</span><br>
      <div class=" rounded-lg overflow-hidden sm:flex-row max-h-16">
        <input class="py-3 px-4 bg-gray-200 text-gray-800 border-gray-300 border-2 outline-none placeholder-gray-500 focus:bg-gray-100" type="text" name="subject" placeholder="Enter Subject" required>
        <input class="py-3 px-4 bg-gray-200 text-gray-800 border-gray-300 border-2 outline-none placeholder-gray-500 focus:bg-gray-100" type="number" name="cost" placeholder="Enter Price" required>
        <button type="submit" class="py-3 px-4 bg-gray-700 text-gray-100 rounded-r-lg font-semibold uppercase hover:bg-gray-600">Add</button>
      </div>
      </form>
      </div> 
    </section>
    {{-- <button class="bg-green-500 py-2 px-3 rounded ml-20 my-4 hover:bg-green-400"><a href="{{ route('Subject.store') }}"
            class="text-white">Add Subject</a></button> --}}

@endsection
