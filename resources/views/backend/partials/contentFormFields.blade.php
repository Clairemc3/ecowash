{{-- Help text --}}
@inputText(['name' => 'help_text',
'helpText' => 'This will tell the user where this content lives',
'label' => 'Help text',
'value' => old('slug', $content->help_text ?? ''),
])
@endinputText

{{-- Slug --}}
@inputText(['name' => 'slug',
'label' => 'Slug',
'value' => old('slug', $content->slug ?? ''),
])
@endinputText

{{-- Body --}}
@inputWysiwyg(['name' => 'body',
'value' => old('name', $content->body ?? '')
])
@endinputWysiwyg
