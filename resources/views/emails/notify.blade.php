<x-mail::message>
# Introduction


Congratulationals, You are now a Premuim user
{{-- The body of your message. --}}
<p>Your Purchase transaction</p>
<p>Plan: {{$plan}}</p>
<p>Your Plan ends on :{{billingDebit}}</p>
<x-mail::button :url="''">
Jobs
{{-- Button Text --}}

</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
