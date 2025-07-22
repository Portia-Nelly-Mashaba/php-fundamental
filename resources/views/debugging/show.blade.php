@extends('layouts.app')

@section('title', 'Debugging Script #'.$scriptNumber)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>
                    <i class="fas fa-bug text-primary me-2"></i>
                    Script #{{ $scriptNumber }} Debugging
                </h1>
                <a href="{{ route('debugging-challenge') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to All
                </a>
            </div>

            <div class="row">
                <!-- Original Code -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-danger">
                        <div class="card-header bg-danger text-white">
                            <i class="fas fa-times-circle me-2"></i> Broken Code
                        </div>
                        <div class="card-body">
                            <pre class="bg-light p-3 rounded"><code>{{ $script['original'] }}</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Fixed Code -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-success">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-check-circle me-2"></i> Corrected Code
                        </div>
                        <div class="card-body">
                            <pre class="bg-light p-3 rounded"><code>{{ $script['fixed'] }}</code></pre>
                            <button id="runScript" class="btn btn-primary w-100 mt-3">
                                <i class="fas fa-play me-1"></i> Run Fixed Code
                            </button>
                            <div id="outputContainer" class="mt-3 d-none">
                                <h5 class="mt-3"><i class="fas fa-terminal me-2"></i>Output:</h5>
                                <div class="bg-dark text-white p-3 rounded">
                                    <pre id="scriptOutput" class="text-success mb-0">{{ $script['output'] }}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Explanation -->
            <div class="card border-info mb-4">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-lightbulb me-2"></i> Explanation of Fixes
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach(explode("\n", $script['explanation']) as $point)
                        <div class="list-group-item">
                            <i class="fas fa-arrow-right text-info me-2"></i>
                            {{ trim($point) }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="d-flex justify-content-between">
                @if($scriptNumber > 1)
                <a href="{{ route('show-script', $scriptNumber - 1) }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-1"></i> Previous Script
                </a>
                @else
                <span></span>
                @endif

                @if($scriptNumber < 4)
                <a href="{{ route('show-script', $scriptNumber + 1) }}" class="btn btn-primary">
                    Next Script <i class="fas fa-arrow-right ms-1"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('runScript').addEventListener('click', function() {
    const outputContainer = document.getElementById('outputContainer');
    outputContainer.classList.remove('d-none');
    window.scrollTo({
        top: outputContainer.offsetTop - 20,
        behavior: 'smooth'
    });
});
</script>
@endpush
@endsection