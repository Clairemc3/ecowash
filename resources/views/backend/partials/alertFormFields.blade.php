{{-- Start date --}}
@inputDate(['name' => 'start_date',
'label' => 'Start date*',
'value' => old('start_date', isset($alert) ? $alert->start_date->format('Y-m-d') : ''),
'helpText' => 'Select the date you would like the alert to start appearing',
])
@endinputDate

{{-- Start date --}}
@inputDate(['name' => 'end_date',
'label' => 'End date date*',
'value' =>  old('end_date', isset($alert) ? $alert->end_date->format('Y-m-d') : ''),
'helpText' => 'Select the date you would like the alert to stop appearing',
])
@endinputDate


{{-- short text --}}
@inputText(['name' => 'short_text',
'label' => 'Summary*',
'value' => old('short_text', $alert->short_text ?? ''),
'placeholder' => 'e.g. Closing for repairs on 15th December to 16th December',
'helpText' => 'Add a short summary (max 60 characters)'
])
@endinputText


{{-- Long text --}}
@inputWysiwyg(['name' => 'long_text',
'label' => 'Detailed description*',
'value' => old('long_text', $alert->long_text ?? ''),
'helpText' => 'Add a more detailed summary here which will appear in the pop up (max 180 characters)'
])
@endinputWysiwyg
