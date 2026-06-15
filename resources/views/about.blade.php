<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Career Bank</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#0f0c08] text-stone-300 font-sans antialiased selection:bg-amber-700 selection:text-white">

    <!-- Global Navigation -->
    <nav class="bg-[#0f0c08]/90 backdrop-blur-md border-b border-amber-950/50 sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <a href="/" class="text-2xl font-black tracking-tight text-amber-500 flex items-center gap-2">
                        <i class="fa-solid fa-tree"></i> CAREER<span class="text-white">BANK</span>
                    </a>
                </div>

                <!-- Role Toggles -->
                <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="/" class="text-stone-400 hover:text-amber-400 transition">Home</a>
                    <a href="#vision" class="text-stone-400 hover:text-amber-400 transition">Our Vision</a>
                    <a href="#pillars" class="text-stone-400 hover:text-amber-400 transition">Our Pillars</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-4">
                    <a href="#login" class="text-sm font-semibold text-amber-600 hover:text-amber-400 transition">Sign In</a>
                    <a href="#register" class="text-sm font-semibold bg-amber-600 hover:bg-amber-500 text-stone-950 px-4 py-2 rounded-lg transition shadow-[0_0_15px_rgba(217,119,6,0.3)]">
                        Join the Ecosystem
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative bg-[#0f0c08] pt-24 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-950/50 text-amber-400 mb-6 border border-amber-800/30">
                The Story Behind the Canopy
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-stone-100 tracking-tight max-w-4xl mx-auto leading-tight">
                Nurturing the Future of <span class="text-amber-500">Global Talent</span>
            </h1>
            <p class="mt-6 text-lg sm:text-xl text-stone-400 max-w-2xl mx-auto leading-relaxed">
                Traditional job sites are transactional—you apply, you leave. We envisioned a complete lifecycle ecosystem where education, recruitment, and professional growth cross-pollinate.
            </p>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,rgba(217,119,6,0.1),transparent_70%)]"></div>
    </header>

    <!-- Vision & Mission Block -->
    <section id="vision" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center bg-[#17140f] border border-amber-950/50 p-8 sm:p-12 rounded-2xl shadow-2xl">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-stone-100 mb-4 tracking-tight">
                    Why <span class="text-amber-400">"Career Bank"</span>?
                </h2>
                <p class="text-stone-400 text-sm sm:text-base leading-relaxed mb-6">
                    A bank is a place where you securely store assets so they can appreciate over time. Your skills, experience, and academic journey are the most valuable professional assets you own. 
                </p>
                <p class="text-stone-400 text-sm sm:text-base leading-relaxed">
                    We provide the modern infrastructure to deposit those skills early during your university days, watch them grow through active candidate matching, and constantly harvest dividends through lifelong employee upskilling.
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Highlight Box 1 -->
                <div class="p-6 rounded-xl bg-[#0f0c08] border border-amber-950/40">
                    <div class="text-amber-500 text-xl mb-3"><i class="fa-solid fa-seedling"></i></div>
                    <h4 class="font-bold text-stone-200 mb-1">Deep Roots</h4>
                    <p class="text-xs text-stone-500 leading-relaxed">We capture talent early at the university level to build robust operational foundations.</p>
                </div>
                <!-- Highlight Box 2 -->
                <div class="p-6 rounded-xl bg-[#0f0c08] border border-amber-950/40">
                    <div class="text-amber-500 text-xl mb-3"><i class="fa-solid fa-chart-line"></i></div>
                    <h4 class="font-bold text-stone-200 mb-1">High Yield</h4>
                    <p class="text-xs text-stone-500 leading-relaxed">We optimize employment and help companies retain their staff via educational tracks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- The 4 Modules Breakdown -->
    <section id="pillars" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-amber-950/20">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-stone-100 tracking-tight">Our 4 Pillars of Growth</h2>
            <p class="text-stone-500 text-sm mt-2">How our unified module architecture manages the complete career lifecycle.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pillar 1 -->
            <div class="p-6 bg-[#17140f] border border-amber-950/50 rounded-2xl flex flex-col justify-between">
                <div>
                    <span class="text-xs font-mono text-amber-600 block mb-2">MODULE 01</span>
                    <h3 class="font-bold text-stone-200 text-lg mb-3">Universities</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">Funnels fresh student cohorts into active corporate visibility using clear, verified placement metrics.</p>
                </div>
                <div class="mt-6 text-right text-amber-600/30 text-2xl"><i class="fa-solid fa-building-columns"></i></div>
            </div>

            <!-- Pillar 2 -->
            <div class="p-6 bg-[#17140f] border border-amber-950/50 rounded-2xl flex flex-col justify-between">
                <div>
                    <span class="text-xs font-mono text-amber-600 block mb-2">MODULE 02</span>
                    <h3 class="font-bold text-stone-200 text-lg mb-3">Candidates</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">Equips active job seekers with dashboard match-tooling to quickly find secure, high-fit industry options.</p>
                </div>
                <div class="mt-6 text-right text-amber-600/30 text-2xl"><i class="fa-solid fa-user-tie"></i></div>
            </div>

            <!-- Pillar 3 -->
            <div class="p-6 bg-[#17140f] border border-amber-950/50 rounded-2xl flex flex-col justify-between">
                <div>
                    <span class="text-xs font-mono text-amber-600 block mb-2">MODULE 03</span>
                    <h3 class="font-bold text-stone-200 text-lg mb-3">Employers</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">Provides corporate HR teams with comprehensive end-to-end ATS pipelines to screen, filter, and recruit.</p>
                </div>
                <div class="mt-6 text-right text-amber-600/30 text-2xl"><i class="fa-solid fa-briefcase"></i></div>
            </div>

            <!-- Pillar 4 -->
            <div class="p-6 bg-[#17140f] border border-amber-950/50 rounded-2xl flex flex-col justify-between">
                <div>
                    <span class="text-xs font-mono text-amber-600 block mb-2">MODULE 04</span>
                    <h3 class="font-bold text-stone-200 text-lg mb-3">Employees</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">The internal platform keeping newly hired staff trained, upskilled, and motivated directly within the company ecosystem.</p>
                </div>
                <div class="mt-6 text-right text-amber-600/30 text-2xl"><i class="fa-solid fa-layer-group"></i></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0a0805] text-stone-500 py-12 border-t border-amber-950/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm">
            &copy; {{ date('Y') }} Career Bank. Harvesting talent.
        </div>
    </footer>

</body>
</html>