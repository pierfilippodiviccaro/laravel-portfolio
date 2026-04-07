@extends("layouts.admin")
@section("miao")

<div class="content-card" style="max-width: 520px;">
    <div class="card-header-custom">
        <span>Modifica profilo</span>
        <button type="button" class="btn-outline-custom">Annulla</button>
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
        <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:4px;">
            <button type="button" class="btn-outline-custom">
                Annulla
            </button>
            <button type="submit" class="btn-primary-custom">
                Salva
            </button>
        </div>
    </form>
</div>
@endsection