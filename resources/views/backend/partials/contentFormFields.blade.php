{{-- Help text --}}
@can('edit-content-help-text')
@inputText(['name' => 'help_text',
'helpText' => 'This will tell the user where this content lives',
'label' => 'Help text',
'value' => old('slug', $content->help_text ?? ''),
])
@endinputText
@elsecan (isset($content))
    <h3> {{ $content->help_text }}</h3>
@endcan


{{-- Slug --}}
@can('edit-content-slug')
@inputText(['name' => 'slug',
'label' => 'Slug',
'value' => old('slug', $content->slug ?? ''),
])
@endinputText
@endcan

{{-- Body --}}
@inputWysiwyg(['name' => 'body',
'value' => old('name', $content->body ?? '')
])
@endinputWysiwyg
