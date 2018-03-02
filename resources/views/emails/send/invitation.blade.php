@component('mail::message')
# Let's collaborate!

{{ $user }} invites you to join the project:

@component('mail::button', ['url' => $url,'color' => 'blue'])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
