@extends('layouts.app')

@section('title', 'PHP Debugging Challenge')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm mb-5">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0"><i class="fas fa-bug me-2"></i> PHP Debugging Challenge</h2>
                        <a href="{{ route('home') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-home me-1"></i> Back to Home
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="lead">Practice identifying and fixing common PHP errors in these broken scripts.</p>
                    
                    <div class="row">
                        @foreach($scripts as $script)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="{{ $script['icon'] }} me-2 text-primary"></i>
                                        {{ $script['title'] }}
                                    </h5>
                                    <p class="card-text">{{ $script['description'] }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ $script['route'] }}" class="btn btn-outline-primary">
                                        <i class="fas fa-arrow-right me-1"></i> View Challenge
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection