<x-mail::message>
    # Demande de contact
    -{{$data['firstname']}}
    -{{$data['surname']}}
    -{{$data['tel']}}
    -{{$data['email']}}

    # Message:
              {{$data['message']}}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
