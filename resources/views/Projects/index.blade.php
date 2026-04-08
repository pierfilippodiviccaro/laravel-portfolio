@extends("layouts.admin")
    <div style="padding: 2rem;">
        <h1>I miei progetti</h1>
        <p>Una raccolta dei lavori realizzati</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem; margin-top: 2rem;">
            @forelse ($projects as $project)
                <div class="card">
                    <span>{{ $project->category }}</span>
                    <p>{{ $project->author }}</p>
                    <h3>{{ $project->title }}</h3>
                    <div>
                        <a href="{{ route('projects.show', $project) }}">Vedi progetto →</a>
                        <span>{{ $project->created_at->format('M Y') }}</span>
                    </div>
                </div>
            @empty
                <p>Nessun progetto trovato.</p>
            @endforelse
           
        </div>
        
        
        <a href="{{ route("projects.create",$project) }}"> Crea un nuovo Progetto</a>
    </div>