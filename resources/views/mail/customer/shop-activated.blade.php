@component('mail::message')
# Congratulations

Your shop is active now.

@component('mail::button', ['url' => route('shops.show', $shop->id)])
Go to Seller Centre
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
