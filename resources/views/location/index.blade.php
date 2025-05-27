@extends('layouts.app')

@section('content')
<!-- add hero -->
<section class="min-h-screen bg-[#fef7ee] w-full px-6 md:px-20 lg:px-32 xl:px-60 mt-12 pt-6 pb-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <x-location-components.location-filter-card :categories="$categories" />
        <x-location-components.location-card :locals="$locals" />
    </div>
</section>
@endsection
