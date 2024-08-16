<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app') <!-- If using Laravel's default layout -->
@section('content')
<x-dashboard-layout>
    <h1>Welcome to the Dashboard</h1>
    <p>This is the main content area where you can display dashboard-specific information.</p>
</x-dashboard-layout>
@endsection