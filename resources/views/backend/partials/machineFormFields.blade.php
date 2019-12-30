{{-- Name --}}
@inputText(['name' => 'name',
'label' => 'Name*',
'value' => old('name', $machine->name ?? ''),
'placeholder' => 'e.g. Small machines',
'helpText' => 'Add the machine type here'
])
@endinputText

{{-- Price --}}
@inputText(['name' => 'price',
'label' => 'Price*',
'value' => old('name', $machine->price ?? ''),
'placeholder' => 'e.g. £5.00 for 10lb load',
'helpText' => 'Add price/load size here'
])
@endinputText

{{-- Description --}}
@inputText(['name' => 'description',
'label' => 'Description',
'value' => old('name', $machine->description ?? ''),
'placeholder' => 'e.g. suitable for heavy duvet',
'helpText' => 'Optional description'
])
@endinputText
