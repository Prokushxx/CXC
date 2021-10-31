@extends('layouts.navbar')

@section('title')
  ALL Selection
@endsection


@section('body')
  
<div class="mx-w-full mx-auto">
  <div class="bg-white shadow-md rounded my-6">
    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Student name</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Subjects</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Class</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
          {{-- <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Options</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($choices as $stud)
        <tr class="hover:bg-grey-lighter">
          <td class="py-4 px-6 border-b border-grey-light">{{ $stud['student']['first_nm'] }}  {{ $stud['student']['last_nm'] }}</td>
       
          {{-- @foreach ($stud['subject'] as $h) --}}

          <td class="py-4 px-6 border-b border-grey-light">  {{ ($stud->subject->subject_nm) }}</td>
          {{-- @endforeach --}}
          <td class="py-4 px-6 border-b border-grey-light">{{ $stud['student']['email_addr'] }}</td>
          <td class="py-4 px-6 border-b border-grey-light">
            {{-- <a href="{{ route('Student') }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-dark">Edit</a><br> --}}
          </td>
          @endforeach
        </tr>
      </tbody>
    </table>
    {{ $choices->links() }}
  </div>
</div>

@endsection