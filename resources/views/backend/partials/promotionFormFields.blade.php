@can('edit-promotion-name')
    @inputText(['name' => 'name',
    'helpText' => 'The name of the hook',
    'label' => 'Name',
    'value' => old('slug', $promotion->name ?? ''),
    ])
    @endinputText
@elsecan( isset($promotion))
    <h3>{{ $promotion->name }}</h3>
@endcan

{{-- Slug--}}
@can('edit-promotion-slug')
    @inputText(['name' => 'slug',
    'helpText' => 'This slug will be used as a hook to display the promotional block.</br> <span class="text-red-600">Warning</span>, changing this may prevent promotions from being displayed',
    'label' => 'Slug',
    'value' => old('slug', $promotion->slug ?? ''),
    ])
    @endinputText
@endcan


<x-inputs.switch
        name="active"
        :value="old('active', $promotion->active ?? false)"
        label="Is this promotion active?"
        help-text="This setting controls whether the promotion is visible to visitors"
        />


<wysiwyg value="{{ old('body', $promotion->body ?? '')}}" name="body" configuration="promotion"></wysiwyg>

<x-inputs.select name="theme" label="Select a colour theme">
        <x-slot name="options">
            <x-inputs.option name="theme" value="green" label="Green"/>
            <x-inputs.option name="theme" value="red" label="Red"/>
        </x-slot>
</x-inputs.select>
