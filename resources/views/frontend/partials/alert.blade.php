<div class="alert text-center w-full alert text-white">
    {{$alert->short_text}}
    <a class="text-sm" @click.prevent @click=$modal.open() href="#">
         more info...
    </a>
</div>

<modal class="alert__modal" open-on-load="true" disable-scroll="true">
    <h1>{{$alert->short_text}}</h1>

    {!!$alert->long_text!!}

    <template v-slot:footer>
        <div class="button-group">
            <button @click=$modal.close() class="btn btn-teal">Okay</button>
        </div>
    </template>

</modal>
