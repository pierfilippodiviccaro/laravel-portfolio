@extends("layouts.admin")

@section('content')

<div style="
    max-width: 680px;
    margin: 2.5rem auto;
    font-family: 'Georgia', serif;
">

    {{-- Header --}}
    <div style="margin-bottom: 2rem;">
        <a href="{{ route('projects.index') }}" style="
            font-size: 0.78rem;
            color: #999;
            text-decoration: none;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        ">← Tutti i progetti</a>

        <h1 style="
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0.75rem 0 0.25rem;
            line-height: 1.2;
        ">{{ $project->title }}</h1>
        
        
      
        <p style="
        font-size: 1rem;
        color: #444;
        line-height: 1.75;
        margin: 0 0 2.5rem;
    ">categoria: {{ $type->name }}</p> 
    
      <div>
        @forelse ($project->technologies as $technology )
        <span style="background-color:{{ $technology->color }}">{{ $technology->name }}</span>
        @empty
        <p>nessuna tecnologia usata</p>        
        @endforelse
      </div>


        <div style="display: flex; gap: 1rem; align-items: center; margin-top: 0.5rem;">
            <span style="font-size: 1rem; color: #666;">
                ✍️ autore :  {{ $project->author }}
            </span>

            @if($project->category)
            <span style="
                font-size: 0.72rem;
                background: #f0ede8;
                color: #555;
                padding: 3px 10px;
                border-radius: 20px;
                letter-spacing: 0.04em;
                text-transform: uppercase;
            ">{{ $project->category }}</span>
            @endif
        </div>
    </div>

    {{-- Divider --}}
    <hr style="border: none; border-top: 1px solid #e8e4de; margin-bottom: 1.75rem;">

    {{-- Descrizione --}}
    <p style="
        font-size: 1rem;
        color: #444;
        line-height: 1.75;
        margin: 0 0 2.5rem;
    ">{{ $project->description }}</p>

    {{-- Azione --}}
    <a href="{{ route('projects.edit', $project) }}" style="
        display: inline-block;
        padding: 10px 22px;
        background: #1a1a1a;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-size: 0.85rem;
        letter-spacing: 0.03em;
        transition: background 0.2s;
    ">✏️ Modifica progetto</a>
    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" style="
        display: inline-block;
        padding: 10px 22px;
        background: #c0392b;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 0.85rem;
        letter-spacing: 0.03em;
        cursor: pointer;
        transition: background 0.2s;
    " onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
        🗑️ Elimina progetto
    </button>
</form>
</div>

@endsection