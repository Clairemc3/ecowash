<div id="prices" class="section section__page">
    <h2>Prices</h2>


    @foreach ($machines as $machine)
        <div class="price__item">
        <h3>{{$machine->name}}</h3>
            <div class="price__cost">
                <p>{{ $machine->price }}</p>
            </div>
        <p>{{ $machine->description }}</p>
        </div>
    @endforeach


    <div class=my-6>
        {!!DisplayContent::bySlug('prices-extra')!!}
    </div>

</div>
