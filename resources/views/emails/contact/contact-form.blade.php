@component('mail::message')
{{--# Introduction--}}

{{--The body of your message.--}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}

# Thank you for your message

<strong>Name</strong> {{ $data['name'] }}
<br>
<strong>Email</strong> {{ $data['email'] }}

<strong>Message</strong>

{{ $data['message'] }}
@endcomponent
