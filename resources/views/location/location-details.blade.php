@extends('layouts.app')

@section('content')

<section class="px-4 py-8 md:px-16 w-[95%] mt-[80px] mx-auto">
  <div class="flex flex-col lg:flex-row gap-10">

<!-- LEFT SECTION -->
<div class="lg:w-2/3 flex flex-col">
    <!-- Images -->
    <x-location-details-components.location-details-images :local="$local"/>
    <!-- Text and button -->
    <x-location-details-components.location-details-content :local="$local"/>
</div>

<!-- RIGHT SECTION -->
<x-location-details-components.location-details-informations :local="$local" :places_dispo="$places_dispo"/>
  </div>
</section>

@endsection
