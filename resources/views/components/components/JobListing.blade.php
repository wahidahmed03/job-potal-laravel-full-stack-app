@props(['jobs'=>null, 'filter'=>null, 'checkedFilter'=>['category'=>null,'location'=>null]])
{{-- @dd($jobs) --}}
{{-- @dd($checkedFilter) --}}

<div class=' container  2xl:px-20 mx-auto flex flex-col lg:flex-row max-lg:space-y-8 py-8 '>
  {{-- SIDEBAR  --}}
  <div class=" w-full lg:w-1/4 bg-white px-4">
    @if (!empty($filter))
    {{-- Search Filter From Hero Components  --}}
     <h3 class='font-medium text-lg mb-4'>Corent Search</h3>
     <div class=' mb-4 text-gray-600'>

       @if (!empty($filter['title']))
       <span class=' inline-flex items-center gap-2.5 bg-blue-50 border-blue-200 px-4 py-1.5 rounded'>
         {{$filter['title']}}
         {{-- <img  class='cursor-pointer' src={{ asset('assets/cross_icon.svg') }} alt="" />  --}}
       </span>
       @endif

       @if (!empty($filter['location']))
       <span class='ml-2 inline-flex items-center gap-2.5 bg-red-50 border-red-200 px-4 py-1.5 rounded'>
         {{$filter['location'] }}
       {{-- <img class='cursor-pointer' src={{ asset('assets/cross_icon.svg') }} alt="" /> --}}
       </span> 
       @endif
     </div>
   @endif


   {{-- GET LISTING JOBS --}}
   @if (empty($filter))
     <h4 class=' font-medium text-lg py-4 hidden lg:block'>Search by Catagorys </h4>
     <form method="POST" action="/" class="hidden lg:block" >
       @csrf
       <ul class="space-y-3 text-gray-600">
         <li class="flex gap-3 items-center">
           <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Information Technology" ? 'checked' : '' }}  value="Information Technology" /> Information Technology
         </li>
         <li class="flex gap-3 items-center">
           <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category']== "Healthcare" ? 'checked' : '' }}  value="Healthcare" /> Healthcare
         </li>
         <li class="flex gap-3 items-center">
           <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category']== "Skilled Trades" ? 'checked' : '' }} value="Skilled Trades" /> Skilled Trades
         </li>
         <li class="flex gap-3 items-center">
           <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Sales and Marketing" ? 'checked' : '' }} value="Sales and Marketing" /> Sales and Marketing
         </li>
         <li class="flex gap-3 items-center">
           <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Education and Training" ? 'checked' : '' }} value="Education and Training" /> Education and Training
         </li>
         <li class="flex gap-3 items-center">
          <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Hospitality and Tourism" ? 'checked' : '' }} value="Hospitality and Tourism" /> Hospitality and Tourism
        </li>
        <li class="flex gap-3 items-center">
          <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Finance and Accounting" ? 'checked' : '' }} value="Finance and Accounting" /> Finance and Accounting
        </li>
        <li class="flex gap-3 items-center">
          <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Engineering" ? 'checked' : '' }} value="Engineering" />Engineering
        </li>
        <li class="flex gap-3 items-center">
          <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Logistics and Supply Chain" ? 'checked' : '' }} value="Logistics and Supply Chain" /> Logistics and Supply Chain
        </li>
        <li class="flex gap-3 items-center">
          <input class="CatagoryListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['category'] == "Administrative Support" ? 'checked' : '' }} value="Administrative Support" /> Administrative Support
        </li>
       </ul>
       <button id="CatagorySubmit" type="submit"  hidden ></button>
     </form>


     <h4 class=' font-medium text-lg py-4 hidden lg:block '>Search by Location </h4>
     <form method="POST" action="/" class="hidden lg:block" >
       @csrf
       <ul class="space-y-4 text-gray-600">
         <li class="flex gap-3 items-center">
           <input class="LocationListItem scale-125" type="checkbox"  name="locationes" {{$checkedFilter['location'] == "Dhaka" ? 'checked' : '' }}  value="Dhaka" /> Dhaka
         </li>
         <li class="flex gap-3 items-center">
           <input class="LocationListItem scale-125" type="checkbox" name="locationes" {{$checkedFilter['location'] == "Chattogram" ? 'checked' : '' }} value="Chattogram" /> Chattogram
         </li>
         <li class="flex gap-3 items-center">
           <input class="LocationListItem scale-125" type="checkbox" name="locationes" {{$checkedFilter['location'] == "Khulna" ? 'checked' : '' }} value="Khulna" /> Khulna
         </li>
         <li class="flex gap-3 items-center">
           <input class="LocationListItem scale-125" type="checkbox" name="locationes" {{$checkedFilter['location'] == "Rajshahi" ? 'checked' : '' }} value="Rajshahi" /> Rajshahi
         </li>
         <li class="flex gap-3 items-center">
           <input class="LocationListItem scale-125" type="checkbox" name="locationes" {{$checkedFilter['location'] == "Barishal" ? 'checked' : '' }} value="Barishal" /> Barishal
         </li>
         <li class="flex gap-3 items-center">
          <input class="LocationListItem scale-125" type="checkbox" name="locationes" {{$checkedFilter['location'] == "Sylhet" ? 'checked' : '' }} value="Sylhet" /> Sylhet
        </li>
        <li class="flex gap-3 items-center">
          <input class="LocationListItem scale-125" type="checkbox" name="locationes" {{$checkedFilter['location'] == "Rangpur" ? 'checked' : '' }} value="Rangpur" /> Rangpur
        </li>
        <li class="flex gap-3 items-center">
          <input class="LocationListItem scale-125" type="checkbox" name="categories" {{$checkedFilter['location'] == "Mymensingh" ? 'checked' : '' }} value="Mymensingh" /> Mymensingh
        </li>
       </ul>
       <button id="LocationSubmitbtn" type="submit"  hidden ></button>
     </form>
   @endif
  </div>

  {{-- MAIN CONTAIN --}}

  <section class= ' w-full lg:w-3/4 text-gray-800 max-lg:px-4 px-4 '>
    <h3 class=' font-medium text-3xl py-2' id='job-list'>Lates jobs </h3>
    <p class=' mb-8 '>Get your desire job from top companies</p>
    <div class=' grid grids-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 '>
      @foreach ( $jobs as $job )
       <x-components.JobCard :job='$job' />
      @endforeach
    </div>
    <div class="mt-3">
      {{ $jobs->links() }}
    </div>
  </section>
</div>









 

<script>
const CatagoryListItems = document.querySelectorAll('.CatagoryListItem');
const LocationListItems = document.querySelectorAll('.LocationListItem');


const CatagorySubmitBtn = document.querySelectorAll('#CatagorySubmit');
const LocationSubmitBtn = document.querySelectorAll('#LocationSubmitbtn');


CatagoryListItems.forEach((item) => {
  item.addEventListener("click", () => {
    CatagorySubmitBtn.forEach((list) => list.click());
  });
});

LocationListItems.forEach((item) => {
  console.log()
  item.addEventListener("click", () => {
    LocationSubmitBtn.forEach((list) => list.click());
  });
});
</script>