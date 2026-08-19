<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($student['name']) ?> — Student Profile</title>
<link rel="shortcut icon" href="data:image/x-icon;,">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --ink: #0d1321; --panel: #12182b; --panel-2: #171f36;
        --line: rgba(255,255,255,0.08); --line-strong: rgba(255,255,255,0.16);
        --text: #eef1f8; --text-dim: #9aa3b8; --text-faint: #5b6580;
        --accent: #5eead4; --accent-2: #818cf8; --accent-glow: rgba(94,234,212,0.18);
        --sans: 'Sora', sans-serif; --body: 'Inter', sans-serif;
    }

    body {
        font-family: var(--body);
        background: radial-gradient(1200px 600px at 15% -10%, rgba(129,140,248,0.16), transparent 60%),
                    radial-gradient(1000px 500px at 90% 10%, rgba(94,234,212,0.10), transparent 55%),
                    var(--ink);
        color: var(--text); min-height: 100vh;
    }

    .wrap { max-width: 980px; margin: 0 auto; padding: 0 1.75rem; }

    nav {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.5rem 1.75rem; border-bottom: 1px solid var(--line);
    }
    .brand { display: flex; align-items: center; gap: .6rem; font-family: var(--sans); font-weight: 700; font-size: 1.02rem; }
    .brand .dot { width: 9px; height: 9px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 12px var(--accent); }
    .nav-links { display: flex; align-items: center; gap: 1.4rem; }
    .nav-links a { color: var(--text-dim); text-decoration: none; font-size: .85rem; font-weight: 500; transition: color .2s; }
    .nav-links a:hover { color: var(--text); }
    .nav-links .pill { background: var(--accent-glow); color: var(--accent); border: 1px solid rgba(94,234,212,0.3); padding: .35rem .8rem; border-radius: 999px; font-size: .74rem; font-weight: 600; }

    .header-block { padding: 3.2rem 0 2.4rem; display: flex; align-items: center; gap: 1.6rem; flex-wrap: wrap; }
    .avatar { width: 92px; height: 92px; border-radius: 20px; object-fit: cover; border: 2px solid var(--line-strong); box-shadow: 0 12px 30px rgba(0,0,0,0.35); }
    .header-block h1 { font-family: var(--sans); font-size: clamp(1.7rem, 3.2vw, 2.3rem); font-weight: 800; letter-spacing: -0.02em; margin-bottom: .3rem; }
    .header-block .sub { color: var(--text-dim); font-size: .92rem; }
    .verified-tag {
        display: inline-flex; align-items: center; gap: .4rem; margin-top: .6rem;
        font-size: .72rem; font-weight: 600; color: var(--accent);
        background: var(--accent-glow); border: 1px solid rgba(94,234,212,0.3);
        padding: .3rem .7rem; border-radius: 999px;
    }

    .panel-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.1rem; margin-bottom: 1.1rem; }
    .panel {
        background: var(--panel); border: 1px solid var(--line); border-radius: 16px; padding: 1.6rem;
    }
    .panel.full { grid-column: 1 / -1; }
    .panel h2 {
        font-family: var(--sans); font-size: .78rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: .08em; color: var(--accent); margin-bottom: 1.1rem;
    }

    .info-row { display: flex; justify-content: space-between; gap: 1rem; padding: .55rem 0; border-bottom: 1px dashed var(--line); font-size: .88rem; }
    .info-row:last-child { border-bottom: none; }
    .info-row .k { color: var(--text-faint); }
    .info-row .v { color: var(--text); font-weight: 500; text-align: right; }

    .chip-list { display: flex; flex-wrap: wrap; gap: .55rem; }
    .chip {
        background: var(--panel-2); border: 1px solid var(--line-strong); color: var(--text);
        font-size: .8rem; padding: .5rem .9rem; border-radius: 999px;
    }

    .org-item { display: flex; gap: .8rem; padding: .8rem 0; border-bottom: 1px dashed var(--line); }
    .org-item:last-child { border-bottom: none; }
    .org-item .badge { width: 34px; height: 34px; border-radius: 9px; background: var(--accent-glow); border: 1px solid rgba(94,234,212,0.3); display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
    .org-item .org { font-weight: 600; font-size: .88rem; }
    .org-item .role { font-size: .8rem; color: var(--text-dim); }

    footer { padding: 2.2rem 0 3rem; border-top: 1px solid var(--line); margin-top: 2rem; text-align: center; }
    footer p { font-size: .8rem; color: var(--text-faint); }
    footer a { color: var(--accent); text-decoration: none; }

    @media (max-width: 680px) {
        .panel-grid { grid-template-columns: 1fr; }
        .nav-links a:not(.pill) { display: none; }
        .info-row { flex-direction: column; gap: .15rem; }
        .info-row .v { text-align: left; }
    }
</style>
</head>
<body>

<nav>
    <div class="brand"><span class="dot"></span> Bhen Jay Amparo</div>
    <div class="nav-links">
        <a href="<?= site_url('student') ?>">Home</a>
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
        <span class="pill">🔓 Verified Access</span>
    </div>
</nav>

<div class="wrap">
    <div class="header-block">
        <img class="avatar" src="<?= base_url('assets/img/profile.png') ?>" alt="<?= htmlspecialchars($student['name']) ?>">
        <div>
            <h1><?= htmlspecialchars($student['name']) ?></h1>
            <p class="sub"><?= htmlspecialchars($student['course']) ?> · <?= htmlspecialchars($student['year']) ?> · Section <?= htmlspecialchars($student['section']) ?></p>
            <span class="verified-tag">✓ Access code verified for this session</span>
        </div>
    </div>

    <div class="panel-grid">
        <div class="panel">
            <h2>Academic Profile</h2>
            <div class="info-row"><span class="k">Student ID</span><span class="v"><?= htmlspecialchars($student['student_id']) ?></span></div>
            <div class="info-row"><span class="k">Full Name</span><span class="v"><?= htmlspecialchars($student['name']) ?></span></div>
            <div class="info-row"><span class="k">Course</span><span class="v"><?= htmlspecialchars($student['course']) ?></span></div>
            <div class="info-row"><span class="k">Year Level</span><span class="v"><?= htmlspecialchars($student['year']) ?></span></div>
            <div class="info-row"><span class="k">Section</span><span class="v"><?= htmlspecialchars($student['section']) ?></span></div>
        </div>

        <div class="panel">
            <h2>Contact Information</h2>
            <div class="info-row"><span class="k">Email</span><span class="v"><?= htmlspecialchars($student['email']) ?></span></div>
            <div class="info-row"><span class="k">GitHub</span><span class="v"><?= htmlspecialchars($student['github']) ?></span></div>
        </div>

        <div class="panel full">
            <h2>Technical Skills</h2>
            <div class="chip-list">
                <?php foreach ($student['skills'] as $skill): ?>
                    <span class="chip"><?= htmlspecialchars($skill) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="panel">
            <h2>Interests &amp; Hobbies</h2>
            <div class="chip-list">
                <?php foreach ($student['hobbies'] as $hobby): ?>
                    <span class="chip"><?= htmlspecialchars($hobby) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="panel">
            <h2>Campus Leadership</h2>
            <?php foreach ($student['affiliations'] as $aff): ?>
                <div class="org-item">
                    <div class="badge">🏛️</div>
                    <div>
                        <div class="org"><?= htmlspecialchars($aff['org']) ?></div>
                        <div class="role"><?= htmlspecialchars($aff['role']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<footer>
    <p>Session-verified profile view · <a href="<?= site_url('student') ?>">← Back to Home</a></p>
</footer>

</body>
</html>
