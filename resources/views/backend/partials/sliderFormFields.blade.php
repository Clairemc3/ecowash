{{-- Image --}}
<label>Select an image</label>
<image-select existing-image="{{ $slider->image_source ?? null }}" image-api-url="{{ route('admin.images.index', ['folder' => 'slider-images'])}}">
</image-select>

{{-- text --}}
@inputText(['name' => 'text',
'label' => 'Text (optional)',
'value' => old('text', $slider->text ?? ''),
'required' => false
])
@endinputText


{{-- Order --}}
@inputNumber(['name' => 'order',
'label' => 'Order',
'value' => old('order', $slider->order ?? ''),
])
@endinputText
