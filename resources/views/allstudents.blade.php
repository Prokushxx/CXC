@extends('layouts.navbar')

@section('title')
   Students
@endsection

@section('body')

<!-- component -->
<div class="mx-w-full mx-auto">
  <div class="bg-white shadow-md rounded my-6">
    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">First Name</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Last Name</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date Of Birth</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Class</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Phone Number</th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr class="hover:bg-grey-lighter">
          <td class="py-4 px-6 border-b border-grey-light">{{ $student->first_nm }}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ $student->last_nm }}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ $student->email_addr }}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ $student->dob }}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ $student->class }}</td>
          <td class="py-4 px-6 border-b border-grey-light">{{ $student->phone_nbr }}</td>
          <td class="py-4 px-6 border-b border-grey-light"> 
           <form action="{{ route('Student.destroy',$student->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('SubjectChoice.show',$student->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-dark">Add Subject</a><br>
            <a href="{{ route('Student.edit',$student->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-dark">Edit</a><br>
            <a href="{{ route('SubjectChoice.show',$student->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-yellow-400 hover:bg-green-dark">Subject</a><br>
            <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-blue-dark" type="submit">DELETE</button>
          </form>
          </td>
        </tr>
        @endforeach
        <tr>
          <td colspan="6" class="text-center">{{ $students->links() }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

    <button class="bg-blue-500 py-2 px-3 rounded ml-20 my-4 hover:bg-blue-400"><a href="{{ route('Student.create') }}" class="text-white">Add Student</a></button>
@endsection
