@component('mail::message')
# Привет, {{ $user->name }}!

Спасибо за регистрацию на нашем сайте.

@component('mail::button', ['url' => url('/')])
Перейти на сайт
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent