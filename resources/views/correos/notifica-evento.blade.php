@component('mail::message')
# Notificacion de su pedido
    
El pedido de {{$evento->nombre}} esta en proceso
    
@component('mail::button', ['url'=> route('evento.show', $evento)])
    Ver pedido
@endcomponent
    
Thanks,
{{ config('app.name') }}
@endcomponent