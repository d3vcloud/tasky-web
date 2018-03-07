@component('mail::message')
# Introduction

The body of your message.

@foreach($tasks as $task)
    @component('mail::button', ['url' => ''])
        {{ $task->name }}
    @endcomponent
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
