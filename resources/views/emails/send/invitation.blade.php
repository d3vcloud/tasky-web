@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'www.google.com.pe'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
