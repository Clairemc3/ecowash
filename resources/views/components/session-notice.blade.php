@if ($message = Session::get('success'))
    <x-alert class="bg-green-500" type="success" :message="$message"/>
@endif
@if ($message = Session::get('error'))
    <x-alert type="error" :message="$message" class="bg-red-500"/>
@endif