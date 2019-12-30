{{-- Slug --}}
@inputText(['name' => 'slug',
'label' => 'Slug',
'value' => old('slug', $content->slug ?? ''),
'disabled' => true,
'display' => 'flex'
])
@endinputText

{{-- Body --}}
@inputWysiwyg(['name' => 'body',
'value' => old('name', $content->body ?? ''),
'helpText' => 'Optional description'
])
@endinputText
