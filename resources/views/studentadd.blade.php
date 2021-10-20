@extends('layouts.navbar')


@section('title',
'Students-Info')




@section('body')

<!-- component -->
<div class="bg-gray-400 shadow rounded-lg p-6">
  <div class="grid lg:grid-cols-2 gap-6">
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <form action="{{ route('Student.store') }}">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="firstname" class="bg-white text-gray-600 px-1">First name *</label>
        </p>
      </div>
      <p>
        <input name="fname" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full" value="{{ old('fname') }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="lname" class="bg-white text-gray-600 px-1">Last name *</label>
        </p>
      </div>
      <p>
        <input name="lname" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value="{{ old('lname') }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="username" class="bg-white text-gray-600 px-1">DATE OF BIRTH</label>
        </p>
      </div>
      <p>
        <input name="dob" autocomplete="false" tabindex="0" type="date" class="py-1 px-1 outline-none block h-full w-full" value="{{ old('dob') }}" required>
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="password" class="bg-white text-gray-600 px-1">Phone Number</label>
        </p>
      </div>
      <p>
        <input name="phone" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" value="{{ old('phone') }}" required>
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="password" class="bg-white text-gray-600 px-1">CLASS</label>
        </p>
      </div>
      <p>
        <input name="class" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" required value="{{ old('class') }}">
      </p>
    </div>
    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
      <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
        <p>
          <label for="email" class="bg-white text-gray-600 px-1">Email</label>
        </p>
      </div>
      <p>
        <input name="email" autocomplete="false" tabindex="0" type="email" class="py-1 px-1 outline-none block h-full w-full" required value="{{ old('email') }}">
      </p>
    </div>
  </div>
  <div class="border-t mt-6 pt-3">
    <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
      Save
    </button>
  </form>
  </div>
</div>

@endsection