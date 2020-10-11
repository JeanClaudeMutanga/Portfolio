@extends('layouts.app')

@component('mail::message')
Hello

 A client has dropped you a message via the website, log in to check it out :--)



Thanks,<br>
{{ config('app.name') }}
@endcomponent
