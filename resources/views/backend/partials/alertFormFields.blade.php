{{-- Start date --}}
@inputDateTime(['name' => 'starts_at',
'label' => 'Start date*',
'value' => old('starts_at', isset($alert) ? $alert->starts_at->format('Y-m-d') : ''),
'helpText' => 'Select the date you would like the alert to start appearing',
])
@endinputDateTime

{{-- End date --}}
@inputDateTime(['name' => 'ends_at',
'label' => 'End date date*',
'value' =>  old('ends_at', isset($alert) ? $alert->ends_at->format('Y-m-d') : ''),
'helpText' => 'Select the date you would like the alert to stop appearing',
])
@endinputDateTime


{{-- short text --}}
@inputText(['name' => 'short_text',
'label' => 'Summary*',
'value' => old('short_text', $alert->short_text ?? ''),
'placeholder' => 'e.g. Closing for repairs on 15th December to 16th December',
'helpText' => 'Add a short summary (max 60 characters)',
'attributes' => ['maxLength' => 60],
])
@endinputText


{{-- Long text --}}
@inputWysiwyg(['name' => 'long_text',
'label' => 'Detailed description*',
'value' => old('long_text', $alert->long_text ?? ''),
'helpText' => 'Add a more detailed summary here which will appear in the pop up (recommended max 180 characters)'
])
@endinputWysiwyg
