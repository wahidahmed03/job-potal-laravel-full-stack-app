@props(['user'=>null])

<x-pages.Dashboard.Dashboard :user='$user'>
 <div class=' container p-4 max-w-5xl'>
        <div class=' overflow-x-auto'>
          <table class=' min-w-full bg-white border border-gray-200 max-sm:text-sm'>
            <thead>
              <tr>
                <th class=' py-2 px-4 border-b text-left max-sm:hidden'>#</th>
                <th class=' py-2 px-4 border-b text-left' >Job Title</th>
                <th class=' py-2 px-4 border-b text-left max-sm:hidden' >Date</th>
                <th class=' py-2 px-4 border-b text-left max-sm:hidden' >Locaion</th>
                <th class=' py-2 px-4 border-b text-center' >Applicate</th>
                <th class=' py-2 px-4 border-b text-left' >Visible</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $jobs as $job )
                <tr class=' text-gray-700'>
                  <td class=' py-2 px-4 border-b max-sm:hidden'>{{$loop->index+1}}</td>
                  <td class=' py-2 px-4 border-b' >{{$job->title}}</td>
                  <td class=' py-2 px-4 border-b max-sm:hidden'> {{ $job->created_at->format('d M Y, h:i A') }}</td>
                  <td class=' py-2 px-4 border-b max-sm:hidden'>{{$job->location}}</td>
                  <td class=' py-2 px-4 border-b text-center'>{{$job->jobApplications->count()}}</td>
                  <td class='py-2 px-4 border-b'> 
                    <input  type="checkbox" checked={{$job->visibility}}  class=' scale-125 ml-4' />
                  </td>
                  @endforeach
                </tr>
            </tbody>
          </table>
        </div>
        <div class=' mt-4 flex justify-end'>
          <a href="{{ route('Company.add_jobsForm') }}" class="bg-black text-white py-2 px-4 rounded">Add New Job</a>
        </div>
      </div>
</x-pages.Dashboard.Dashboard>