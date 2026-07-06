@extends('layouts.user')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')
    {{-- PROFILE HERO CARD --}}
    <div class="card profile-hero-card" style="margin-bottom:22px;padding:0;">
        <div class="profile-cover"></div>
        <div class="profile-card-body" style="position:relative;">
            @php
                $user = $userData['user'] ?? auth()->user();
                $membership = $userData['membership_level'] ?? ($user->membershipLevel ?? null);
                $totalFunds = $userData['total_funds'] ?? 0;
                $todayCommission = $userData['today_commission'] ?? 0;
                $todayOrderValue = $userData['today_order_value'] ?? 0;
                $tasksDone = $userData['tasks_done'] ?? ($user->orders()->where('status', 'active')->count() ?? 0);
                // use DB `name` as primary display field
                $displayName = $user->name ?? ($user->username ?? '');
            @endphp

            <div class="profile-avatar-wrap">
                <div class="profile-avatar">{{ strtoupper(substr($displayName ?? 'A', 0, 1)) }}</div>
            </div>

            <div class="profile-hero-content">
                <div>
                    <h2 style="font-size:20px;font-weight:800;color:var(--text);margin:0 0 4px;">{{ $displayName ?? 'User' }}
                    </h2>
                    <div style="font-size:13px;color:var(--warning);">
                        {{ $membership->level_name ?? ($user->membership ?? 'Member') }}</div>
                    <div style="font-size:12px;color:var(--text-muted);margin-top:3px;">Member since
                        {{ optional($user->created_at)->format('F Y') ?? '' }}</div>
                </div>
                <div class="hero-actions">
                    <a href="{{ route('user.change-password') }}" class="btn btn-outline btn-sm">🔑 Change Password</a>
                </div>
            </div>

            <div class="profile-stat-row profile-stats">
                <div class="profile-stat">
                    <div class="profile-stat-value" style="color:var(--success);">${{ number_format($totalFunds, 2) }}</div>
                    <div class="profile-stat-label">Total Earned</div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value" style="color:var(--success);">${{ number_format($todayCommission, 2) }}
                    </div>
                    <div class="profile-stat-label">Today's Commission</div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value">{{ $tasksDone }}</div>
                    <div class="profile-stat-label">Tasks Done</div>
                </div>
                <div class="profile-stat">
                    <div class="profile-stat-value" style="color:var(--warning);">{{ $membership->level_name ?? '—' }}</div>
                    <div class="profile-stat-label">Membership</div>
                </div>
            </div>
        </div>
    </div>


    {{-- TWO COLUMN --}}
    <div class="two-column-grid">

        {{-- EDIT PROFILE FORM --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">✏️</span> Edit Profile</div>
            </div>
            <div class="card-body">
                @if (session('profile_success'))
                    <div class="alert alert-success" style="margin-bottom:20px;">✅ {{ session('profile_success') }}</div>
                @endif
                <form id="profileForm" action="{{ route('user.profile.update') }}" method="POST"
                    enctype="multipart/form-data" data-loading>
                    @csrf
                    @method('PATCH')

                    {{-- Profile Photo --}}
                    <div
                        style="display:flex;align-items:center;gap:20px;margin-bottom:24px;padding-bottom:24px;border-bottom:1px solid var(--border);">
                        <div style="width:68px;height:68px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--accent));display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:800;color:#fff;border:3px solid var(--primary-light);flex-shrink:0;"
                            id="avatarPreview">
                            {{ strtoupper(substr($displayName ?? ($user->name ?? 'A'), 0, 1)) }}
                        </div>
                        <div>
                            <div style="font-size:13.5px;font-weight:600;color:var(--text);margin-bottom:6px;">Profile Photo
                            </div>
                            <label style="cursor:pointer;" class="btn btn-outline btn-sm">
                                📷 Change Photo
                                <input type="file" name="avatar" accept="image/*" style="display:none;"
                                    onchange="previewAvatar(this)">
                            </label>
                            <div style="font-size:11px;color:var(--text-muted);margin-top:5px;">JPG, PNG up to 2MB</div>
                        </div>
                    </div>

                    {{-- Name Fields --}}
                    <div class="form-group" style="margin-bottom:16px;">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-input"
                            value="{{ old('name', $user->name ?? '') }}" placeholder="Full name">
                        @error('name')
                            <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address <span
                                style="font-size:11px;color:var(--text-muted);">(cannot be changed)</span></label>
                        <input type="email" class="form-input" value="{{ $user->email ?? '' }}" readonly
                            style="opacity:0.6;cursor:not-allowed;">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="phone" class="form-input"
                            value="{{ old('phone', $user->phone ?? '') }}" placeholder="+1 (XXX) XXX-XXXX">
                        @error('phone')
                            <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- removed Country and City inputs as requested --}}

                    {{-- removed Bio field as requested --}}

                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">💾 Save
                        Changes</button>
                </form>
            </div>
        </div>

        {{-- ACCOUNT INFO --}}
        <div style="display:flex;flex-direction:column;gap:18px;">

            <div class="card">
                <div class="card-header">
                    <div class="card-title"><span class="icon">📊</span> Account Info</div>
                </div>
                <div class="card-body">
                    <div style="display:flex;flex-direction:column;gap:0;">
                        <div
                            style="display:flex;justify-content:space-between;padding:11px 0;border-bottom:1px solid var(--border);font-size:13px;">
                            <span style="color:var(--text-muted);">Member Since</span>
                            <span
                                style="font-weight:600;">{{ optional($user->created_at)->format('M d, Y') ?? '-' }}</span>
                        </div>
                        <div
                            style="display:flex;justify-content:space-between;padding:11px 0;border-bottom:1px solid var(--border);font-size:13px;">
                            <span style="color:var(--text-muted);">Membership</span>
                            <span
                                style="font-weight:600;color:var(--warning);">{{ $membership->level_name ?? ($membership->name ?? 'Member') }}</span>
                        </div>
                        <div
                            style="display:flex;justify-content:space-between;padding:11px 0;border-bottom:1px solid var(--border);font-size:13px;">
                            <span style="color:var(--text-muted);">Total Referrals</span>
                            <span
                                style="font-weight:600;">{{ $user->referrals_count ?? (optional($user->referrals)->count() ?? 0) }}</span>
                        </div>
                        <div style="display:flex;justify-content:space-between;padding:11px 0;font-size:13px;">
                            <span style="color:var(--text-muted);">Credibility</span>
                            <div class="credibility-wrap">
                                <div class="credibility-track" data-cred="{{ $user->credibility ?? 0 }}">
                                    <div class="credibility-fill"></div>
                                </div>
                                <div class="credibility-value">{{ $user->credibility ?? 0 }}%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title"><span class="icon">🔗</span> Referral Details</div>
                </div>
                <div class="card-body">
                    <div style="margin-bottom:14px;">
                        <div
                            style="font-size:11px;text-transform:uppercase;letter-spacing:0.06em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">
                            Referral Code</div>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <code
                                style="background:var(--dark2);border:1px solid var(--border);border-radius:6px;padding:6px 12px;font-size:13px;color:var(--accent);flex:1;font-family:'Space Mono',monospace;">{{ $user->reference_code ?? '-' }}</code>
                            <button class="btn-copy" data-copy="{{ $user->reference_code ?? '' }}">Copy</button>
                        </div>
                    </div>
                    <div>
                        <div
                            style="font-size:11px;text-transform:uppercase;letter-spacing:0.06em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">
                            Referral Link</div>
                        <div class="ref-link-box">
                            <span class="ref-link-url">{{ url('/ref/' . ($user->reference_code ?? '')) }}</span>
                            <button class="btn-copy"
                                data-copy="{{ url('/ref/' . ($user->reference_code ?? '')) }}">📋</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/profile.js') }}" defer></script>
    @endpush

@endsection
