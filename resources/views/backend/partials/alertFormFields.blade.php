{{-- Start date --}}
@inputDate(['name' => 'start_date',
'label' => 'Start date*',
'value' => old('name', $alert->start_date ?? ''),
'helpText' => 'Select the date you would like the alert to start appearing',
])
@endinputDate

{{-- Start date --}}
@inputDate(['name' => 'end_date',
'label' => 'End date date*',
'value' => old('name', $alert->end_date ?? ''),
'helpText' => 'Select the date you would like the alert to stop appearing',
])
@endinputDate


{{-- short text --}}
@inputText(['name' => 'short_text',
'label' => 'Summary*',
'value' => old('name', $alert->short_text ?? ''),
'placeholder' => 'e.g. Closing for repairs on 15th December to 16th December',
'helpText' => 'Add a short summary (max 60 characters)'
])
@endinputText


{{-- Long text --}}
@inputWysiwyg(['name' => 'long_text',
'label' => 'Detailed description*',
'value' => old('name', $alert->long_text ?? ''),
'helpText' => 'Add a more detailed summary here which will appear in the pop up (max 180 characters)'
])
@endinputWysiwyg
