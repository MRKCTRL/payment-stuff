<x-mail::message>
{{-- # Introduction --}}

Congratulations {{ $name }}!

You have been shortlisted for a job titled {{$title}}. Please be ready for the interview.



{{-- The body of your message. --}}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Best regards,<br>
{{-- Thanks,<br> --}}
{{ config('app.name') }}
</x-mail::message>
