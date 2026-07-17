@extends('layouts.user')

@section('title', 'Recharge')
@section('page-title', 'Recharge')

@section('content')

    <div class="recharge-container">

        {{-- LEFT: RECHARGE FORM --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">📥</span> Recharge Account</div>
            </div>
            <div class="card-body">
                {{-- CURRENT BALANCE DISPLAY --}}
                <div class="balance-display">
                    <span class="balance-label">Current Account Balance</span>
                    <div class="balance-amount">${{ number_format($totalBalance, 2) }}</div>
                </div>

                <form action="{{ route('user.recharge.store') }}" method="POST" enctype="multipart/form-data" data-loading>
                    @csrf
                    <input type="hidden" id="selectedMethod" name="payment_method" value="">

                    {{-- STEP 1: Payment Method --}}
                    <span class="section-label-inline">Step 1 — Select Payment Method</span>
                    <div class="payment-methods">
                        <div class="pay-method" data-method="ach">
                            <div class="pay-method-icon">🏦</div>
                            <div class="pay-method-name">ACH (Bank Transfer)</div>
                            <div class="pay-method-tag">1–3 business days</div>
                        </div>
                        <div class="pay-method" data-method="zelle">
                            <div class="pay-method-icon">⚡</div>
                            <div class="pay-method-name">Zelle</div>
                            <div class="pay-method-tag">Instant</div>
                        </div>
                        <div class="pay-method" data-method="venmo">
                            <div class="pay-method-icon">💸</div>
                            <div class="pay-method-name">Venmo</div>
                            <div class="pay-method-tag">Instant</div>
                        </div>
                        <div class="pay-method" data-method="paypal">
                            <div class="pay-method-icon">🅿️</div>
                            <div class="pay-method-name">PayPal</div>
                            <div class="pay-method-tag">Instant</div>
                        </div>
                        <div class="pay-method" data-method="card">
                            <div class="pay-method-icon">💳</div>
                            <div class="pay-method-name">Credit / Debit Card</div>
                            <div class="pay-method-tag">Instant</div>
                        </div>
                    </div>

                    @error('payment_method')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    {{-- STEP 2: Amount --}}
                    <span class="section-label-inline" style="margin-top:8px;">Step 2 — Enter Amount</span>
                    <div class="amount-presets">
                        <button type="button" class="amount-preset" data-amount="10">$10</button>
                        <button type="button" class="amount-preset" data-amount="25">$25</button>
                        <button type="button" class="amount-preset" data-amount="50">$50</button>
                        <button type="button" class="amount-preset" data-amount="100">$100</button>
                        <button type="button" class="amount-preset" data-amount="250">$250</button>
                        <button type="button" class="amount-preset" data-amount="500">$500</button>
                    </div>
                    <div class="form-group">
                        <div style="position:relative;display:flex;align-items:center;">
                            <span
                                style="position:absolute;left:14px;font-size:15px;color:var(--text-muted);font-family:'Space Mono',monospace;font-weight:700;">$</span>
                            <input type="number" id="amountInput" name="amount" class="form-input amount-input"
                                placeholder="0.00" min="10" step="0.01" style="padding-left:30px;"
                                value="{{ old('amount') }}">
                        </div>
                        <div style="font-size:11px;color:var(--text-muted);margin-top:5px;">Minimum: $10</div>
                        @error('amount')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- STEP 3: Optional Contact (US format) --}}
                    <span class="section-label-inline">Step 3 — Contact (optional)</span>
                    <div class="form-group">
                        <input type="text" id="phoneNumber" name="phone_number" class="form-input"
                            placeholder="e.g. +1 (800) 555-0174" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- STEP 4: Payment Proof --}}
                    <span class="section-label-inline">Step 4 — Upload Payment Proof</span>
                    <div class="upload-zone" id="uploadZone">
                        <input type="file" name="payment_proof" accept="image/*,.pdf" id="fileInput">
                        <div class="upload-zone-icon">📸</div>
                        <div class="upload-zone-text"><strong>Click or drag</strong> your payment screenshot here</div>
                        <div class="upload-zone-text" style="font-size:11px;margin-top:4px;">JPG, PNG, PDF up to 5MB</div>
                        <div class="upload-preview"></div>
                    </div>
                    @error('payment_proof')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label class="form-label">Transaction ID / Reference Number</label>
                        <input type="text" name="transaction_id" class="form-input"
                            placeholder="e.g. TXN-20250508-XXXXX" value="{{ old('transaction_id') }}">
                        @error('transaction_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Recharge Request →</button>
                </form>
            </div>
        </div>

        {{-- RIGHT: INSTRUCTIONS --}}
        <div class="card instructions-card">
            <div class="card-header">
                <div class="card-title"><span class="icon">📋</span> Recharge Instructions</div>
            </div>
            <div class="card-body">
                <div class="info-card">
                    <strong>⏱️ Processing Times:</strong><br>
                    Zelle / Venmo / PayPal / Card — <strong>Instant</strong><br>
                    ACH (Bank Transfer) — <strong>1–3 business days</strong>
                </div>

                <span class="section-label-inline">How to Recharge</span>
                <ol style="padding-left:18px;margin:0;display:flex;flex-direction:column;gap:10px;">
                    <li style="font-size:13px;color:var(--text-muted);line-height:1.6;">Select your preferred payment
                        method above</li>
                    <li style="font-size:13px;color:var(--text-muted);line-height:1.6;">Send the desired amount to the
                        account details shown in the instructions panel for your method</li>
                    <li style="font-size:13px;color:var(--text-muted);line-height:1.6;">Take a screenshot of the confirmed
                        payment</li>
                    <li style="font-size:13px;color:var(--text-muted);line-height:1.6;">Enter the transaction ID and upload
                        your screenshot</li>
                    <li style="font-size:13px;color:var(--text-muted);line-height:1.6;">Verify your phone number</li>
                    <li style="font-size:13px;color:var(--text-muted);line-height:1.6;">Click <strong
                            style="color:var(--primary-light);">Submit Recharge Request</strong></li>
                </ol>

                <div style="border-top:1px solid var(--border);margin:20px 0;"></div>

                <div class="min-max-grid">
                    <div class="min-max-item">
                        <span class="min-max-label">Min Recharge</span>
                        <div class="min-max-value" style="color:var(--success);">$10</div>
                    </div>
                    <div class="min-max-item">
                        <span class="min-max-label">Max Recharge</span>
                        <div class="min-max-value" style="color:var(--accent);">$5,000</div>
                    </div>
                </div>

                <div class="info-card">
                    💬 Need help? Contact support:<br>
                    <strong style="color:var(--accent);">support@realtymogul.live</strong><br>
                    Phone: <strong style="color:var(--success);">+1 (800) 555-0174</strong>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Upload zone drag and drop
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = document.getElementById('fileInput');

        if (uploadZone && fileInput) {
            uploadZone.addEventListener('click', () => fileInput.click());

            uploadZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadZone.style.borderColor = 'var(--primary-light)';
                uploadZone.style.background = 'rgba(0, 0, 0, 0.08)';
            });

            uploadZone.addEventListener('dragleave', () => {
                uploadZone.style.borderColor = 'var(--border)';
                uploadZone.style.background = 'rgba(0, 0, 0, 0.02)';
            });

            uploadZone.addEventListener('drop', (e) => {
                e.preventDefault();
                fileInput.files = e.dataTransfer.files;
                uploadZone.style.borderColor = 'var(--border)';
                uploadZone.style.background = 'rgba(0, 0, 0, 0.02)';
            });
        }

        // Handle payment method selection
        document.querySelectorAll('.pay-method').forEach(method => {
            method.addEventListener('click', function() {
                document.querySelectorAll('.pay-method').forEach(m => m.style.opacity = '0.6');
                this.style.opacity = '1';
                document.getElementById('selectedMethod').value = this.dataset.method;
            });
        });

        // Handle amount presets
        document.querySelectorAll('.amount-preset').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('amountInput').value = this.dataset.amount;
            });
        });

        // Validate form before submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const method = document.getElementById('selectedMethod').value;
            const amount = document.getElementById('amountInput').value;

            if (!method) {
                e.preventDefault();
                alert('Please select a payment method');
                return false;
            }
            if (!amount) {
                e.preventDefault();
                alert('Please enter an amount');
                return false;
            }
        });
    </script>

@endsection
