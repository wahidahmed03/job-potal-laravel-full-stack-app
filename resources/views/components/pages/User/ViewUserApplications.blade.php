@props(['applicationData'=>null, 'filter'=>null, 'user'=>null, 'checkedFilter'=>null])
{{-- @dd($applicationData[0]->job->user) --}}

<x-PageLayout>
 <x-components.navbar :user='$user' />
 <div class="container px-4 min-h-[65vh] 2xl:px-20 mx-auto my-20">
  <h2 class=' text-xl font-semibold mb-4'>Jobs Applied</h2>
    <table class="min-w-full bg-white border rounded-lg ">
      <thead>
        <tr>
         <th class="py-3 px-4 border-b text-left">Company</th>
         <th class="py-3 px-4 border-b text-left">Job Title</th>
         <th class="py-3 px-4 border-b text-left max-sm:hidden">Location</th>
         <th class="py-3 px-4 border-b text-left max-sm:hidden">Date</th>
         <th class="py-3 px-4 border-b text-left">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $applicationData as $application )
        {{-- @dd($application->user['profileImg']) --}}
        <tr >
         <td class=" py-3 px-4 flex items-cente gap-2 border-b">
          <img class='w-8 h-8' src="/{{$application->job->user['profileImg']}}" alt="" />
          {{$application->job->user['name']}}
         </td>
           <td class="py-2 px-4 border-b">{{$application->job['title']}}   </td>
           <td class="py-2 px-4 border-b max-sm:hidden">{{$application->job['location']}}  </td>
           <td class="py-2 px-4 border-b max-sm:hidden">{{$application->job->created_at->diffForHumans()}}  </td>
           <td class="py-2 px-4 border-b">
             <span class="px-4 py-1.5 rounded {{ $application['status'] == 'Accept' ? 'bg-green-100' : ($application['status'] == 'Reject' ? 'bg-red-100' : 'bg-blue-100') }}">
                {{$application['status']}}
             </span>
         </td>
        </tr>
        @endforeach
        <tr>
           <td colSpan="5" class="border border-gray-300 px-4 py-2 text-center">
                No jobs applied yet.
            </td>
        </tr>
      </tbody>
      </table>
    </div>
  </div>


</x-PageLayout>