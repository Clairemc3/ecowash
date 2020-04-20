{{-- Image --}}
{{-- <image-select></image-select> --}}

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
