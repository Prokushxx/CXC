@extends('layouts.navbar')

@section('title')
{{ $student->first_nm }} {{ $student->last_nm }}
@endsection

@section('body')
    
<div class="bg-gray-400 shadow rounded-lg p-6">
  <div class="grid lg:grid-cols-2 gap-6">
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <form action="{{ route('Student.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="fname" class="bg-white text-gray-600 px-1">First name *</label>
        </p>
      </div>
      <p>
        <input name="fname" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full" value="{{ $student->first_nm }}" placeholder="{{ $student->first_nm }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="lname" class="bg-white text-gray-600 px-1">Last name *</label>
        </p>
      </div>
      <input type="hidden" >
      <p>
        <input name="lname" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value="{{ $student->last_nm }}" placeholder="{{ $student->last_nm }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="dob" class="bg-white text-gray-600 px-1">DATE OF BIRTH</label>
        </p>
      </div>
      <p>
        <input name="dob" autocomplete="false" tabindex="0" type="date" class="py-1 px-1 outline-none block h-full w-full" value="{{ $student->dob }}" placeholder="{{ $student->dob }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="phone" class="bg-white text-gray-600 px-1">Phone Number</label>
        </p>
      </div>
      <p>
        <input name="phone" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value="{{ $student->phone_nbr }}" placeholder="{{ $student->phone_nbr }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="class" class="bg-white text-gray-600 px-1">CLASS</label>
        </p>
      </div>
      <p>
        <input name="class" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value="{{ $student->class }}" placeholder="{{ $student->class }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="email" class="bg-white text-gray-600 px-1">Email</label>
        </p>
      </div>
      <p>
        <input name="email" type="email" class="py-1 px-1 outline-none block h-full w-full" value="{{ $student->email_addr }}" placeholder="{{ $student->email_addr }}">
      </p>
      {{-- <span class="text-red-800">
        @error('email')
          {{ $message }}  
        @enderror
      </span> --}}
    </div>
    {{-- <div
    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
            <label for="gender" class="bg-white text-gray-600 px-1">Subject</label>
        </p>
    </div>
    <Select class="py-1 px-1 outline-none block h-full w-full" name="subject" required>
        @foreach ($subjects as $sub)
            <option value="{{ $sub->id }}" name="subject">{{ $sub->subject_nm }}</option>
        @endforeach
    </Select>
</div> --}}
  </div>
  <div class="border-t mt-6 pt-3">
    <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300" type="submit">
      Update
    </button>
  </form>
  </div>
</div>


@endsection