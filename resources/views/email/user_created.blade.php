@component('mail::message')
# Добро пожаловать, {{ $user['name'] }}!

Ваш аккаунт успешно создан.

**Email:** {{ $user['email'] }}

@if(!empty($user['phone']))
**Телефон:** {{ $user['phone'] }}
@endif

@component('mail::button', ['url' => url('/login')])
Войти
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
