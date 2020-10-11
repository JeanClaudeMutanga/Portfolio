@extends('layouts.app')

@component('mail::message')
Hello,

Thank you for your message we will get back to you in the shortest time possible


Thanks,<br>
{{ config('app.name') }}
@endcomponent
