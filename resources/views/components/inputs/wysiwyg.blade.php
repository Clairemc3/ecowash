<div class="mb-4 mt-4 {{ $display ?? 'block'}}">
{{-- If we need to have more than one of these on page then we will need to target the item by class --}}
    <textarea name={{ $name }} id="ckeditor">
        <p>{{$value}}</p>
    </textarea>
</div>
