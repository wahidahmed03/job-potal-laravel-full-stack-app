@props(['user'=>null])
{{-- @dd($user) --}}
<x-PageLayout>
  <div class=' min-h-screen'>

    {{-- NAVE MANU START  --}}
    <div class=" shadow py-4">
     <div class=" px-5 flex justify-between items-center ">
        <img class=' max-sm:w-32 cursor-pointer ' src={{asset('assets/logo.svg') }} alt="" />

        <div class=' flex items-center gap-3 '>
            <p class=' max-sm:hidden:'>Welcome, {{$user['name']}}</p>
            <div class=' relative group'>
            <img class=' w-8 border rounded-full' src= {{ asset($user['profileImg']) }} alt="" />
            <div class=' absolute hidden group-hover:block top-0 right-0 z-10 text-black rounded pt-12'>
               <ul class=' list-none m-0 p-2 bg-white rounded-md border text-sm'>
                <form action="">
                  <li  class='py-1 px-2 cursor-pointer pr-10 '>Logout</li>
                </form>
              </ul>
             </div>
            </div>
        </div>

     </div>
    </div>
    {{-- NAVE MANU END. --}}
    <div class=' flex  '>
      {{-- LEFT SIDEBAR --}}
        <div class="inline-block min-h-screen border-r-2">
            <ul class="flex flex-col items-start pt-5 text-gray-800">
                {{-- {{ route('dashboard.add-job') }} --}}
                <a href="/company/add-job" class="flex items-center p-3 sm:px-6 gap-2 w-full hover:bg-gray-100 @if(request()->is('dashboard/add-job')) bg-blue-100 border-r-4 border-blue-500 @endif">
                    <img class="min-w-4" src="{{ asset('assets/add_icon.svg') }}" alt="">
                    <p class="max-sm:hidden">Add Job</p>
                </a>

                {{-- {{ route('dashboard.manage-job') }} --}}
                <a href="/company/manage-jobs" class="flex items-center p-3 sm:px-6 gap-2 w-full hover:bg-gray-100 @if(request()->is('dashboard/manage-job')) bg-blue-100 border-r-4 border-blue-500 @endif">
                    <img class="min-w-4" src="{{ asset('assets/home_icon.svg') }}" alt="">
                    <p class="max-sm:hidden">Manage Jobs</p>
                </a>

                {{-- {{ route('dashboard.view-applications') }} --}}
                <a href="/company/view-application" class="flex items-center p-3 sm:px-6 gap-2 w-full hover:bg-gray-100 @if(request()->is('dashboard/view-applications')) bg-blue-100 border-r-4 border-blue-500 @endif">
                    <img class="min-w-4" src="{{ asset('assets/person_tick_icon.svg') }}" alt="">
                    <p class="max-sm:hidden">View Applications</p>
                </a>
            </ul>
        </div> 
      {{-- END LEFT SIDEBAR --}}
      {{-- DASHBORD CONTANT AREA --}}
      <div>
        {{ $slot }}
       </div>
    </div>

  </div>
</x-PageLayout>