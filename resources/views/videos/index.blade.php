<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DREAM - {{ $selectedType }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --purple-dream: #6f42c1; }
        body { background: #f4f0fa; padding-top: 50px; }
        .glass-card { background: white; border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(111,66,193,0.1); }
        .btn-generate { background: var(--purple-dream); color: white; border-radius: 12px; padding: 12px; font-weight: bold; border: none; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card glass-card p-5">
                <a href="/" class="text-decoration-none mb-3 d-block text-muted">← Back to Home</a>
                <h2 class="fw-bold mb-4" style="color: var(--purple-dream);">{{ $selectedType }} Configuration</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="{{ $selectedType }}">

                    <div class="mb-4">
                        <label class="form-label fw-bold">Journey Title</label>
                        <input type="text" name="titre" class="form-control" placeholder="Name your experience" required>
                    </div>

                    @if($selectedType == 'Cultural Trip')
                        <div class="mb-4">
                            <label class="form-label fw-bold">Historical Era / Location</label>
                            <input type="text" name="description" class="form-control" placeholder="Ex: Carthage, 200 BC">
                        </div>
                    @elseif($selectedType == 'Memories')
                        <div class="mb-4">
                            <label class="form-label fw-bold">Upload Memories (Images)</label>
                            <input type="file" name="photos" class="form-control" multiple>
                            <input type="hidden" name="description" value="Memory video generation">
                        </div>
                    @else
                        <div class="mb-4">
                            <label class="form-label fw-bold">Your Vision of the Future</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Describe the world you want to see..."></textarea>
                        </div>
                    @endif

                    <div class="alert alert-secondary text-center py-2 fw-bold">Price: 49.99 TND</div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-generate">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>