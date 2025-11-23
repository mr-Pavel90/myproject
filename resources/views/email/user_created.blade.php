@component('mail::message')
# welcome ser, {{ $user['name'] }}!

your account created successfull.

**Email:** {{ $user['email'] }}

@if(!empty($user['phone']))
**Phone:** {{ $user['phone'] }}
@endif

@component('mail::button', ['url' => url('/login')])
Input
@endcomponent

Thanks Ser,<br>
{{ config('app.name') }}
@endcomponent
