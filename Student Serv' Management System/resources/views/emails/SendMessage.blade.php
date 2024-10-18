<x-mail::message>
    #{{ $receiver }}

    {{ $message }}

    Message sent by {{ $sender }}


    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
