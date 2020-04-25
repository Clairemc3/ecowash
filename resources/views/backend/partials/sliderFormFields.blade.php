{{-- Image --}}
<label>Select an image</label>
<image-select :images=@json(Storage::disk('public')->files('slider-images'))>
</image-select>

{{-- text --}}
@inputText(['name' => 'text',
'label' => 'Text',
'value' => old('text', $slider->text ?? ''),
])
@endinputText


{{-- Order --}}
@inputNumber(['name' => 'order',
'label' => 'Order',
'value' => old('order', $slider->order ?? ''),
])
@endinputText
