<div data-aos="fade-up" class="flex flex-col lg:flex-row gap-6">
    <!-- Main image -->
    <div class="flex-1">
@if(!empty($local->image_path))
    <img src="{{ asset('storage/' . $local->image_path) }}" alt="Main" class="w-full h-auto rounded-md border">
@else
    <img src="{{ asset('assets/location-image.png') }}" alt="Main" class="w-full h-auto rounded-md border">
@endif

    </div>

    <!-- Grid of 4 images -->
<div class="flex-1 grid grid-cols-2 gap-4">
    @if($local->images->count() > 0)
        @foreach($local->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image {{ $loop->iteration }}" class="w-full h-auto rounded-md border">
        @endforeach
    @else
        @for ($i = 1; $i <= 4; $i++)
            <img src="{{ asset('assets/location-image.png') }}" alt="Placeholder Image {{ $i }}" class="w-full h-auto rounded-md border">
        @endfor
    @endif
</div>

</div>
