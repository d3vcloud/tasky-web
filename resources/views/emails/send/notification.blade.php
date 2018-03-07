@component('mail::message')
# Information

{{ $user }} {{ message }}.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
