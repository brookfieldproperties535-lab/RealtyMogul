{{-- Empty state partial for task panes --}}
<div style="
    grid-column: 1 / -1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 24px;
    text-align: center;
    background: var(--card);
    border: 1px dashed var(--border);
    border-radius: var(--radius);
">
    <div style="font-size:44px;margin-bottom:14px;opacity:0.35;">📋</div>
    <p style="font-size:14px;color:var(--text-muted);margin:0;">{{ $msg ?? 'No tasks found' }}</p>
</div>
