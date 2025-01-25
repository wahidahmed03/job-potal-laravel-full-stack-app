@props(['job'=>null])
<div class=' border p-6 shadow rounded '>
    <div class=' flex justify-between items-center'>
        <img src={assets.company_icon} alt="" />
    </div>
    <h4 class=' font-medium  text-xl mt-2'>{{$job['title']}}</h4>
    <div class=' flex items-center gap-3 mt-2 text-xs'>
        <span class='ml-2 inline-flex items-center gap-2.5 bg-blue-50 border-blue-200 px-4 py-1.5 rounded'> {{$job['category']}} </span> 
        <span class='ml-2 inline-flex items-center gap-2.5 bg-red-50 border-red-200 px-4 py-1.5 rounded'> {{$job['location']}} </span> 
    </div>
    <p class=' text-gray-500 text-sm mt-4 '>
        {!! substr($job->description, 0, 120) !!}
    </p>  
    <div class=' mt-4 flex gap-4 text-sm'>
        <a href="/{{$job['id']}}" class=' bg-blue-600 text-white px-4 py-2 rounded '>Apply now</a>
        <a href="/{{$job['id']}}" class=' text-gra-500 border border-gray-500 rounded px-4 py-2'>Learn More</a>
    </div>
</div>