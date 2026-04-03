<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
    @yield('contenuto')
    @yield("miao")
    @yield('content')
</body>
</html>