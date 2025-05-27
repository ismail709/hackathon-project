@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row justify-center mt-[80px] gap-6 px-4">

    <x-user-dashboard-components.sidebar/>
    <x-user-dashboard-components.user-reservations-table/>

</div>
@endsection