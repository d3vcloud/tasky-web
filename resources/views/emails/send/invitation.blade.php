@component('mail::message')
# Let's collaborate!

{{ $user }} invites you to join the project:

@component('mail::project',['title' => $project ,'url' => $url,'color' => 'default'])
    Join to Project
@endcomponent

{{--@component('mail::button', ['url' => $url,'color' => 'default'])
Join to Project
@endcomponent
--}}
Thanks,<br>
{{ $user }}
@endcomponent
