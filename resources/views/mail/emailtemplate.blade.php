@component('mail::message')
# Dear {{$data['firstname']}}

Thank you for your interest to join 1Block Ghana Listing platform.

Your account has been subscribed to the {{$data['package']}} plan.

Kindly click on the link below to complete your account setup
@component('mail::button', ['url' => $url])
Setup Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
