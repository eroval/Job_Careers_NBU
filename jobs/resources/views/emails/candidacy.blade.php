@component('mail::message')
# You have a new Application!
## {{ Auth::user()->name }} 

has applied for the position: \
&nbsp; *{{ $job_name}}*


Thank You for choosing us,<br>
{{ config('app.name') }}
@endcomponent
