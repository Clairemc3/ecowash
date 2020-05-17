{{--Active--}}
<x-inputs.radio
        name="active"
        label="Is this promotion active"
        help-text="This setting controls whether the promotion is visible to visitors">
    <x-slot name="options">
        <x-inputs.radio-option name="active" value="1" label="Active"/>
    </x-slot>
</x-inputs.radio>


{{-- Slug--}}
@inputText(['name' => 'slug',
    'helpText' => 'This slug will be used as a hook to display the promotional block.</br> <span class="text-red-600">Warning</span>, changing this may prevent promotions from being displayed',
    'label' => 'Slug',
    'value' => old('slug', $promotion->slug ?? ''),
])
@endinputText

{{-- Name--}}
@inputText(['name' => 'name',
'helpText' => 'The name of the hook',
'label' => 'Name',
'value' => old('slug', $promotion->name ?? ''),
])
@endinputText

<wysiwyg value="{{ old('body', $promotion->body ?? '')}}" name="Body"></wysiwyg>
{{-- Body--}}
{{--@inputWysiwyg(['name' => 'body',--}}
{{--    'label' => 'Promotion content',--}}
{{--    'helpText' => 'Max chars xyz',--}}
{{--    'value' => old('name', $promotion->body ?? '')--}}
{{--])--}}
{{--@endinputWysiwyg--}}

<x-inputs.select name="theme" label="Select a colour theme">
        <x-slot name="options">
            <x-inputs.option name="theme" value="green" label="Green"/>
            <x-inputs.option name="theme" value="red" label="Red"/>
        </x-slot>
</x-inputs.select>
