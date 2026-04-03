@extends("layouts.posts")
@section('form')
<form method="POST" action="{{ route('projects.store') }}" style="padding: 1.1rem 1.25rem;">
        @csrf
       

        <div style="margin-bottom: 12px;">
            <label for="title" style="display:block; font-size:0.78rem; color:#777; margin-bottom:4px;">
                Titolo del Progetto
            </label>
            <input
                type="text"
                id="title"
                name="title"
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
                autore del progetto
            </label>
            <input
                type="text"
                id="author"
                name="author"
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
                descrizione del progetto
            </label>
            <input
            type="text"    
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
             >
        </div>

        <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:4px;">
            <input type="submit" value="invia">
        </div>
    </form>
</div>
@endsection