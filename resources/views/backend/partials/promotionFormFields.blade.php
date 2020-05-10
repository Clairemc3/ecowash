{{-- Help text --}}
@inputText(['name' => 'help_text',
    'helpText' => 'This will tell the user where the the content lives',
    'label' => 'Help text',
    'value' => old('slug', $promotion->help_text ?? ''),
])
@endinputText

{{-- Slug --}}
@inputText(['name' => 'position',
    'helpText' => 'This slug will be used as a hook to display the promotional block',
    'label' => 'Position',
    'value' => old('slug', $promotion->position ?? ''),
])
@endinputText

{{-- Body --}}
@inputWysiwyg(['name' => 'body',
    'value' => old('name', $promotion->body ?? '')
])
@endinputWysiwyg


<x-inputs.select name="theme" label="Select a colour theme">
        <x-slot name="options">
            <x-inputs.option value="green" label="Green"/>
            <x-inputs.option value="red" label="Red"/>
        </x-slot>
</x-inputs.select>


<x-input-radio name="active">
        <x-slot name="options">
            <x-inputs.radio-opion value="1" label="Active"/>
        </x-slot>
</x-input-checkbox>
