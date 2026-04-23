<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DREAM - My Journeys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --purple-dream: #6f42c1; --dark-bg: #0f0a1a; }
        body { background: var(--dark-bg); color: white; font-family: 'Poppins', sans-serif; }
        .video-card { 
            background: rgba(255, 255, 255, 0.05); 
            border-radius: 20px; 
            border: 1px solid rgba(255, 255, 255, 0.1); 
            overflow: hidden;
            transition: 0.3s;
            backdrop-filter: blur(10px);
        }
        .video-card:hover { transform: translateY(-10px); border-color: var(--purple-dream); }
        .ai-badge {
            position: absolute; top: 15px; right: 15px;
            background: linear-gradient(45deg, #00f2fe, #4facfe);
            color: black; font-size: 0.7rem; font-weight: bold;
            padding: 5px 10px; border-radius: 20px;
        }
        .video-thumb {
            width: 100%; height: 200px; object-fit: cover;
            filter: brightness(0.7);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold"><span style="color: var(--purple-dream);">Your</span> Generated Dreams</h1>
        <a href="/" class="btn btn-outline-light rounded-pill">Explore More</a>
    </div>

    <div class="row g-4">
        @forelse($videos as $video)
            <div class="col-md-4">
                <div class="card video-card h-100">
                    <span class="ai-badge border-0 shadow">AI GENERATED</span>
                    
                    @php
                        $keywords = [
                            'Cultural Trip' => 'history,heritage,ancient',
                            'Memories' => 'nostalgia,family,vintage',
                            'Future' => 'cyberpunk,futuristic,space'
                        ];
                        $keyword = $keywords[$video->type] ?? 'dream';
                    @endphp
                    
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=1000&auto=format&fit=crop" class="video-thumb" alt="AI Preview">

                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-info fw-bold">{{ strtoupper($video->type) }}</small>
                            <small class="text-muted">ID: #{{ $video->id }}</small>
                        </div>
                        <h4 class="fw-bold mb-3">{{ $video->titre }}</h4>
                        <p class="text-light-50 small mb-4" style="opacity: 0.8;">
                             "{{ Str::limit($video->description, 100) }}"
                        </p>
                        
                        <div class="d-grid">
                            <button class="btn btn-primary rounded-pill py-2" style="background: var(--purple-dream); border: none;">
                                <i class="bi bi-play-fill"></i> View Experience
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h3 class="text-muted">No dreams generated yet.</h3>
                <p>Start an experience to see the AI magic here.</p>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>