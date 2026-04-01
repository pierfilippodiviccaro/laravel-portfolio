@extends('layouts.admin')
@section('contenuto')
<style>
    :root {
      --sidebar-width: 220px;
      --brand-font: Georgia, 'Times New Roman', serif;
    }
 
    body {
      background: #f5f4f0;
      font-family: system-ui, -apple-system, sans-serif;
    }
 
    /* ── Sidebar ── */
    #sidebar {
      width: var(--sidebar-width);
      min-height: 100vh;
      background: #faf9f7;
      border-right: 1px solid #e8e6e0;
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 100;
    }
 
    .sidebar-brand {
      padding: 1.25rem 1.25rem 1rem;
      border-bottom: 1px solid #e8e6e0;
    }
 
    .sidebar-brand h1 {
      font-family: var(--brand-font);
      font-size: 1.3rem;
      font-weight: 400;
      color: #1a1a1a;
      margin: 0;
    }
 
    .sidebar-brand small {
      font-size: 0.65rem;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      color: #aaa;
    }
 
    .nav-section-label {
      font-size: 0.65rem;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      color: #aaa;
      padding: 0.9rem 1rem 0.25rem;
    }
 
    .sidebar-nav .nav-link {
      display: flex;
      align-items: center;
      gap: 9px;
      padding: 7px 12px;
      border-radius: 8px;
      font-size: 0.82rem;
      color: #666;
      transition: background 0.15s, color 0.15s;
      margin: 1px 6px;
    }
 
    .sidebar-nav .nav-link:hover {
      background: #f0ede8;
      color: #1a1a1a;
    }
 
    .sidebar-nav .nav-link.active {
      background: #fff;
      color: #1a1a1a;
      font-weight: 500;
      box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    }
 
    .sidebar-nav .nav-link i {
      font-size: 0.95rem;
      opacity: 0.7;
      width: 16px;
      text-align: center;
    }
 
    .sidebar-nav .nav-link.active i {
      opacity: 1;
    }
 
    .sidebar-user {
      margin-top: auto;
      padding: 0.75rem 1rem;
      border-top: 1px solid #e8e6e0;
      display: flex;
      align-items: center;
      gap: 9px;
    }
 
    .sidebar-avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: #eee;
      border: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: 600;
      color: #555;
      flex-shrink: 0;
    }
 
    /* ── Main ── */
    #main-content {
      margin-left: var(--sidebar-width);
      padding: 2rem 2.25rem;
      min-height: 100vh;
    }
 
    .page-header h2 {
      font-family: var(--brand-font);
      font-size: 1.65rem;
      font-weight: 400;
      color: #1a1a1a;
      margin-bottom: 2px;
    }
 
    .page-header p {
      font-size: 0.78rem;
      color: #aaa;
      margin: 0;
    }
 
    /* ── Stat cards ── */
    .stat-card {
      background: #fff;
      border: 1px solid #e8e6e0;
      border-radius: 10px;
      padding: 1rem 1.25rem;
    }
 
    .stat-card .stat-label {
      font-size: 0.65rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #aaa;
      margin-bottom: 4px;
    }
 
    .stat-card .stat-value {
      font-family: var(--brand-font);
      font-size: 1.6rem;
      font-weight: 400;
      color: #1a1a1a;
      line-height: 1;
    }
 
    .stat-card .stat-change {
      font-size: 0.72rem;
      margin-top: 4px;
    }
 
    /* ── Cards / tables ── */
    .content-card {
      background: #fff;
      border: 1px solid #e8e6e0;
      border-radius: 12px;
      overflow: hidden;
    }
 
    .content-card .card-header-custom {
      padding: 0.85rem 1.25rem;
      border-bottom: 1px solid #e8e6e0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
 
    .content-card .card-header-custom span {
      font-size: 0.82rem;
      font-weight: 500;
      color: #1a1a1a;
    }
 
    .list-row {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 1.25rem;
      border-bottom: 1px solid #f0ede8;
      transition: background 0.1s;
    }
 
    .list-row:last-child { border-bottom: none; }
    .list-row:hover { background: #faf9f7; }
 
    .status-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      flex-shrink: 0;
    }
 
    .dot-pub    { background: #3a9e6e; }
    .dot-wip    { background: #e8a020; }
    .dot-draft  { background: #bbb; }
    .dot-unread { background: #d94040; }
 
    .row-title { font-size: 0.82rem; font-weight: 500; color: #1a1a1a; }
    .row-sub   { font-size: 0.72rem; color: #aaa; margin-top: 1px; }
    .row-date  { font-size: 0.72rem; color: #aaa; white-space: nowrap; }
 
    .tag-pill {
      font-size: 0.67rem;
      padding: 2px 8px;
      border-radius: 99px;
      border: 1px solid #e0ddd8;
      color: #777;
    }
 
    /* ── Skill bar ── */
    .skill-card {
      background: #fff;
      border: 1px solid #e8e6e0;
      border-radius: 12px;
      padding: 1rem 1.1rem;
    }
 
    .skill-name { font-size: 0.82rem; font-weight: 500; color: #1a1a1a; margin-bottom: 9px; }
 
    .skill-bar-bg {
      height: 3px;
      background: #f0ede8;
      border-radius: 99px;
      margin-bottom: 5px;
    }
 
    .skill-bar-fill {
      height: 100%;
      background: #1a1a1a;
      border-radius: 99px;
    }
 
    .skill-level { font-size: 0.68rem; color: #aaa; }
 
    /* ── Experience ── */
    .exp-card {
      border-left: 2px solid #1a1a1a;
      border-radius: 0 12px 12px 0;
      background: #fff;
      border-top: 1px solid #e8e6e0;
      border-right: 1px solid #e8e6e0;
      border-bottom: 1px solid #e8e6e0;
      padding: 1rem 1.25rem;
    }
 
    .exp-card.muted { border-left-color: #ccc; }
    .exp-card.dim   { border-left-color: #e0ddd8; }
    .exp-role { font-size: 0.85rem; font-weight: 500; color: #1a1a1a; }
    .exp-company { font-size: 0.78rem; color: #888; margin: 3px 0 8px; }
    .exp-desc { font-size: 0.75rem; color: #aaa; line-height: 1.6; margin: 0; }
 
    /* ── Mini bar chart ── */
    .bar-chart {
      height: 120px;
      display: flex;
      align-items: flex-end;
      gap: 6px;
    }
 
    .bar-col { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; height: 100%; }
    .bar-area { flex: 1; width: 100%; display: flex; flex-direction: column; justify-content: flex-end; }
    .bar-fill { width: 100%; border-radius: 3px 3px 0 0; background: #e0ddd8; }
    .bar-fill.active-bar { background: #1a1a1a; }
    .bar-label { font-size: 0.65rem; color: #aaa; }
 
    /* ── Activity ── */
    .activity-item {
      display: flex;
      gap: 10px;
      padding: 7px 0;
      border-bottom: 1px solid #f0ede8;
      font-size: 0.78rem;
    }
    .activity-item:last-child { border-bottom: none; }
    .act-dot { width: 5px; height: 5px; border-radius: 50%; background: #ccc; margin-top: 5px; flex-shrink: 0; }
    .act-time { font-size: 0.68rem; color: #aaa; }
 
    /* ── Settings ── */
    .settings-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 1.25rem;
      border-bottom: 1px solid #f0ede8;
    }
    .settings-row:last-child { border-bottom: none; }
    .settings-label { font-size: 0.82rem; font-weight: 500; color: #1a1a1a; }
    .settings-desc  { font-size: 0.72rem; color: #aaa; margin: 2px 0 0; }
    .settings-input {
      font-size: 0.78rem;
      padding: 5px 10px;
      width: 200px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: #faf9f7;
      color: #1a1a1a;
      outline: none;
    }
    .settings-input:focus { border-color: #aaa; }
 
    /* ── Buttons ── */
    .btn-outline-custom {
      font-size: 0.75rem;
      padding: 4px 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background: transparent;
      color: #666;
      cursor: pointer;
      transition: background 0.15s;
    }
    .btn-outline-custom:hover { background: #f0ede8; }
 
    .btn-primary-custom {
      font-size: 0.75rem;
      padding: 5px 13px;
      border: 1px solid #1a1a1a;
      border-radius: 8px;
      background: #1a1a1a;
      color: #fff;
      cursor: pointer;
    }
    .btn-primary-custom:hover { opacity: 0.85; }
 
    /* ── Sections visibility ── */
    .page-section { display: none; }
    .page-section.active { display: block; }
  </style>
</head>
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
    <a href="#" class="nav-link" onclick="showPage('projects', this)">
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