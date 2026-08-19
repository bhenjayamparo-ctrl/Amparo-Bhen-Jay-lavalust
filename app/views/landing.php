<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bhen Jay Amparo</title>
<link rel="shortcut icon" href="data:image/x-icon;,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --ink: #0d1321;
        --ink-soft: #1c2333;
        --panel: #12182b;
        --panel-2: #171f36;
        --line: rgba(255,255,255,0.08);
        --line-strong: rgba(255,255,255,0.16);
        --text: #eef1f8;
        --text-dim: #9aa3b8;
        --text-faint: #5b6580;
        --accent: #5eead4;
        --accent-2: #818cf8;
        --accent-glow: rgba(94,234,212,0.18);
        --danger: #fb7185;
        --sans: 'Sora', sans-serif;
        --body: 'Inter', sans-serif;
    }

    html { scroll-behavior: smooth; }

    body {
        font-family: var(--body);
        background: radial-gradient(1200px 600px at 15% -10%, rgba(129,140,248,0.16), transparent 60%),
                    radial-gradient(1000px 500px at 90% 10%, rgba(94,234,212,0.10), transparent 55%),
                    var(--ink);
        color: var(--text);
        min-height: 100vh;
    }

    .wrap { max-width: 1080px; margin: 0 auto; padding: 0 1.75rem; }

    nav {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.5rem 1.75rem; border-bottom: 1px solid var(--line);
    }
    .brand { display: flex; align-items: center; gap: .6rem; font-family: var(--sans); font-weight: 700; font-size: 1.02rem; letter-spacing: -0.01em; }
    .brand .dot { width: 9px; height: 9px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 12px var(--accent); }
    .nav-links { display: flex; align-items: center; gap: 1.5rem; }
    .nav-links a { color: var(--text-dim); text-decoration: none; font-size: .85rem; font-weight: 500; transition: color .2s; }
    .nav-links a:hover { color: var(--text); }

    .hero {
        display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 3.5rem;
        align-items: center; padding: 5rem 0 4rem;
    }
    .eyebrow {
        display: inline-flex; align-items: center; gap: .5rem;
        font-family: var(--sans); font-size: .72rem; font-weight: 600;
        letter-spacing: .1em; text-transform: uppercase; color: var(--accent);
        background: var(--accent-glow); border: 1px solid rgba(94,234,212,0.3);
        padding: .35rem .8rem; border-radius: 999px; margin-bottom: 1.5rem;
    }
    .hero h1 {
        font-family: var(--sans); font-size: clamp(2.1rem, 4.2vw, 3.1rem);
        font-weight: 800; line-height: 1.15; letter-spacing: -0.02em; margin-bottom: 1.1rem;
    }
    .hero h1 span { color: var(--accent); }
    .hero p.lead {
        color: var(--text-dim); font-size: 1.05rem; line-height: 1.75; max-width: 480px; margin-bottom: 2.1rem;
    }
    .hero-meta { display: flex; flex-wrap: wrap; gap: .6rem 1.6rem; margin-bottom: 2.3rem; }
    .hero-meta div { display: flex; flex-direction: column; gap: .15rem; }
    .hero-meta .label { font-size: .68rem; text-transform: uppercase; letter-spacing: .08em; color: var(--text-faint); }
    .hero-meta .value { font-size: .88rem; color: var(--text); font-weight: 500; }

    .actions { display: flex; align-items: center; gap: .8rem; flex-wrap: wrap; }
    .btn {
        display: inline-flex; align-items: center; gap: .55rem; padding: .8rem 1.5rem;
        border-radius: 10px; font-family: var(--sans); font-size: .9rem; font-weight: 600;
        text-decoration: none; cursor: pointer; border: none; transition: all .2s;
    }
    .btn-primary { background: linear-gradient(135deg, var(--accent), var(--accent-2)); color: #05121a; }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 30px rgba(94,234,212,0.22); }
    .btn-ghost { background: transparent; color: var(--text); border: 1px solid var(--line-strong); }
    .btn-ghost:hover { background: rgba(255,255,255,0.04); border-color: var(--accent); }

    .portrait-frame {
        position: relative; border-radius: 22px; padding: 6px;
        background: linear-gradient(145deg, rgba(94,234,212,0.5), rgba(129,140,248,0.35));
    }
    .portrait-frame img {
        display: block; width: 100%; aspect-ratio: 1/1; object-fit: cover;
        border-radius: 18px; background: var(--panel);
    }
    .portrait-badge {
        position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%);
        background: var(--panel-2); border: 1px solid var(--line-strong);
        padding: .55rem 1.1rem; border-radius: 999px; font-size: .78rem; font-weight: 600;
        white-space: nowrap; box-shadow: 0 10px 25px rgba(0,0,0,0.35);
    }

    .divider { height: 1px; background: linear-gradient(90deg, transparent, var(--line), transparent); }

    section.about { padding: 5rem 0; }
    .section-label {
        font-family: var(--sans); font-size: .72rem; font-weight: 600; color: var(--accent);
        text-transform: uppercase; letter-spacing: .12em; margin-bottom: .7rem;
    }
    .section-title { font-family: var(--sans); font-size: clamp(1.5rem,3vw,2rem); font-weight: 800; letter-spacing: -0.02em; margin-bottom: .9rem; }
    .section-desc { color: var(--text-dim); max-width: 560px; line-height: 1.7; margin-bottom: 2.5rem; }

    .grid-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--line); border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
    .card { background: var(--panel); padding: 1.8rem; }
    .card .icon { width: 38px; height: 38px; border-radius: 10px; background: var(--accent-glow); border: 1px solid rgba(94,234,212,0.3); display: flex; align-items: center; justify-content: center; font-size: 17px; margin-bottom: .9rem; }
    .card h3 { font-family: var(--sans); font-size: .95rem; font-weight: 700; margin-bottom: .5rem; }
    .card p { font-size: .84rem; color: var(--text-dim); line-height: 1.6; }

    footer { padding: 2.2rem 0 3rem; border-top: 1px solid var(--line); margin-top: 1rem; }
    .footer-row { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; }
    .footer-row p { font-size: .8rem; color: var(--text-faint); }
    .footer-row .foot-links { display: flex; gap: 1.2rem; }
    .footer-row .foot-links a { color: var(--text-dim); text-decoration: none; font-size: .82rem; }
    .footer-row .foot-links a:hover { color: var(--accent); }

    
    .toast {
        position: fixed; top: 1.25rem; left: 50%; transform: translateX(-50%) translateY(-140%);
        background: var(--panel-2); border: 1px solid rgba(251,113,133,0.4);
        color: var(--text); padding: .8rem 1.2rem; border-radius: 12px;
        font-size: .85rem; box-shadow: 0 15px 35px rgba(0,0,0,0.4);
        display: flex; align-items: center; gap: .6rem; z-index: 60;
        transition: transform .35s ease; max-width: 90vw;
    }
    .toast.show { transform: translateX(-50%) translateY(0); }
    .toast .dot { width: 8px; height: 8px; border-radius: 50%; background: var(--danger); flex-shrink: 0; }

    
    .overlay {
        position: fixed; inset: 0; background: rgba(5,8,16,0.72); backdrop-filter: blur(6px);
        display: flex; align-items: center; justify-content: center; z-index: 50;
        opacity: 0; pointer-events: none; transition: opacity .25s ease; padding: 1rem;
    }
    .overlay.open { opacity: 1; pointer-events: auto; }

    .modal {
        width: 100%; max-width: 380px; background: var(--panel-2);
        border: 1px solid var(--line-strong); border-radius: 20px; padding: 2rem 1.8rem 1.8rem;
        transform: translateY(14px) scale(.97); transition: transform .25s ease;
        box-shadow: 0 30px 80px rgba(0,0,0,0.5);
    }
    .overlay.open .modal { transform: translateY(0) scale(1); }

    .modal-icon {
        width: 52px; height: 52px; border-radius: 14px; margin: 0 auto 1.1rem;
        background: var(--accent-glow); border: 1px solid rgba(94,234,212,0.3);
        display: flex; align-items: center; justify-content: center; font-size: 22px;
    }
    .modal h2 { font-family: var(--sans); text-align: center; font-size: 1.15rem; font-weight: 700; margin-bottom: .4rem; }
    .modal p.sub { text-align: center; color: var(--text-dim); font-size: .84rem; line-height: 1.55; margin-bottom: 1.6rem; }

    .otp-row { display: flex; justify-content: center; gap: .6rem; margin-bottom: 1.1rem; }
    .otp-row input {
        width: 52px; height: 58px; text-align: center; font-size: 1.4rem; font-weight: 700;
        font-family: var(--sans); color: var(--text); background: var(--ink-soft);
        border: 1.5px solid var(--line-strong); border-radius: 12px; outline: none;
        transition: border-color .15s, box-shadow .15s;
    }
    .otp-row input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-glow); }
    .otp-row.error input { border-color: var(--danger); animation: shake .35s; }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-6px); }
        75% { transform: translateX(6px); }
    }

    .modal-msg { min-height: 1.2rem; text-align: center; font-size: .8rem; color: var(--danger); margin-bottom: .9rem; }

    .modal-actions { display: flex; flex-direction: column; gap: .6rem; }
    .btn-block { width: 100%; justify-content: center; }
    .btn-primary:disabled { opacity: .55; cursor: not-allowed; transform: none; box-shadow: none; }
    .btn-cancel { background: transparent; color: var(--text-faint); border: none; font-size: .82rem; padding: .5rem; cursor: pointer; font-family: var(--body); }
    .btn-cancel:hover { color: var(--text); }

    @media (max-width: 820px) {
        .hero { grid-template-columns: 1fr; padding-top: 3rem; }
        .hero .portrait-frame { max-width: 260px; margin: 0 auto; order: -1; }
        .grid-cards { grid-template-columns: 1fr; }
        .nav-links a:not(.btn-nav) { display: none; }
    }
</style>
</head>
<body>

<div id="toast" class="toast<?= $show_locked ? ' show' : '' ?>">
    <span class="dot"></span>
    Enter your access code to view the profile.
</div>

<nav>
    <div class="brand"><span class="dot"></span> Bhen Jay Amparo</div>
    <div class="nav-links">
        <a href="#about">About</a>
        <a href="mailto:<?= htmlspecialchars($student['email']) ?>">Contact</a>
        <a href="https://github.com/<?= htmlspecialchars($student['github']) ?>" target="_blank" rel="noopener">GitHub</a>
    </div>
</nav>

<div class="wrap">
    <div class="hero">
        <div>
            <div class="eyebrow">Available on campus</div>
            <h1>Hi, I'm <span><?= htmlspecialchars($student['name']) ?></span></h1>
            <p class="lead">
                <?= htmlspecialchars($student['course']) ?> student who spends most days between
                video edits, publication layouts, and campus org work. This page is my
                personal student profile — click below to unlock the full details.
            </p>

            <div class="hero-meta">
                <div><span class="label">Course</span><span class="value"><?= htmlspecialchars($student['course']) ?></span></div>
                <div><span class="label">Year &amp; Section</span><span class="value"><?= htmlspecialchars($student['year']) ?> · <?= htmlspecialchars($student['section']) ?></span></div>
                <div><span class="label">Focus</span><span class="value">Editing &amp; Media</span></div>
            </div>

            <div class="actions">
                <button class="btn btn-primary" id="viewProfileBtn">
                    View Profile →
                </button>
                <a class="btn btn-ghost" href="mailto:<?= htmlspecialchars($student['email']) ?>">Get in Touch</a>
            </div>
        </div>

        <div class="portrait-frame">
            <img src="<?= base_url('assets/img/profile.png') ?>" alt="<?= htmlspecialchars($student['name']) ?>">
            <div class="portrait-badge">🎓 <?= htmlspecialchars($student['student_id']) ?></div>
        </div>
    </div>
</div>

<div class="divider"></div>

<section class="about wrap" id="about">
    <div class="section-label">
    <h2 class="section-title">A quick look before you dive in.</h2>
    <p class="section-desc">
        The full profile — academic details, skills, hobbies, and campus involvement —
        is kept behind a short access-code check, just like a private portfolio page.
    </p>

    <div class="grid-cards">
        <div class="card">
            <div class="icon">🎬</div>
            <h3>Video &amp; Media Editing</h3>
            <p>Handles video editing and publication material for campus projects and org releases.</p>
        </div>
        <div class="card">
            <div class="icon">📣</div>
            <h3>Campus Involvement</h3>
            <p>Active in student publications and student council representation.</p>
        </div>
        <div class="card">
            <div class="icon">🎮</div>
            <h3>Off Campus</h3>
            <p>Gaming and music fill the downtime between deadlines.</p>
        </div>
    </div>
</section>

<footer>
    <div class="wrap footer-row">
        <p>© <?= date('Y') ?> <?= htmlspecialchars($student['name']) ?> · Built on the LavaLust PHP Framework</p>
        <div class="foot-links">
            <a href="https://github.com/<?= htmlspecialchars($student['github']) ?>" target="_blank" rel="noopener">GitHub</a>
            <a href="mailto:<?= htmlspecialchars($student['email']) ?>">Email</a>
        </div>
    </div>
</footer>

<div class="overlay" id="overlay">
    <div class="modal">
        <div class="modal-icon">🔒</div>
        <h2>Enter Access Code</h2>
        <p class="sub">This profile is private. Enter the 4-digit code to continue.</p>

        <div class="otp-row" id="otpRow">
            <input type="text" inputmode="numeric" maxlength="1" class="otp-input" autocomplete="off">
            <input type="text" inputmode="numeric" maxlength="1" class="otp-input" autocomplete="off">
            <input type="text" inputmode="numeric" maxlength="1" class="otp-input" autocomplete="off">
            <input type="text" inputmode="numeric" maxlength="1" class="otp-input" autocomplete="off">
        </div>

        <div class="modal-msg" id="modalMsg"></div>

        <div class="modal-actions">
            <button class="btn btn-primary btn-block" id="submitCodeBtn">Unlock Profile</button>
            <button class="btn-cancel" id="cancelBtn">Cancel</button>
        </div>
    </div>
</div>

<script>
(function () {
    var openBtn   = document.getElementById('viewProfileBtn');
    var overlay   = document.getElementById('overlay');
    var cancelBtn = document.getElementById('cancelBtn');
    var submitBtn = document.getElementById('submitCodeBtn');
    var otpRow    = document.getElementById('otpRow');
    var inputs    = Array.prototype.slice.call(document.querySelectorAll('.otp-input'));
    var msg       = document.getElementById('modalMsg');
    var toast     = document.getElementById('toast');

    if (toast.classList.contains('show')) {
        setTimeout(function () { toast.classList.remove('show'); }, 4000);
    }

    function openModal() {
        overlay.classList.add('open');
        msg.textContent = '';
        otpRow.classList.remove('error');
        inputs.forEach(function (i) { i.value = ''; });
        inputs[0].focus();
    }
    function closeModal() { overlay.classList.remove('open'); }

    openBtn.addEventListener('click', openModal);
    cancelBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', function (e) { if (e.target === overlay) closeModal(); });

    inputs.forEach(function (input, idx) {
        input.addEventListener('input', function () {
            input.value = input.value.replace(/[^0-9]/g, '').slice(0, 1);
            if (input.value && idx < inputs.length - 1) inputs[idx + 1].focus();
        });
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && !input.value && idx > 0) inputs[idx - 1].focus();
            if (e.key === 'Enter') submitBtn.click();
        });
        input.addEventListener('paste', function (e) {
            var text = (e.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
            if (!text) return;
            e.preventDefault();
            text.split('').slice(0, inputs.length).forEach(function (ch, i) { inputs[i].value = ch; });
            inputs[Math.min(text.length, inputs.length) - 1].focus();
        });
    });

    submitBtn.addEventListener('click', function () {
        var code = inputs.map(function (i) { return i.value; }).join('');

        if (code.length !== 4) {
            otpRow.classList.add('error');
            msg.textContent = 'Please enter all 4 digits.';
            setTimeout(function () { otpRow.classList.remove('error'); }, 350);
            return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Verifying…';
        msg.textContent = '';

        var body = new URLSearchParams();
        body.set('code', code);

        fetch('<?= site_url('student/verify') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
            body: body.toString()
        })
        .then(function (res) { return res.json(); })
        .then(function (data) {
            if (data.success) {
                submitBtn.textContent = 'Unlocked ✓';
                window.location.href = data.redirect;
            } else {
                otpRow.classList.add('error');
                msg.textContent = data.message || 'Incorrect code.';
                inputs.forEach(function (i) { i.value = ''; });
                inputs[0].focus();
                submitBtn.disabled = false;
                submitBtn.textContent = 'Unlock Profile';
                setTimeout(function () { otpRow.classList.remove('error'); }, 350);
            }
        })
        .catch(function () {
            msg.textContent = 'Something went wrong. Please try again.';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Unlock Profile';
        });
    });
})();
</script>

</body>
</html>
