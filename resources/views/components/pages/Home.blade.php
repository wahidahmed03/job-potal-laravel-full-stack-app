@props(['jobs'=>null, 'filter'=>null, 'user'=>null, 'checkedFilter'=>null])

<x-PageLayout>
    <x-components.navbar :user='$user' />
    <x-components.Hero />
    <x-components.JobListing :jobs='$jobs' :filter='$filter' :checkedFilter="$checkedFilter" />
</x-PageLayout>