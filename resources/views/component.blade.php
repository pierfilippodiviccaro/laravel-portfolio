@extends('layouts.admin')
@section('contenuto')

<body>
 
<!-- ══════════════ SIDEBAR ══════════════ -->
<div id="sidebar">
  <div class="sidebar-brand">
    <h1>Portfolio</h1>
    <small>Area admin</small>
  </div>
 
  <nav class="sidebar-nav pt-2">
    <div class="nav-section-label">Principale</div>
 
    <a href="#" class="nav-link active" onclick="showPage('dashboard', this)">
      <i class="bi bi-grid-fill"></i> Panoramica
    </a>
    <a href="{{ route("projects.index") }}" class="nav-link">
      <i class="bi bi-folder2-open"></i> Progetti
    </a>
    <a href="#" class="nav-link" onclick="showPage('skills', this)">
      <i class="bi bi-stars"></i> Competenze
    </a>
    <a href="#" class="nav-link" onclick="showPage('experience', this)">
      <i class="bi bi-briefcase"></i> Esperienze
    </a>
 
    <div class="nav-section-label">Comunicazione</div>
 
    <a href="#" class="nav-link" onclick="showPage('messages', this)">
      <i class="bi bi-chat-text"></i> Messaggi
      <span class="badge bg-danger ms-auto" style="font-size:0.6rem">3</span>
    </a>
 
    <div class="nav-section-label">Sistema</div>
 
    <a href="#" class="nav-link" onclick="showPage('settings', this)">
      <i class="bi bi-gear"></i> Impostazioni
    </a>
  </nav>
 
  <div class="sidebar-user">
    <div class="sidebar-avatar">TU</div>
    <div>
      <div style="font-size:0.78rem;font-weight:500;color:#1a1a1a">{{ $user->name }}</div>
      <div style="font-size:0.68rem;color:#aaa">Amministratore</div>
    </div>
  </div>
</div>
 
<!-- ══════════════ MAIN ══════════════ -->
<div id="main-content">
 
  <!-- ── DASHBOARD ── -->
  <section class="page-section active" id="sec-dashboard">
    <div class="page-header mb-4">
      <h2>Buongiorno 👋</h2>
      <p>Ecco una panoramica del tuo portfolio</p>
    </div>
 
    <!-- Stat cards -->
    <div class="row g-3 mb-4">
      <div class="col-3">
        <div class="stat-card">
          <div class="stat-label">Progetti</div>
          <div class="stat-value">12</div>
          <div class="stat-change text-success">↑ 2 questo mese</div>
        </div>
      </div>
      <div class="col-3">
        <div class="stat-card">
          <div class="stat-label">Visite</div>
          <div class="stat-value">1.4k</div>
          <div class="stat-change text-success">↑ 18% vs mese scorso</div>
        </div>
      </div>
      <div class="col-3">
        <div class="stat-card">
          <div class="stat-label">Messaggi</div>
          <div class="stat-value">3</div>
          <div class="stat-change text-danger">● Non letti</div>
        </div>
      </div>
      <div class="col-3">
        <div class="stat-card">
          <div class="stat-label">Competenze</div>
          <div class="stat-value">8</div>
          <div class="stat-change" style="color:#aaa">Aggiornate</div>
        </div>
      </div>
    </div>
 
    <!-- Progetti recenti -->
    <div class="content-card mb-4">
      <div class="card-header-custom">
        <span>Progetti recenti</span>
        <button class="btn-outline-custom" onclick="showPage('projects', document.querySelectorAll('.nav-link')[1])">Vedi tutti →</button>
      </div>
      <div class="list-row">
        <div class="status-dot dot-pub"></div>
        <div class="flex-grow-1">
          <div class="row-title">App E-commerce React</div>
          <div class="row-sub">React, Node.js, MongoDB</div>
        </div>
        <span class="tag-pill">Pubblicato</span>
        <div class="row-date">Mar 2024</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-pub"></div>
        <div class="flex-grow-1">
          <div class="row-title">Design System UI</div>
          <div class="row-sub">Figma, CSS, Storybook</div>
        </div>
        <span class="tag-pill">Pubblicato</span>
        <div class="row-date">Feb 2024</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-wip"></div>
        <div class="flex-grow-1">
          <div class="row-title">Dashboard Analytics</div>
          <div class="row-sub">D3.js, Python</div>
        </div>
        <span class="tag-pill">In corso</span>
        <div class="row-date">Apr 2024</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-draft"></div>
        <div class="flex-grow-1">
          <div class="row-title">Mobile App iOS</div>
          <div class="row-sub">Swift, SwiftUI</div>
        </div>
        <span class="tag-pill">Bozza</span>
        <div class="row-date">—</div>
      </div>
    </div>
 
    <!-- Attività + Grafico -->
    <div class="row g-3">
      <div class="col-6">
        <div class="content-card h-100">
          <div class="card-header-custom"><span>Attività recente</span></div>
          <div class="p-3">
            <div class="activity-item">
              <div class="act-dot"></div>
              <div>
                <div>Nuovo messaggio da Marco Rossi</div>
                <div class="act-time">2 ore fa</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="act-dot"></div>
              <div>
                <div>Progetto "App E-commerce" aggiornato</div>
                <div class="act-time">Ieri, 15:42</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="act-dot"></div>
              <div>
                <div>Nuova competenza aggiunta: TypeScript</div>
                <div class="act-time">3 giorni fa</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="act-dot"></div>
              <div>
                <div>2 nuovi messaggi ricevuti</div>
                <div class="act-time">5 giorni fa</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="content-card h-100">
          <div class="card-header-custom"><span>Visite questa settimana</span></div>
          <div class="p-3 d-flex align-items-end" style="height:160px">
            <div class="bar-chart w-100">
              <div class="bar-col"><div class="bar-area"><div class="bar-fill" style="height:40%"></div></div><div class="bar-label">Lun</div></div>
              <div class="bar-col"><div class="bar-area"><div class="bar-fill" style="height:65%"></div></div><div class="bar-label">Mar</div></div>
              <div class="bar-col"><div class="bar-area"><div class="bar-fill" style="height:50%"></div></div><div class="bar-label">Mer</div></div>
              <div class="bar-col"><div class="bar-area"><div class="bar-fill" style="height:80%"></div></div><div class="bar-label">Gio</div></div>
              <div class="bar-col"><div class="bar-area"><div class="bar-fill active-bar" style="height:100%"></div></div><div class="bar-label">Ven</div></div>
              <div class="bar-col"><div class="bar-area"><div class="bar-fill" style="height:55%"></div></div><div class="bar-label">Sab</div></div>
              <div class="bar-col"><div class="bar-area"><div class="bar-fill" style="height:30%"></div></div><div class="bar-label">Dom</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- ── PROGETTI ── -->
  <section class="page-section" id="sec-projects">
    <div class="page-header mb-4">
      <h2>Progetti</h2>
      <p>Gestisci i tuoi lavori e case study</p>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="d-flex gap-2">
        <button class="btn-primary-custom">+ Nuovo progetto</button>
        <button class="btn-outline-custom">Filtri</button>
      </div>
      <span style="font-size:0.75rem;color:#aaa">5 progetti totali</span>
    </div>
    <div class="content-card">
      <div class="list-row">
        <div class="status-dot dot-pub"></div>
        <div class="flex-grow-1"><div class="row-title">App E-commerce React</div><div class="row-sub">React, Node.js, MongoDB</div></div>
        <span class="tag-pill me-1">Web</span><span class="tag-pill">Full-stack</span>
        <div class="row-date ms-3">Mar 2024</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-pub"></div>
        <div class="flex-grow-1"><div class="row-title">Design System UI</div><div class="row-sub">Figma, CSS, Storybook</div></div>
        <span class="tag-pill">Design</span>
        <div class="row-date ms-3">Feb 2024</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-wip"></div>
        <div class="flex-grow-1"><div class="row-title">Dashboard Analytics</div><div class="row-sub">D3.js, Python, FastAPI</div></div>
        <span class="tag-pill">Data</span>
        <div class="row-date ms-3">Apr 2024</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-draft"></div>
        <div class="flex-grow-1"><div class="row-title">Mobile App iOS</div><div class="row-sub">Swift, SwiftUI</div></div>
        <span class="tag-pill">Mobile</span>
        <div class="row-date ms-3">—</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-pub"></div>
        <div class="flex-grow-1"><div class="row-title">Blog Personale</div><div class="row-sub">Next.js, MDX, Vercel</div></div>
        <span class="tag-pill">Web</span>
        <div class="row-date ms-3">Gen 2024</div>
      </div>
    </div>
  </section>
 
  <!-- ── COMPETENZE ── -->
  <section class="page-section" id="sec-skills">
    <div class="page-header mb-4">
      <h2>Competenze</h2>
      <p>Le tecnologie e gli strumenti che padroneggi</p>
    </div>
    <div class="row g-3">
      <div class="col-4">
        <div class="skill-card">
          <div class="skill-name">React / Next.js</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" style="width:92%"></div></div>
          <div class="skill-level">Avanzato · 4 anni</div>
        </div>
      </div>
      <div class="col-4">
        <div class="skill-card">
          <div class="skill-name">TypeScript</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" style="width:85%"></div></div>
          <div class="skill-level">Avanzato · 3 anni</div>
        </div>
      </div>
      <div class="col-4">
        <div class="skill-card">
          <div class="skill-name">UI/UX Design</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" style="width:78%"></div></div>
          <div class="skill-level">Intermedio · 3 anni</div>
        </div>
      </div>
      <div class="col-4">
        <div class="skill-card">
          <div class="skill-name">Node.js</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" style="width:72%"></div></div>
          <div class="skill-level">Intermedio · 2 anni</div>
        </div>
      </div>
      <div class="col-4">
        <div class="skill-card">
          <div class="skill-name">Python</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" style="width:60%"></div></div>
          <div class="skill-level">Intermedio · 2 anni</div>
        </div>
      </div>
      <div class="col-4">
        <div class="skill-card">
          <div class="skill-name">Swift / iOS</div>
          <div class="skill-bar-bg"><div class="skill-bar-fill" style="width:40%"></div></div>
          <div class="skill-level">Base · 1 anno</div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- ── ESPERIENZE ── -->
  <section class="page-section" id="sec-experience">
    <div class="page-header mb-4">
      <h2>Esperienze</h2>
      <p>Il tuo percorso professionale</p>
    </div>
    <div class="d-flex flex-column gap-3">
      <div class="exp-card">
        <div class="d-flex justify-content-between align-items-start">
          <div class="exp-role">Senior Frontend Developer</div>
          <span class="tag-pill">2022 – Presente</span>
        </div>
        <div class="exp-company">Azienda Tech Srl · Milano</div>
        <p class="exp-desc">Sviluppo interfacce React per prodotti B2B. Lead del design system interno.</p>
      </div>
      <div class="exp-card muted">
        <div class="d-flex justify-content-between align-items-start">
          <div class="exp-role">UI Developer</div>
          <span class="tag-pill">2020 – 2022</span>
        </div>
        <div class="exp-company">Studio Digitale · Roma</div>
        <p class="exp-desc">Progettazione e sviluppo siti web per clienti retail e fashion.</p>
      </div>
      <div class="exp-card dim">
        <div class="d-flex justify-content-between align-items-start">
          <div class="exp-role">Laurea in Informatica</div>
          <span class="tag-pill">2016 – 2020</span>
        </div>
        <div class="exp-company">Università degli Studi · Milano</div>
      </div>
    </div>
  </section>
 
  <!-- ── MESSAGGI ── -->
  <section class="page-section" id="sec-messages">
    <div class="page-header mb-4">
      <h2>Messaggi</h2>
      <p>3 messaggi non letti</p>
    </div>
    <div class="content-card">
      <div class="list-row" style="background:#faf9f7">
        <div class="status-dot dot-unread"></div>
        <div class="flex-grow-1">
          <div class="row-title">Marco Rossi</div>
          <div class="row-sub">Ciao! Ho visto il tuo portfolio e sono interessato a collaborare...</div>
        </div>
        <div class="row-date">2h fa</div>
      </div>
      <div class="list-row" style="background:#faf9f7">
        <div class="status-dot dot-unread"></div>
        <div class="flex-grow-1">
          <div class="row-title">Laura Bianchi</div>
          <div class="row-sub">Ottimo lavoro sul design system! Volevo chiederti...</div>
        </div>
        <div class="row-date">Ieri</div>
      </div>
      <div class="list-row" style="background:#faf9f7">
        <div class="status-dot dot-unread"></div>
        <div class="flex-grow-1">
          <div class="row-title">Startup XYZ</div>
          <div class="row-sub">Siamo alla ricerca di un freelancer per un progetto...</div>
        </div>
        <div class="row-date">2 giorni fa</div>
      </div>
      <div class="list-row">
        <div class="status-dot dot-draft"></div>
        <div class="flex-grow-1">
          <div class="row-title">Giovanni Ferrari</div>
          <div class="row-sub">Grazie mille per il tuo aiuto con il progetto!</div>
        </div>
        <div class="row-date">5 giorni fa</div>
      </div>
    </div>
  </section>
 
  <!-- ── IMPOSTAZIONI ── -->
  <section class="page-section" id="sec-settings">
    <div class="page-header mb-4">
      <h2>Impostazioni</h2>
      <p>Personalizza il tuo portfolio</p>
    </div>
    <div class="content-card">
      <div class="settings-row">
        <div>
          <div class="settings-label">Nome visualizzato</div>
          <div class="settings-desc">Appare in homepage e nell'header</div>
        </div>
        <input class="settings-input" type="text" value="Il tuo nome">
      </div>
      <div class="settings-row">
        <div>
          <div class="settings-label">Email di contatto</div>
          <div class="settings-desc">Ricevi i messaggi del form</div>
        </div>
        <input class="settings-input" type="email" placeholder="tua@email.com">
      </div>
      <div class="settings-row">
        <div>
          <div class="settings-label">Portfolio pubblico</div>
          <div class="settings-desc">Visibile a tutti i visitatori</div>
        </div>
        <div class="form-check form-switch mb-0">
          <input class="form-check-input" type="checkbox" checked style="cursor:pointer;width:2.2em;height:1.2em">
        </div>
      </div>
      <div class="settings-row">
        <div>
          <div class="settings-label">URL personalizzato</div>
          <div class="settings-desc">Il link del tuo portfolio</div>
        </div>
        <input class="settings-input" type="text" value="portfolio.dev/tuo-nome">
      </div>
    </div>
    <div class="mt-3 text-end">
      <button class="btn-primary-custom">Salva modifiche</button>
    </div>
  </section>
 
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function showPage(name, clickedLink) {
    document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
    document.getElementById('sec-' + name).classList.add('active');
    if (clickedLink) clickedLink.classList.add('active');
    return false;
  }
 
  document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
    link.addEventListener('click', e => e.preventDefault());
  });

@endsection