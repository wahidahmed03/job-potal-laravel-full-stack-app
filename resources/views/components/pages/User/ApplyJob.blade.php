@props(['job'=>null, 'user'=>null, 'applicationData'=>null, 'IsApplied'=>null])

<x-PageLayout>
    <x-components.navbar :user='$user' />
    <div class="min-h-screen flex flex-col py-10 container px-4 2xl:px-20 mx-auto">
        <div class="bg-white text-black rounded-lg w-full">
          <div class="flex justify-center md:justify-between flex-wrap gap-8 px-14 py-20 mb-6 bg-sky-50 border border-sky-400 rounded-xl">
            <div class="flex flex-col md:flex-row items-center">
              <img class='h-24 bg-white rounded-lg p-4 mr-4 max-md:mb-4 border' src={{asset($job->user['profileImg'])}} alt="" />
              <div class='text-center md:text-left text-neutral-700'>
                <h1 class='text-2xl sm:text-4xl font-medium'>{{$job['title']}}</h1>
                <div class='flex flex-row flex-wrap max-md:justify-center gap-y-2 gap-6 items-center text-gray-600 mt-2'>
                  <span class='flex items-center gap-1'>
                    <img src={assets.suitcase_icon} alt="" />
                    {{$job->user['name']}}
                  </span>
                  <span class='flex items-center gap-1'>
                    <img src={assets.location_icon} alt="" />
                    {{$job['location']}}
                  </span>
                  <span class='flex items-center gap-1'>
                    <img src={assets.person_icon} alt="" />
                    {{$job['level']}}
                  </span>
                  <span class='flex items-center gap-1'>
                    <img src={assets.money_icon} alt="" />
                    $ {{$job['Salary']}}
                  </span>
                </div>
              </div>
            </div>

            <div class='flex flex-col justify-center text-end text-sm max-md:max-auto max-md:text-center'>
                @if (!$IsApplied)
                  <form action="/{{$job['id']}}" method="POST">
                    @csrf
                    <input type="text" name="CompanyId" value="{{$job->user['id']}}" hidden>
                    <button type="submit" class='bg-blue-500 p-2.5 px-10 text-white rounded mt-5'>Apply Now</button>
                  </form>
                @else
                   <button  class='bg-red-500 p-2.5 px-10 text-white rounded mt-5 cursor-not-allowed'>Already Aplied</button>
                @endif 
              <p class='mt-1 text-gray-600'>Posted {{ $job->created_at->diffForHumans() }}</p> 
            </div>
          </div>
        </div>

        <div class=" flex flex-col lg:flex-row justify-between items-start">
          <div class=" w-full lg:w-2/3">
            <h2 class=' font-bold text-2xl mb-4'>Job description</h2> 
            <div class='rich-text'>{!!  $job['description'] !!}</div>
              @if (!$IsApplied)
                <form action="/{{$job['id']}}" method="POST">
                @csrf
                  <input type="text" name="CompanyId" value="{{$job->user['id']}}" hidden>
                  <button type="submit" class='bg-blue-500 p-2.5 px-10 text-white rounded mt-5'>Apply Now</button>
                </form>
              @else 
               <button  class='bg-red-500 p-2.5 px-10 text-white rounded mt-5 cursor-not-allowed'>Already Aplied</button>
              @endif 
            </div>

            <div class=' w-full lg:w-1/3 mt-8 lg:mt-0 lg:ml-8 space-y-5'>
              <h2>More Jobs From {{$job->user['name']}} </h2>
              @foreach (  $job->user->jobs as $job )
                <x-components.JobCard :job='$job' />
              @endforeach
            </div>
        </div>
      </div>
</x-PageLayout>