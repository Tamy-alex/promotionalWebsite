<div id="cOverlay" class="c-overlay">
    <div class="c-modal">
        <button class="c-close" onclick="closeCModal()">&times;</button>
        <div class="c-prog">
            <div id="p1" class="c-bar active"></div><div id="p2" class="c-bar"></div>
            <div id="p3" class="c-bar"></div><div id="p4" class="c-bar"></div>
        </div>

        <div id="step1" class="c-step">
            <h2>Book a Free Consultation</h2>
            <p class="c-sub">Tell us what you need — we'll meet at your chosen time.</p>
            <label class="c-label">Your Name *</label>
            <input id="clientName" type="text" placeholder="e.g. Marko Petrović" class="c-input">
            <label class="c-label">Email Address *</label>
            <input id="clientEmail" type="email" placeholder="you@example.com" class="c-input">
            <label class="c-label">Service Needed *</label>
            <select id="serviceType" class="c-input">
                <option value="">— Select a service —</option>
                <option>Landing Page / Website</option>
                <option>E-Commerce Store</option>
                <option>Web Application</option>
                <option>Backend / API Development</option>
            </select>
            <label class="c-label">Tell us more (optional)</label>
            <textarea id="clientMessage" placeholder="Briefly describe your project..." rows="3" class="c-input" style="resize:vertical"></textarea>
            <div id="err1" class="c-err"></div>
            <button onclick="step1Next()" class="c-btn">Continue →</button>
        </div>

        <div id="step2" class="c-step" style="display:none">
            <button onclick="goTo(1)" class="c-back">← Back</button>
            <h2>Who would you like to speak with?</h2>
            <p class="c-sub">You can book with one of us, or with both — we often collaborate.</p>
            <div class="c-cards">
                <div id="cardAlex" class="c-card" onclick="pickConsultant('alex')">
                    <div class="c-avatar" style="background:linear-gradient(135deg,#e44d26,#f7931e)">AC</div>
                    <strong>Aleksandra (Alex)</strong><span>Backend Dev · PHP & Laravel · Security</span>
                    <em class="c-slot" style="background:#fff3ee;color:#e44d26">🕘 9:00 – 12:30</em>
                </div>
                <div id="cardTamy" class="c-card" onclick="pickConsultant('tamy')">
                    <div class="c-avatar" style="background:linear-gradient(135deg,#8e44ad,#3498db)">TC</div>
                    <strong>Tamara</strong><span>Backend Laravel · Web Solutions · HTML & CSS</span>
                    <em class="c-slot" style="background:#f3eeff;color:#8e44ad">🕑 14:00 – 17:00</em>
                </div>
                <div id="cardBoth" class="c-card" onclick="pickConsultant('both')">
                    <div style="display:flex;justify-content:center;margin-bottom:10px">
                        <div class="c-avatar c-avatar-sm" style="background:linear-gradient(135deg,#e44d26,#f7931e);z-index:1">AC</div>
                        <div class="c-avatar c-avatar-sm" style="background:linear-gradient(135deg,#8e44ad,#3498db);margin-left:-10px">TC</div>
                    </div>
                    <strong>Both of Us</strong><span>Full-stack collaboration on your project</span>
                    <em class="c-slot" style="background:#efffef;color:#27ae60">🤝 Combined availability</em>
                </div>
            </div>
            <div id="err2" class="c-err"></div>
        </div>

        <div id="step3" class="c-step" style="display:none">
            <button onclick="goTo(2)" class="c-back">← Back</button>
            <h2>Pick a date & time</h2>
            <p id="sub3" class="c-sub"></p>
            <label class="c-label">Preferred Date *</label>
            <input id="consultDate" type="date" class="c-input" onchange="loadSlots()">
            <label class="c-label">Preferred Time Slot *</label>
            <select id="timeSlot" class="c-input"><option value="">— Pick a date first —</option></select>
            <div id="slotsLoading" style="display:none;color:#888;font-size:.83rem;margin-top:6px">
                <i class="fa-solid fa-spinner fa-spin"></i> Checking availability...
            </div>
            <div id="err3" class="c-err"></div>
            <button onclick="step3Next()" class="c-btn">Choose Platform →</button>
        </div>

        <div id="step4" class="c-step" style="display:none">
            <button onclick="goTo(3)" class="c-back">← Back</button>
            <h2>How would you like to meet?</h2>
            <p id="sub4" class="c-sub"></p>
            <p class="c-note"><i class="fa-solid fa-lock" style="color:#e44d26;margin-right:5px"></i>Your booking details and our contact info will be sent to your email only — nothing is exposed here.</p>
            <div class="c-platforms">
                <button onclick="confirmBooking('zoom')" class="c-plat" style="background:#2D8CFF"><i class="fa-solid fa-video"></i> Zoom</button>
                <button onclick="confirmBooking('whatsapp')" class="c-plat" style="background:#25D366"><i class="fa-brands fa-whatsapp"></i> WhatsApp</button>
            </div>
            <div id="step4Loading" style="display:none;text-align:center;color:#888;font-size:.9rem;margin-top:8px"><i class="fa-solid fa-spinner fa-spin"></i> Saving your booking...</div>
            <div id="err4" class="c-err"></div>
        </div>

        <div id="step5" class="c-step" style="display:none;text-align:center">
            <div style="font-size:3rem;margin-bottom:16px">🎉</div>
            <h2>You're booked!</h2>
            <p id="sub5" class="c-sub"></p>
            <div class="c-success-box">
                <i class="fa-solid fa-envelope" style="font-size:1.4rem;color:#e44d26;margin-bottom:10px;display:block"></i>
                <strong>Check your inbox</strong>
                <p>We've sent a confirmation to <strong id="clientEmailConfirm"></strong> with all the details — including the <span id="platName"></span> link to join the call.</p>
            </div>
            <p style="color:#aaa;font-size:.8rem;margin-top:16px">Didn't get it? Check your spam folder or contact us directly.</p>
        </div>
    </div>
</div>

<style>
    .c-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:10000;justify-content:center;align-items:center}
    .c-modal{background:#fff;border-radius:16px;padding:40px 36px 32px;max-width:540px;width:92%;position:relative;box-shadow:0 24px 64px rgba(0,0,0,.3);max-height:92vh;overflow-y:auto}
    .c-close{position:absolute;top:16px;right:20px;background:none;border:none;font-size:1.6rem;cursor:pointer;color:#aaa;line-height:1}
    .c-prog{display:flex;gap:6px;margin-bottom:28px}
    .c-bar{height:4px;flex:1;border-radius:4px;background:#eee;transition:background .3s}
    .c-bar.active{background:#e44d26}
    .c-step h2{margin:0 0 6px;font-size:1.45rem}
    .c-sub{color:#666;margin:0 0 20px;font-size:.93rem}
    .c-note{font-size:.82rem;color:#555;background:#fafafa;border:1px solid #eee;border-radius:8px;padding:10px 14px;margin-bottom:20px}
    .c-label{display:block;font-weight:600;margin-bottom:6px;font-size:.88rem;color:#333}
    .c-input{display:block;width:100%;padding:10px 14px;border:1.5px solid #ddd;border-radius:8px;font-size:.93rem;box-sizing:border-box;transition:border-color .2s;outline:none;margin-bottom:15px}
    .c-input:focus{border-color:#e44d26}
    .c-err{color:#c0392b;font-size:.84rem;margin-bottom:12px;padding:8px 12px;background:#fff0f0;border-radius:6px;display:none}
    .c-back{background:none;border:none;color:#888;cursor:pointer;padding:0;margin-bottom:18px;font-size:.88rem}
    .c-back:hover{color:#333}
    .c-btn{display:flex;align-items:center;justify-content:center;width:100%;padding:12px;background:#e44d26;color:#fff;border:none;border-radius:8px;font-size:.95rem;font-weight:600;cursor:pointer;text-decoration:none}
    .c-btn:hover{background:#c93d18}
    .c-cards{display:flex;flex-wrap:wrap;gap:12px;margin-bottom:16px}
    .c-card{flex:1;min-width:140px;border:2px solid #eee;border-radius:12px;padding:18px 12px;cursor:pointer;text-align:center;transition:all .2s;display:flex;flex-direction:column;align-items:center;gap:4px}
    .c-card:hover{border-color:#ccc;transform:translateY(-2px)}
    .c-card.sel-alex{border-color:#e44d26;background:#fff8f6}
    .c-card.sel-tamy{border-color:#8e44ad;background:#f9f6ff}
    .c-card.sel-both{border-color:#27ae60;background:#f0fff4}
    .c-card strong{font-size:.95rem}.c-card span{color:#888;font-size:.78rem}
    .c-avatar{width:52px;height:52px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-bottom:10px;color:#fff;font-weight:700;font-size:1.1rem}
    .c-avatar-sm{width:40px;height:40px;font-size:.9rem}
    .c-slot{padding:3px 10px;border-radius:20px;font-size:.75rem;font-weight:600;font-style:normal}
    .c-platforms{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:8px}
    .c-plat{display:flex;align-items:center;justify-content:center;gap:8px;padding:16px;border-radius:10px;border:none;color:#fff;font-weight:600;font-size:1rem;cursor:pointer;transition:opacity .2s}
    .c-plat:hover{opacity:.85}.c-plat:disabled{opacity:.5;cursor:not-allowed}
    .c-success-box{background:#fafafa;border:1px solid #eee;border-radius:12px;padding:20px;margin-top:8px}
    .c-success-box p{color:#555;font-size:.9rem;margin:8px 0 0;line-height:1.5}
</style>

<script>
    const SLOTS_URL  = '{{ route("consultation.slots") }}';
    const BOOK_URL   = '{{ route("consultation.book") }}';
    const CSRF_TOKEN = '{{ csrf_token() }}';
    const LABELS     = { alex:'Aleksandra (Alex)', tamy:'Tamara', both:'both of us' };
    const SUBS       = { alex:"Showing Alex's availability (09:00 – 12:30).", tamy:"Showing Tamara's availability (14:00 – 17:00).", both:"Showing combined availability — Alex (09:00–12:30) and Tamara (14:00–17:00)." };
    const PLAT_NAMES = { zoom:'Zoom', whatsapp:'WhatsApp' };
    let consultant = null;

    function openCModal()  { resetModal(); document.getElementById('cOverlay').style.display='flex'; document.body.style.overflow='hidden'; }
    function closeCModal() { document.getElementById('cOverlay').style.display='none'; document.body.style.overflow=''; }
    document.getElementById('cOverlay').addEventListener('click', e => { if (e.target.id==='cOverlay') closeCModal(); });

    function goTo(n) {
        for (let i=1;i<=5;i++) document.getElementById('step'+i).style.display = i===n ? 'block':'none';
        for (let i=1;i<=4;i++) document.getElementById('p'+i).classList.toggle('active', i<=n);
    }
    function showErr(id, msg) { const el=document.getElementById(id); el.textContent=msg; el.style.display='block'; }
    function fmtDate(d) { return new Date(d+'T00:00:00').toLocaleDateString('en-GB',{weekday:'long',day:'numeric',month:'long',year:'numeric'}); }

    function resetModal() {
        consultant = null;
        document.querySelectorAll('#step1 .c-input').forEach(el => el.value='');
        document.getElementById('consultDate').value = '';
        document.getElementById('timeSlot').innerHTML = '<option value="">— Pick a date first —</option>';
        document.querySelectorAll('.c-err').forEach(el => el.style.display='none');
        goTo(1);
    }

    function step1Next() {
        const name=document.getElementById('clientName').value.trim(), email=document.getElementById('clientEmail').value.trim(), svc=document.getElementById('serviceType').value;
        if (!name||!email||!svc) return showErr('err1','Please fill in your name, email and select a service.');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showErr('err1','Please enter a valid email address.');
        document.getElementById('err1').style.display='none'; goTo(2);
    }

    function pickConsultant(who) {
        consultant = who;
        ['alex','tamy','both'].forEach(k => document.getElementById('card'+k[0].toUpperCase()+k.slice(1)).className = 'c-card'+(k===who?' sel-'+k:''));
        document.getElementById('sub3').textContent = SUBS[who];
        const tom=new Date(); tom.setDate(tom.getDate()+1);
        document.getElementById('consultDate').min = tom.toISOString().split('T')[0];
        document.getElementById('consultDate').value = '';
        document.getElementById('timeSlot').innerHTML = '<option value="">— Pick a date first —</option>';
        goTo(3);
    }

    async function loadSlots() {
        const date=document.getElementById('consultDate').value;
        if (!date||!consultant) return;
        const sel=document.getElementById('timeSlot'), ld=document.getElementById('slotsLoading');
        sel.innerHTML='<option>Loading...</option>'; sel.disabled=true; ld.style.display='block';
        try {
            const data=await fetch(`${SLOTS_URL}?consultant=${consultant}&date=${date}`).then(r=>r.json());
            sel.disabled=false; ld.style.display='none';
            if (!data.slots?.length) { sel.innerHTML='<option>No slots available on this date</option>'; return; }
            sel.innerHTML='<option value="">— Select a time slot —</option>';
            data.slots.forEach(s=>{ const o=document.createElement('option'); o.value=o.textContent=s; sel.appendChild(o); });
            if (data.note) document.getElementById('sub3').textContent=data.note;
        } catch { sel.disabled=false; ld.style.display='none'; sel.innerHTML='<option>Error loading slots — try again</option>'; }
    }

    function step3Next() {
        const date=document.getElementById('consultDate').value, time=document.getElementById('timeSlot').value;
        if (!date||!time) return showErr('err3','Please pick a date and a time slot.');
        document.getElementById('err3').style.display='none';
        document.getElementById('sub4').textContent=`${document.getElementById('clientName').value.trim()} · ${fmtDate(date)} at ${time} with ${LABELS[consultant]}.`;
        goTo(4);
    }

    async function confirmBooking(platform) {
        const btns=document.querySelectorAll('.c-plat');
        btns.forEach(b=>b.disabled=true);
        document.getElementById('step4Loading').style.display='block';
        document.getElementById('err4').style.display='none';
        const payload={ client_name:document.getElementById('clientName').value.trim(), client_email:document.getElementById('clientEmail').value.trim(), service:document.getElementById('serviceType').value, message:document.getElementById('clientMessage').value.trim(), consultant, preferred_date:document.getElementById('consultDate').value, preferred_time:document.getElementById('timeSlot').value, platform };
        try {
            const data=await fetch(BOOK_URL,{ method:'POST', headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':CSRF_TOKEN}, body:JSON.stringify(payload) }).then(r=>r.json());
            document.getElementById('step4Loading').style.display='none';
            btns.forEach(b=>b.disabled=false);
            if (!data.success) return showErr('err4', data.message||'Something went wrong. Please try again.');
            document.getElementById('sub5').textContent=`Your consultation with ${LABELS[consultant]} on ${fmtDate(payload.preferred_date)} at ${payload.preferred_time} is confirmed.`;
            document.getElementById('platName').textContent=PLAT_NAMES[platform];
            document.getElementById('clientEmailConfirm').textContent=payload.client_email;
            goTo(5);
        } catch {
            document.getElementById('step4Loading').style.display='none';
            btns.forEach(b=>b.disabled=false);
            showErr('err4','Network error — please check your connection and try again.');
        }
    }
</script>

