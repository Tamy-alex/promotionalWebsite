{{-- =====================================================================
     CONSULTATION BOOKING MODAL
     Save as: resources/views/partials/consultation-modal.blade.php
     Include in your view with: @include('partials.consultation-modal')
     ===================================================================== --}}

<div id="consultationOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.6); z-index:10000; justify-content:center; align-items:center;">

    <div id="consultationModal" style="
        background:#fff; border-radius:16px; padding:40px 36px 32px;
        max-width:540px; width:92%; position:relative;
        box-shadow:0 24px 64px rgba(0,0,0,0.3);
        max-height:92vh; overflow-y:auto;
    ">

        {{-- Close --}}
        <button onclick="closeConsultationModal()" style="position:absolute;top:16px;right:20px;background:none;border:none;font-size:1.6rem;cursor:pointer;color:#aaa;line-height:1;">&times;</button>

        {{-- Progress bar --}}
        <div style="display:flex; gap:6px; margin-bottom:28px;">
            <div id="prog1" style="height:4px; flex:1; border-radius:4px; background:#e44d26;"></div>
            <div id="prog2" style="height:4px; flex:1; border-radius:4px; background:#eee; transition:background 0.3s;"></div>
            <div id="prog3" style="height:4px; flex:1; border-radius:4px; background:#eee; transition:background 0.3s;"></div>
            <div id="prog4" style="height:4px; flex:1; border-radius:4px; background:#eee; transition:background 0.3s;"></div>
        </div>

        {{-- ── STEP 1: Client info + service ─────────────────────────── --}}
        <div id="step1">
            <h2 style="margin:0 0 6px;font-size:1.45rem;">Book a Free Consultation</h2>
            <p style="color:#666;margin:0 0 24px;font-size:0.93rem;">Tell us what you need — we'll meet at your chosen time.</p>

            <div style="margin-bottom:15px;">
                <label class="modal-label">Your Name *</label>
                <input id="clientName" type="text" placeholder="e.g. Marko Petrović" class="modal-input">
            </div>
            <div style="margin-bottom:15px;">
                <label class="modal-label">Email Address *</label>
                <input id="clientEmail" type="email" placeholder="you@example.com" class="modal-input">
            </div>
            <div style="margin-bottom:15px;">
                <label class="modal-label">Service Needed *</label>
                <select id="serviceType" class="modal-input">
                    <option value="">— Select a service —</option>
                    <option value="Landing Page / Website">Landing Page / Website</option>
                    <option value="E-Commerce Store">E-Commerce Store</option>
                    <option value="Web Application">Web Application</option>
                    <option value="Backend / API Development">Backend / API Development</option>
                </select>
            </div>
            <div style="margin-bottom:24px;">
                <label class="modal-label">Tell us more (optional)</label>
                <textarea id="clientMessage" placeholder="Briefly describe your project..." rows="3" class="modal-input" style="resize:vertical;"></textarea>
            </div>

            <div id="step1Error" class="modal-error" style="display:none;"></div>
            <button onclick="goToStep2()" class="btn btn-primary" style="width:100%;justify-content:center;">Continue →</button>
        </div>

        {{-- ── STEP 2: Choose consultant ──────────────────────────────── --}}
        <div id="step2" style="display:none;">
            <button onclick="goToStep(1)" class="modal-back">← Back</button>
            <h2 style="margin:0 0 6px;font-size:1.45rem;">Who would you like to speak with?</h2>
            <p style="color:#666;margin:0 0 20px;font-size:0.93rem;">You can book with one of us, or with both — we often collaborate on projects together.</p>

            <div style="display:flex;flex-wrap:wrap;gap:12px;margin-bottom:16px;">

                {{-- Alex --}}
                <div id="cardAlex" onclick="selectConsultant('alex')" class="consultant-card" style="flex:1;min-width:140px;">
                    <div class="avatar" style="background:linear-gradient(135deg,#e44d26,#f7931e);">AC</div>
                    <h3 class="card-name">Aleksandra (Alex)</h3>
                    <p class="card-role">Backend Dev · PHP & Laravel · Security</p>
                    <span class="slot-badge" style="background:#fff3ee;color:#e44d26;">🕘 9:00 – 12:30</span>
                </div>

                {{-- Tamy --}}
                <div id="cardTamy" onclick="selectConsultant('tamy')" class="consultant-card" style="flex:1;min-width:140px;">
                    <div class="avatar" style="background:linear-gradient(135deg,#8e44ad,#3498db);">TC</div>
                    <h3 class="card-name">Tamara</h3>
                    <p class="card-role">Backend Laravel · Web Solutions · HTML & CSS</p>
                    <span class="slot-badge" style="background:#f3eeff;color:#8e44ad;">🕑 14:00 – 17:00</span>
                </div>

                {{-- Both --}}
                <div id="cardBoth" onclick="selectConsultant('both')" class="consultant-card" style="flex:1;min-width:140px;">
                    <div style="display:flex;justify-content:center;gap:-8px;margin-bottom:10px;">
                        <div class="avatar avatar-sm" style="background:linear-gradient(135deg,#e44d26,#f7931e);z-index:2;">AC</div>
                        <div class="avatar avatar-sm" style="background:linear-gradient(135deg,#8e44ad,#3498db);margin-left:-10px;">TC</div>
                    </div>
                    <h3 class="card-name">Both of Us</h3>
                    <p class="card-role">Full-stack collaboration on your project</p>
                    <span class="slot-badge" style="background:#efffef;color:#27ae60;">🤝 Combined availability</span>
                </div>

            </div>

            <div id="step2Error" class="modal-error" style="display:none;"></div>
        </div>

        {{-- ── STEP 3: Date + time slot ───────────────────────────────── --}}
        <div id="step3" style="display:none;">
            <button onclick="goToStep(2)" class="modal-back">← Back</button>
            <h2 style="margin:0 0 6px;font-size:1.45rem;">Pick a date & time</h2>
            <p id="step3Subtitle" style="color:#666;margin:0 0 24px;font-size:0.93rem;"></p>

            <div style="margin-bottom:15px;">
                <label class="modal-label">Preferred Date *</label>
                <input id="consultDate" type="date" class="modal-input" onchange="loadSlots()">
            </div>

            <div style="margin-bottom:24px;">
                <label class="modal-label">Preferred Time Slot *</label>
                <select id="timeSlot" class="modal-input">
                    <option value="">— Pick a date first —</option>
                </select>
                <div id="slotsLoading" style="display:none;color:#888;font-size:0.83rem;margin-top:6px;">
                    <i class="fa-solid fa-spinner fa-spin"></i> Checking availability...
                </div>
            </div>

            <div id="step3Error" class="modal-error" style="display:none;"></div>
            <button onclick="goToStep4()" class="btn btn-primary" style="width:100%;justify-content:center;">Choose Platform →</button>
        </div>

        {{-- ── STEP 4: Platform + confirm ─────────────────────────────── --}}
        <div id="step4" style="display:none;">
            <button onclick="goToStep(3)" class="modal-back">← Back</button>
            <h2 style="margin:0 0 6px;font-size:1.45rem;">How would you like to meet?</h2>
            <p id="step4Summary" style="color:#666;font-size:0.88rem;margin:0 0 20px;"></p>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;">
                <button onclick="confirmBooking('whatsapp')" class="platform-btn" style="background:#25D366;">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                </button>
                <button onclick="confirmBooking('viber')" class="platform-btn" style="background:#7360F2;">
                    <i class="fa-brands fa-viber"></i> Viber
                </button>
                <button onclick="confirmBooking('zoom')" class="platform-btn" style="background:#2D8CFF;">
                    <i class="fa-solid fa-video"></i> Zoom
                </button>
                <button onclick="confirmBooking('meet')" class="platform-btn" style="background:#EA4335;">
                    <i class="fa-brands fa-google"></i> Google Meet
                </button>
            </div>

            <div id="step4Loading" style="display:none;text-align:center;color:#888;font-size:0.9rem;">
                <i class="fa-solid fa-spinner fa-spin"></i> Saving your booking...
            </div>
            <div id="step4Error" class="modal-error" style="display:none;"></div>
        </div>

        {{-- ── STEP 5: Success ────────────────────────────────────────── --}}
        <div id="step5" style="display:none;text-align:center;">
            <div style="font-size:3rem;margin-bottom:16px;">🎉</div>
            <h2 style="margin:0 0 8px;">You're booked!</h2>
            <p id="step5Summary" style="color:#666;font-size:0.93rem;margin:0 0 24px;"></p>
            <a id="step5Link" href="#" target="_blank" class="btn btn-primary" style="justify-content:center;margin-bottom:12px;">
                Open conversation →
            </a>
            <p style="color:#aaa;font-size:0.8rem;">We'll confirm the appointment once you reach out. Talk soon!</p>
        </div>

    </div>
</div>

{{-- ── Modal styles ──────────────────────────────────────────────────── --}}
<style>
    .modal-label  { display:block; font-weight:600; margin-bottom:6px; font-size:0.88rem; color:#333; }
    .modal-input  { width:100%; padding:10px 14px; border:1.5px solid #ddd; border-radius:8px; font-size:0.93rem; box-sizing:border-box; transition:border-color 0.2s; outline:none; }
    .modal-input:focus { border-color:#e44d26; }
    .modal-error  { color:#c0392b; font-size:0.84rem; margin-bottom:12px; padding:8px 12px; background:#fff0f0; border-radius:6px; }
    .modal-back   { background:none; border:none; color:#888; cursor:pointer; padding:0; margin-bottom:18px; font-size:0.88rem; }
    .modal-back:hover { color:#333; }

    .consultant-card {
        border:2px solid #eee; border-radius:12px; padding:18px 12px;
        cursor:pointer; text-align:center; transition:all 0.2s;
    }
    .consultant-card:hover { border-color:#ccc; transform:translateY(-2px); }
    .consultant-card.selected-alex { border-color:#e44d26; background:#fff8f6; }
    .consultant-card.selected-tamy { border-color:#8e44ad; background:#f9f6ff; }
    .consultant-card.selected-both { border-color:#27ae60; background:#f0fff4; }

    .avatar    { width:52px;height:52px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;color:#fff;font-weight:700;font-size:1.1rem; }
    .avatar-sm { width:40px;height:40px;font-size:0.9rem; }
    .card-name { margin:0 0 3px;font-size:0.95rem; }
    .card-role { color:#888;font-size:0.78rem;margin:0 0 8px; }
    .slot-badge{ padding:3px 10px;border-radius:20px;font-size:0.75rem;font-weight:600; }

    .platform-btn {
        display:flex;align-items:center;justify-content:center;gap:8px;
        padding:14px;border-radius:10px;border:none;color:#fff;
        font-weight:600;font-size:0.9rem;cursor:pointer;transition:opacity 0.2s;
    }
    .platform-btn:hover { opacity:0.85; }
    .platform-btn:disabled { opacity:0.5; cursor:not-allowed; }
</style>

{{-- ── Modal JavaScript ──────────────────────────────────────────────── --}}
<script>
    // ── Laravel route URLs (Blade injects these) ───────────────────────
    const SLOTS_URL  = '{{ route("consultation.slots") }}';
    const BOOK_URL   = '{{ route("consultation.book") }}';
    const CSRF_TOKEN = '{{ csrf_token() }}';

    // ── State ──────────────────────────────────────────────────────────
    let selectedConsultant = null;
    let confirmedLinks     = null;
    let selectedPlatform   = null;

    // ── Open / Close ───────────────────────────────────────────────────
    function openConsultationModal() {
        resetModal();
        document.getElementById('consultationOverlay').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeConsultationModal() {
        document.getElementById('consultationOverlay').style.display = 'none';
        document.body.style.overflow = '';
    }

    document.getElementById('consultationOverlay').addEventListener('click', function (e) {
        if (e.target === this) closeConsultationModal();
    });

    function resetModal() {
        selectedConsultant = null;
        confirmedLinks     = null;
        selectedPlatform   = null;
        ['clientName','clientEmail','clientMessage'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
        document.getElementById('serviceType').value = '';
        document.getElementById('consultDate').value = '';
        document.getElementById('timeSlot').innerHTML = '<option value="">— Pick a date first —</option>';
        ['step1Error','step2Error','step3Error','step4Error'].forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
        goToStep(1);
    }

    // ── Progress bar ───────────────────────────────────────────────────
    function updateProgress(step) {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('prog' + i).style.background = i <= step ? '#e44d26' : '#eee';
        }
    }

    function goToStep(n) {
        [1,2,3,4,5].forEach(i => {
            document.getElementById('step' + i).style.display = i === n ? 'block' : 'none';
        });
        updateProgress(n);
    }

    // ── Step 1 → 2 ────────────────────────────────────────────────────
    function goToStep2() {
        const name    = document.getElementById('clientName').value.trim();
        const email   = document.getElementById('clientEmail').value.trim();
        const service = document.getElementById('serviceType').value;
        const err     = document.getElementById('step1Error');

        if (!name || !email || !service) {
            showError('step1Error', 'Please fill in your name, email and select a service.');
            return;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('step1Error', 'Please enter a valid email address.');
            return;
        }
        err.style.display = 'none';
        goToStep(2);
    }

    // ── Step 2: Select consultant ──────────────────────────────────────
    function selectConsultant(who) {
        selectedConsultant = who;

        // Reset card styles
        document.getElementById('cardAlex').className = 'consultant-card';
        document.getElementById('cardTamy').className = 'consultant-card';
        document.getElementById('cardBoth').className = 'consultant-card';

        // Highlight selected
        const cardMap = { alex: 'cardAlex', tamy: 'cardTamy', both: 'cardBoth' };
        document.getElementById(cardMap[who]).className = 'consultant-card selected-' + who;

        // Set subtitle
        const subtitles = {
            alex: 'Showing Alex\'s availability (09:00 – 12:30).',
            tamy: 'Showing Tamara\'s availability (14:00 – 17:00).',
            both: 'Showing combined availability — Alex (09:00–12:30) and Tamara (14:00–17:00).',
        };
        document.getElementById('step3Subtitle').textContent = subtitles[who];

        // Set min date to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        document.getElementById('consultDate').min = tomorrow.toISOString().split('T')[0];
        document.getElementById('consultDate').value = '';
        document.getElementById('timeSlot').innerHTML = '<option value="">— Pick a date first —</option>';

        document.getElementById('step2Error').style.display = 'none';
        goToStep(3);
    }

    // ── Step 3: Load available slots from Laravel ──────────────────────
    async function loadSlots() {
        const date = document.getElementById('consultDate').value;
        if (!date || !selectedConsultant) return;

        const select  = document.getElementById('timeSlot');
        const loading = document.getElementById('slotsLoading');

        select.innerHTML = '<option value="">Loading...</option>';
        select.disabled  = true;
        loading.style.display = 'block';

        try {
            const res  = await fetch(`${SLOTS_URL}?consultant=${selectedConsultant}&date=${date}`);
            const data = await res.json();

            loading.style.display = 'none';
            select.disabled = false;

            if (!data.slots || data.slots.length === 0) {
                select.innerHTML = '<option value="">No slots available on this date</option>';
                return;
            }

            select.innerHTML = '<option value="">— Select a time slot —</option>';
            data.slots.forEach(slot => {
                const opt = document.createElement('option');
                opt.value = slot;
                opt.textContent = slot;
                select.appendChild(opt);
            });

            if (data.note) {
                document.getElementById('step3Subtitle').textContent = data.note;
            }
        } catch (e) {
            loading.style.display = 'none';
            select.disabled = false;
            select.innerHTML = '<option value="">Error loading slots — try again</option>';
        }
    }

    // ── Step 3 → 4 ────────────────────────────────────────────────────
    function goToStep4() {
        const date = document.getElementById('consultDate').value;
        const time = document.getElementById('timeSlot').value;

        if (!date || !time) {
            showError('step3Error', 'Please pick a date and a time slot.');
            return;
        }
        document.getElementById('step3Error').style.display = 'none';

        const name    = document.getElementById('clientName').value.trim();
        const service = document.getElementById('serviceType').value;
        const dateStr = new Date(date + 'T00:00:00').toLocaleDateString('en-GB', {
            weekday:'long', day:'numeric', month:'long', year:'numeric'
        });

        const whoLabel = { alex: 'Aleksandra (Alex)', tamy: 'Tamara', both: 'both of us' };
        document.getElementById('step4Summary').textContent =
            `${name} · ${dateStr} at ${time} with ${whoLabel[selectedConsultant]}.`;

        goToStep(4);
    }

    // ── Step 4: Confirm booking via Laravel POST ───────────────────────
    async function confirmBooking(platform) {
        selectedPlatform = platform;

        const buttons = document.querySelectorAll('.platform-btn');
        buttons.forEach(b => b.disabled = true);
        document.getElementById('step4Loading').style.display = 'block';
        document.getElementById('step4Error').style.display   = 'none';

        const payload = {
            client_name:    document.getElementById('clientName').value.trim(),
            client_email:   document.getElementById('clientEmail').value.trim(),
            service:        document.getElementById('serviceType').value,
            message:        document.getElementById('clientMessage').value.trim(),
            consultant:     selectedConsultant,
            preferred_date: document.getElementById('consultDate').value,
            preferred_time: document.getElementById('timeSlot').value,
            platform:       platform,
        };

        try {
            const res  = await fetch(BOOK_URL, {
                method:  'POST',
                headers: {
                    'Content-Type':  'application/json',
                    'Accept':        'application/json',
                    'X-CSRF-TOKEN':  CSRF_TOKEN,
                },
                body: JSON.stringify(payload),
            });

            const data = await res.json();

            document.getElementById('step4Loading').style.display = 'none';
            buttons.forEach(b => b.disabled = false);

            if (!data.success) {
                const msg = data.message || 'Something went wrong. Please try again.';
                showError('step4Error', msg);
                return;
            }

            confirmedLinks = data.links;

            // Build success step
            const platformNames = { whatsapp:'WhatsApp', viber:'Viber', zoom:'Zoom', meet:'Google Meet' };
            const platformLink  = confirmedLinks[platform];
            const name          = payload.client_name;
            const dateStr       = new Date(payload.preferred_date + 'T00:00:00').toLocaleDateString('en-GB', {
                weekday:'long', day:'numeric', month:'long'
            });

            document.getElementById('step5Summary').textContent =
                `Your booking with ${confirmedLinks.who} is saved for ${dateStr} at ${payload.preferred_time}. ` +
                `Click below to open ${platformNames[platform]} and send them a message.`;

            document.getElementById('step5Link').href        = platformLink;
            document.getElementById('step5Link').textContent = `Open ${platformNames[platform]} →`;

            goToStep(5);

        } catch (e) {
            document.getElementById('step4Loading').style.display = 'none';
            buttons.forEach(b => b.disabled = false);
            showError('step4Error', 'Network error — please check your connection and try again.');
        }
    }

    // ── Helper ─────────────────────────────────────────────────────────
    function showError(id, msg) {
        const el = document.getElementById(id);
        el.textContent    = msg;
        el.style.display  = 'block';
    }
</script>
