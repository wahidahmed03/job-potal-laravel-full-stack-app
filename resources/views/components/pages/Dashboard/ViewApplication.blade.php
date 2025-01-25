<x-pages.Dashboard.Dashboard  :user='$user'>
    <div class=' container mx-auto p-4'>
        <div>
          <table class=' w-full max-w-4xl bg-white border-gray-200 max-sm:text-sm'>
            <thead>
              <tr class=' border-b'> 
                <th class='py-2 px-4 text-left'>#</th>
                <th class='py-2 px-4 text-left' >username</th>
                <th class='py-2 px-4 text-left max-sm:hidden'>Job Title</th>
                <th class='py-2 px-4 text-left max-sm:hidden'>Location</th>
                <th class='py-2 px-4 text-left'>Resume</th>
                <th class='py-2 px-4 text-left'>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $applicationData as  $index => $application )
              {{-- @dd($application->job) --}}
              {{-- @dd($application->user['profileImg']) --}}
                
              <tr key={index} class=' text-gray-700'>
                <td class=' py-2 px-4 border-b text-center'>{{$index+1}}</td>
                <td class=' py-2 px-4 border-b text-center flex items-center' >
                  <img class='w-10 h-10 rounded-full mr-3 max-sm:hidden object-cover' src={{asset($application->user['profileImg'])}} alt="" />
                  <span>{{$application->user['name']}}</span>
                </td>
                <td class=' py-2 px-4 border-b text-center max-sm:hidden'>{{$application->job['title']}}</td>
                <td class=' py-2 px-4 border-b text-center max-sm:hidden'>{{$application->job['location']}}</td>
                <td class=' py-2 px-4 border-b '>
                  <a href="" target='_Blank' class=' bg-blue-50 text-blue-400 px-3 py-1 rounded inline-flex gap-2 items-center '>
                    Resume <img src='assets.resume_download_icon ' alt="" />
                  </a>
                </td>
                <td class='py-2 px-4 border-b relative'>
                  <div class=' relative inline-block text-left group '> 
                    <button class="{{ $application['status'] == 'Reject' ? 'text-red-500' : ($application['status'] == 'Accept' ? 'text-green-500' : 'text-gray-500') }} action-button">
                      {{ $application['status'] }}
                   </button>

                    <div class=' z-10 hidden absolute right-0 md:left-0 top-0 mt-2 w-32 bg-white border border-gray-200 shadow group-hover:block'>
                      <form action={{route('Company.jobs.Change.applicand')}} method="POST">
                        @csrf
                        <input type="text" name='id' hidden value={{$application['id']}} >
                        <input type="text" name='status' hidden value="Accept">
                        <button type="submit" class=' block w-full text-left px-4 py-2 text-blue-500 hover:bg-gray-100'>Accept</button>
                      </form>

                      <form action="{{ route('Company.jobs.Change.applicand') }}" method="POST">
                        @csrf
                        <input type="text" name='id' hidden value={{$application['id']}} >
                        <input type="text" name='status' hidden value="Reject">
                        <button type="submit" class=' block w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100'>Reject</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
</x-pages.Dashboard.Dashboard>