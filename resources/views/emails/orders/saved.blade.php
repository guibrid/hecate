@extends('layouts.email')

@section('content')
    <p>{{ $title }}</p>
    <p>Booking n° : {{ $booking }}</p>
    <p>Batch n° : {{ $batch }}</p>
    <p>Looding : {{ $load }}</p>
    <p>Package # : {{ $package_number }}</p>
    <p>Weight : {{ $weight }}</p>
    <p>Volume : {{ $volume }}</p>
    <p>Recipient : {{ $recipient }}</p>
    <p>Supplier : {{ $supplier }}</p>
    <p>Comments : {{ $comment }}</p>
@endsection