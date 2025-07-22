@extends('layouts.app')

@section('title', 'Access Control Demo')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Access Control Demo</h1>
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-home me-1"></i> Back to Home
            </a>
        </div>
        <div class="card-body">
            <div class="access-card {{ strtolower($access_level) }}">
                <h2 class="h4">{{ $access_level }}</h2>
                <p class="mb-0">
                    @switch($role)
                        @case('admin') You can manage everything @break
                        @case('editor') You can edit content @break
                        @case('subscriber') You can view content @break
                        @default Please log in with valid credentials
                    @endswitch
                </p>
            </div>
            
            <div class="role-links mt-4">
                <p class="mb-2">Try different roles:</p>
                <a href="{{ route('access-control', ['role' => 'admin']) }}" class="btn btn-sm btn-outline-primary me-2">Admin</a>
                <a href="{{ route('access-control', ['role' => 'editor']) }}" class="btn btn-sm btn-outline-warning me-2">Editor</a>
                <a href="{{ route('access-control', ['role' => 'subscriber']) }}" class="btn btn-sm btn-outline-info me-2">Subscriber</a>
                <a href="{{ route('access-control') }}" class="btn btn-sm btn-outline-secondary">Guest</a>
            </div>
        </div>
    </div>
@endsection