@extends("layouts.admin")
@section("miao")

<div class="content-card" style="max-width: 520px;">
    <div class="card-header-custom">
        <span>Modifica pro</span>
        <button type="button" class="btn-outline-custom" onclick="history.back()">Annulla</button>
    </div>

    <form method="POST" action="{{ route('projects.update', $project) }}" style="padding: 1.1rem 1.25rem;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 12px;">
            <label for="title" style="display:block; font-size:0.78rem; color:#777; margin-bottom:4px;">
                nome del titolo
            </label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ $project->title }}"
                style="
                    width:100%;
                    padding: 8px 10px;
                    border-radius: 8px;
                    border:1px solid #e0ddd8;
                    background:#faf9f7;
                    font-size:0.85rem;
                    color:#1a1a1a;
                    box-sizing:border-box;
                    outline:none;
                "
            >
        </div>

        <div style="margin-bottom: 12px;">
            <label for="author" style="display:block; font-size:0.78rem; color:#777; margin-bottom:4px;">
                nome dell'autore
            </label>
            <input
                type="text"
                id="author"
                name="author"
                value="{{ $project->author }}"
                style="
                    width:100%;
                    padding: 8px 10px;
                    border-radius: 8px;
                    border:1px solid #e0ddd8;
                    background:#faf9f7;
                    font-size:0.85rem;
                    color:#1a1a1a;
                    box-sizing:border-box;
                    outline:none;
                "
            >
        </div>

        <div style="margin-bottom: 16px;">
            <label for="description" style="display:block; font-size:0.78rem; color:#777; margin-bottom:4px;">
              descrizione
            </label>
            <textarea
                id="description"
                name="description"
                style="
                    width:100%;
                    padding: 8px 10px;
                    border-radius: 8px;
                    border:1px solid #e0ddd8;
                    background:#faf9f7;
                    font-size:0.85rem;
                    color:#1a1a1a;
                    box-sizing:border-box;
                    outline:none;
                    resize:vertical;
                "
            >{{ $project ->description }}</textarea>
        </div>
    
         <div style="margin-bottom: 16px;">
             
             <label for="type_id" name="type_id">tipo di progetto</label>
              <select name="type_id" id="type_id"  style="
                    width:100%;
                    padding: 8px 10px;
                    border-radius: 8px;
                    border:1px solid #e0ddd8;
                    background:#faf9f7;
                    font-size:0.85rem;
                    color:#1a1a1a;
                    box-sizing:border-box;
                    outline:none;
                    resize:vertical;
                ">
            
            @foreach ($types as $type )
            <option value="{{ $type->id }}"{{ $project->type_id == $type->id ? 'selected': ''}}>{{ $type->name }}</option>
            @endforeach
            
        </select>
        <div style="margin-bottom: 16px;">
    <label style="display:block; font-size:0.78rem; color:#777; margin-bottom:8px;">tecnologie</label>
    <div style="display:flex; flex-wrap:wrap; gap:8px;">
        @foreach ($technologies as $technology)
            <label for="technology-{{ $technology->id }}" style="
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 5px 12px;
                border-radius: 20px;
                border: 1px solid #e0ddd8;
                background: #faf9f7;
                font-size: 0.82rem;
                color: #1a1a1a;
                cursor: pointer;
                user-select: none;
                transition: background 0.15s, border-color 0.15s;
            ">
                <input
                    type="checkbox"
                    name="technologies[]"
                    value="{{ $technology->id }}"
                    id="technology-{{ $technology->id }}"
                    style="accent-color: #1a1a1a; cursor:pointer;"
                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} >
                {{ $technology->name }}
            </label>
        @endforeach
    </div>
</div>
        <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:4px;">
            <button type="button" class="btn-outline-custom" onclick="history.back()">
                Annulla
            </button>
            <button type="submit" class="btn-primary-custom">
                Salva
            </button>
        </div>
    </form>
</div>
@endsection