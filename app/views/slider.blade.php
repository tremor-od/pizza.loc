<div class="slider">
<div class="owl-carousel">
    @foreach($sliderList as $slider)
        <img class="first-slide" src="{{ $slider->slider->url('thumb') }}" alt="First slide">
    @endforeach
</div>
</div>
