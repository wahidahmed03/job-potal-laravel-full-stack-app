<x-PageLayout>
  <div class="absolute top-0 left-0 right-0 bottom-0 z-10 backdrop-blur-sm bg-black/30 flex justify-center items-center">
   <form action="/user/register" method="POST" class="relative bg-white p-10 rounded-xl text-slate-700" enctype="multipart/form-data">
        <!-- Display Success Message -->
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
              <button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
          </div>
      @endif
  
      @csrf <!-- CSRF Token for security -->
  
     <h1 class="text-center text-2xl text-neutral-700 font-medium"> User Register </h1>
     <p class="text-sm text-center">Welcome, please Register to continue.</p>
  
     <!-- NAME INPUT -->
      <div class="border px-4 py-2 flex items-center gap-2 rounded-full mt-5">
        <img src="{{ asset('assets/person_icon.svg') }}" alt="Person Icon" />
        <input name="name" class="outline-none text-sm w-full" placeholder="Write Your Full Name" required />
      </div>
      <div class="">
        @error('name')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>
  
    <!-- EMAIL INPUT -->
      <div class="border px-4 py-2 flex items-center gap-2 rounded-full mt-5">
        <img src="{{ asset('assets/email_icon.svg') }}" alt="Email Icon" />
        <input name="email" class="outline-none text-sm w-full" placeholder="Write Your Email Address" required />
      </div>
      <div class="">
        @error('email')
          <div class="error text-rose-500">{{ $message }}</div>
        @enderror
      </div>
  
    <!-- PASSWORD INPUT -->
      <div class="border px-4 py-2 flex items-center gap-2 rounded-full mt-5">
        <img src="{{ asset('assets/lock_icon.svg') }}" alt="Lock Icon" />
        <input name="password" class="outline-none text-sm w-full" type="password" placeholder="Password" required />
      </div>
      <div class="">
          @error('password')
              <div class="error text-rose-500">{{ $message }}</div>
          @enderror
      </div>

    <!-- PROFILE IG INPUT -->
      <div class="border px-4 py-2 flex items-center gap-2 rounded-full mt-5">
        <img src="{{ asset('assets/person_icon.svg') }}" alt="Lock Icon" />
        <input name="image" class="outline-none text-sm w-full" type="file" accept="image/png, image/jpeg, image/webp"  required />
      </div>
      <div class="">
        @error('image')
          <div class="error text-rose-500">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="bg-blue-600 w-full text-white py-2 rounded-full mt-4">Create Account</button>
  
      <p class="mt-5 text-center">Already have an account?
        <span class="text-blue-600 cursor-pointer">
            <a href="/user/login">Login</a>
        </span>
      </p>
   </form>
  </div>
  </x-PageLayout>
  