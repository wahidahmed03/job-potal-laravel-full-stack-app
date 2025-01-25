@props(['user'=>null])
<div class="shadow py-4">
    <div class="container px-4 2xl:px-20 mx-auto flex justify-between items-center">
      <img class=" cursor-pointer" onclick="window.location.href='{{ route('Home') }}'" src={{asset ('assets/logo.svg')}} alt="Company Logo" />
         @if (!empty($user))
            <div class=" flex  items-center gap-3 " >
               @if ($user['role'] == 'company' )
                 <a href={{ route('Company.jobs.view.applicand')}} >Applied Jobs</a>
               @else
                 <a href={{ route('Company.jobs.view.applicand')}} >View Your Applied</a>
               @endif
                <p></p>
                <p class=" max-sm:hidden "> Hi, {{$user['name']}}</p>
                <UserButton />
            </div> 
         @endif 
         
         @if (empty($user))
         <div class="flex gap-4 max-sm:text-xs items-center">
            <a href="{{route('company.register')}}" class="text-gray-600">Recruiter Login</a>
            <a  href="{{route('user.loginForm')}}" class="bg-blue-600 text-white px-6 sm:px-9 py-2 rounded-full" >Login </a>
         </div>
             
         @endif

    </div>
</div>