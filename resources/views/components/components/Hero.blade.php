<div class=' container 2xl:px-20 mx-auto my-10 '>
    <div class=' bg-gradient-to-r from-purple-800 to-purple-950 text-white py-16 text-center  mx-2 rounded-xl '>
        <h2 class=' text-2xl md:text-3xl lg:text-4xl font-medium mb-4'>Over 10,000+ jobs to apply</h2>
        <p class=' mb-8 max-w-xl mx-auto text-sm font-light px-5 '>Your Next Big Career Move Starts Right Here - Explore the Best Job Opportunities and Take the First Step Toward Your Future!</p>
        <form action="/" method="POST" class=' flex items-center justify-between bg-white rounded text-gray-500 max-w-xl pl-4 mx-4 sm:mx-auto ' >
            @csrf
            <div class=' flex items-center'>
                <img class=' h-4 sm:h-4' src={{asset('assets/search_icon.svg')}} alt="" />
                <input name="title" type="text" placeholder=' Search Jobs' class=' max-sm:text-xs p-2 rounded outline-none w-full ' />
            </div>
            <div class=' flex items-center'>
                <img lassName=' h-4 sm:h-4' src={{asset('assets/location_icon.svg')}} alt="" />
                <input name="location"  type="text" placeholder='Location' class=' max-sm:text-xs p-2 rounded outline-none w-full '  />
            </div>
            <button class=' bg-blue-500 px-6 py-2 rounded text-white m-1 '>Search</button>
        </form>
    </div>
    <div class=" border border-gray-300 shadow-md mx-2 mt-5 p-6 rounded-md flex ">
        <div class=" flex justify-center gap-10  flex-wrap">
            <p class=' font-medium'>Trusted by</p>
            <img class='h-6' src={{asset ('assets/walmart_logo.svg')}} alt="" >
            <img class='h-6' src={{asset('assets/walmart_logo.svg')}} alt="" >
            <img class='h-6' src={{asset('assets/accenture_logo.png')}} alt="" >
            <img class='h-6' src={{asset('assets/samsung_logo.png')}} alt="" >
            <img class='h-6' src={{asset('assets/amazon_logo.png')}} alt="" >
            <img class='h-6' src={{asset('assets/adobe_logo.png')}} alt="" >
        </div>
    </div>
</div>