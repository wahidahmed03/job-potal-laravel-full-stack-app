<x-PageLayout>
<div class="absolute top-0 left-0 right-0 bottom-0 z-10 backdrop-blur-sm bg-black/30 flex justify-center items-center">
 <form action='/user/login' method="POST" class="relative bg-white p-10 rounded-xl text-slate-700">
    @csrf <!-- CSRF Token for security -->

      <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   <h1 class="text-center text-2xl text-neutral-700 font-medium"> User Login </h1>
   <p class="text-sm text-center">  Welcome back, please Login to continue. </p>



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
    <button type="submit" class="bg-blue-600 w-full text-white py-2 rounded-full mt-4">Login Account</button>

    <p class="mt-5 text-center">Don't have an account?
      <a  href="/user/register" class="text-blue-600 cursor-pointer"> Sign up </a>
    </p>
 </form>

</div>
</x-PageLayout>