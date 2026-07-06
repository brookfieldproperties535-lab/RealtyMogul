@extends('layouts.user')

@section('title', 'Task History')
@section('page-title', 'Task History')

@section('content')

{{-- STAT CARDS --}}
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:22px;">
    <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;align-items:center;gap:14px;">
        <span style="font-size:26px;">✅</span>
        <div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;color:var(--text-muted);font-weight:600;margin-bottom:3px;">Completed</div>
            <div style="font-family:'Space Mono',monospace;font-size:26px;font-weight:700;color:var(--success);">142</div>
        </div>
    </div>
    <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;align-items:center;gap:14px;">
        <span style="font-size:26px;">⏳</span>
        <div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;color:var(--text-muted);font-weight:600;margin-bottom:3px;">Pending</div>
            <div style="font-family:'Space Mono',monospace;font-size:26px;font-weight:700;color:var(--warning);">8</div>
        </div>
    </div>
    <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;align-items:center;gap:14px;">
        <span style="font-size:26px;">🔒</span>
        <div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;color:var(--text-muted);font-weight:600;margin-bottom:3px;">On Hold</div>
            <div style="font-family:'Space Mono',monospace;font-size:26px;font-weight:700;color:var(--primary-light);">3</div>
        </div>
    </div>
    <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:18px;display:flex;align-items:center;gap:14px;">
        <span style="font-size:26px;">❌</span>
        <div>
            <div style="font-size:10px;text-transform:uppercase;letter-spacing:0.06em;color:var(--text-muted);font-weight:600;margin-bottom:3px;">Failed</div>
            <div style="font-family:'Space Mono',monospace;font-size:26px;font-weight:700;color:var(--danger);">2</div>
        </div>
    </div>
</div>

{{-- FILTER TABS + SEARCH --}}
<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px;margin-bottom:18px;">
    <div style="display:flex;gap:8px;flex-wrap:wrap;">
        <button class="history-tab active" data-status="all">All</button>
        <button class="history-tab" data-status="completed">✅ Completed</button>
        <button class="history-tab" data-status="pending">⏳ Pending</button>
        <button class="history-tab" data-status="on-hold">🔒 On Hold</button>
        <button class="history-tab" data-status="failed">❌ Failed</button>
    </div>
    <div style="display:flex;gap:10px;align-items:center;">
        <input type="date" style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);color:var(--text);padding:8px 12px;font-size:13px;outline:none;">
        <input type="text" placeholder="Search tasks..." style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);color:var(--text);padding:8px 14px;font-size:13px;font-family:'Sora',sans-serif;outline:none;">
    </div>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-header">
        <div class="card-title"><span class="icon">📊</span> Task Activity Log</div>
        <button class="btn btn-outline btn-sm">Export CSV</button>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task Name</th>
                        <th>Type</th>
                        <th>Task Amount</th>
                        <th>Commission Earned</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Completed</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">1</td>
                        <td>Rate Apple iPhone 16 Pro Max</td>
                        <td><span class="task-badge selected-badge">⭐ Selected</span></td>
                        <td style="font-family:'Space Mono',monospace;">$2,000.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$200.00</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 8, 2025 11:30</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 8, 2025 11:31</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">2</td>
                        <td>Review Lahore Food Street Restaurant</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$45.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$0.41</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 8, 2025 10:15</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 8, 2025 10:16</td>
                    </tr>
                    <tr data-status="pending">
                        <td style="color:var(--text-muted);font-size:12px;">3</td>
                        <td>Rate Rolex Datejust Watch Collection</td>
                        <td><span class="task-badge selected-badge">⭐ Selected</span></td>
                        <td style="font-family:'Space Mono',monospace;">$5,000.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--warning);font-weight:700;">$500.00</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 7, 2025 14:22</td>
                        <td style="font-size:12px;color:var(--text-muted);">—</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">4</td>
                        <td>Rate Nike Air Max 2025 Sneakers</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$120.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$1.08</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 7, 2025 09:00</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 7, 2025 09:01</td>
                    </tr>
                    <tr data-status="on-hold">
                        <td style="color:var(--text-muted);font-size:12px;">5</td>
                        <td>Review Pearl Continental Hotel Karachi</td>
                        <td><span class="task-badge selected-badge">⭐ Selected</span></td>
                        <td style="font-family:'Space Mono',monospace;">$1,500.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--primary-light);font-weight:700;">$150.00</td>
                        <td><span class="status-on-hold">🔒 On Hold</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 6, 2025 16:44</td>
                        <td style="font-size:12px;color:var(--text-muted);">—</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">6</td>
                        <td>Google Maps Rating — Karachi Marina</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$80.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$0.72</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 5, 2025 12:30</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 5, 2025 12:31</td>
                    </tr>
                    <tr data-status="failed">
                        <td style="color:var(--text-muted);font-size:12px;">7</td>
                        <td>Amazon Product Review — Duplicate</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$200.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--danger);font-weight:700;">$0.00</td>
                        <td><span class="status-badge" style="background:rgba(255,71,87,0.12);color:var(--danger);border:1px solid rgba(255,71,87,0.3);">Failed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 4, 2025 09:15</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 4, 2025 09:20</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">8</td>
                        <td>Rate Dyson V15 Vacuum Cleaner</td>
                        <td><span class="task-badge selected-badge">⭐ Selected</span></td>
                        <td style="font-family:'Space Mono',monospace;">$800.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$80.00</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 3, 2025 14:00</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 3, 2025 14:01</td>
                    </tr>
                    <tr data-status="pending">
                        <td style="color:var(--text-muted);font-size:12px;">9</td>
                        <td>TripAdvisor Review — Serena Hotel Islamabad</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$150.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--warning);font-weight:700;">$1.35</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 2, 2025 11:45</td>
                        <td style="font-size:12px;color:var(--text-muted);">—</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">10</td>
                        <td>Shopify Store Review — Khaadi Pakistan</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$300.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$2.70</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">May 1, 2025 08:00</td>
                        <td style="font-size:12px;color:var(--text-muted);">May 1, 2025 08:01</td>
                    </tr>
                    <tr data-status="on-hold">
                        <td style="color:var(--text-muted);font-size:12px;">11</td>
                        <td>Rate Emporium Mall Lahore — VIP Campaign</td>
                        <td><span class="task-badge selected-badge">⭐ Selected</span></td>
                        <td style="font-family:'Space Mono',monospace;">$3,000.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--primary-light);font-weight:700;">$300.00</td>
                        <td><span class="status-on-hold">🔒 On Hold</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 30, 2025 15:20</td>
                        <td style="font-size:12px;color:var(--text-muted);">—</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">12</td>
                        <td>YouTube Channel Rating — ARY News</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$100.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$0.90</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 29, 2025 10:10</td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 29, 2025 10:11</td>
                    </tr>
                    <tr data-status="failed">
                        <td style="color:var(--text-muted);font-size:12px;">13</td>
                        <td>App Store Review — Careem Pakistan</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$60.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--danger);font-weight:700;">$0.00</td>
                        <td><span class="status-badge" style="background:rgba(255,71,87,0.12);color:var(--danger);border:1px solid rgba(255,71,87,0.3);">Failed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 28, 2025 14:30</td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 28, 2025 14:35</td>
                    </tr>
                    <tr data-status="completed">
                        <td style="color:var(--text-muted);font-size:12px;">14</td>
                        <td>Rate Samsung Galaxy S25 Ultra</td>
                        <td><span class="task-badge selected-badge">⭐ Selected</span></td>
                        <td style="font-family:'Space Mono',monospace;">$2,000.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">$200.00</td>
                        <td><span class="status-badge status-completed">Completed</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 27, 2025 09:00</td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 27, 2025 09:01</td>
                    </tr>
                    <tr data-status="on-hold">
                        <td style="color:var(--text-muted);font-size:12px;">15</td>
                        <td>Review Dolmen Mall Clifton Karachi</td>
                        <td><span class="task-badge normal-badge">Normal</span></td>
                        <td style="font-family:'Space Mono',monospace;">$250.00</td>
                        <td style="font-family:'Space Mono',monospace;color:var(--primary-light);font-weight:700;">$2.25</td>
                        <td><span class="status-on-hold">🔒 On Hold</span></td>
                        <td style="font-size:12px;color:var(--text-muted);">Apr 26, 2025 17:00</td>
                        <td style="font-size:12px;color:var(--text-muted);">—</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-top:1px solid var(--border);">
            <span style="font-size:12.5px;color:var(--text-muted);">Showing 1–15 of 155 records</span>
            <div style="display:flex;gap:6px;">
                <button class="btn btn-outline btn-sm" disabled>← Prev</button>
                <button class="btn btn-primary btn-sm" style="padding:6px 12px;">1</button>
                <button class="btn btn-outline btn-sm">2</button>
                <button class="btn btn-outline btn-sm">3</button>
                <button class="btn btn-outline btn-sm">…</button>
                <button class="btn btn-outline btn-sm">Next →</button>
            </div>
        </div>
    </div>
</div>

@endsection
