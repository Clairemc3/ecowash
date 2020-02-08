{{-- <div class="section">
    <div class="slider">
        <img class="slider__image" src="/images/launderette-slider-1.jpg" alt="">
        <div class="relative">
            <div class="slider__text">Over 10 dryers and machines available daily from 7am to 8.30pm</div>
        </div>
    </div>
</div> --}}


<div class="section">
    <carousel :items="[
        {src: '/images/launderette-slider-1.jpg', text: 'This is a thing'},
        {src: '/images/launderette-slider-1.jpg', text: 'This is a thing 2'}]">
    </carousel>
    {{-- <carousel :items="@json($sliders)">
    </carousel> --}}
</div>
