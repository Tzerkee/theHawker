@component('mail::message')
# Contact Message

<strong>Name</strong><br>
{{$details['name']}}

<strong>Email</strong><br>
{{$details['email']}}

<strong>Phone</strong><br>
{{$details['phone']}}

<strong>Message</strong><br>
{{$details['message']}}

@endcomponent
