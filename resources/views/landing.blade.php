<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Bank - Golden Harvest Edition</title>
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
                    <span class="text-2xl font-black tracking-tight text-amber-500 flex items-center gap-2">
                        <i class="fa-solid fa-tree"></i> CAREER<span class="text-white">BANK</span>
                    </span>
                </div>

                <!-- Role Toggles -->
                <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="#about" class="text-stone-400 hover:text-amber-400 transition">About Us</a>
                    <a href="#jobs" class="text-stone-400 hover:text-amber-400 transition">Find Jobs</a>
                    <a href="#universities" class="text-stone-400 hover:text-amber-400 transition">Career Services</a>
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
                Golden Opportunity: The Unified Talent Network
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-stone-100 tracking-tight max-w-4xl mx-auto leading-tight">
                Harvest Your Potential with <span class="text-amber-500">Career Bank</span>
            </h1>
            <p class="mt-6 text-lg sm:text-xl text-stone-400 max-w-2xl mx-auto leading-relaxed">
                A golden ecosystem bringing together students, seekers, and enterprises into one thriving, unified forest canopy.
            </p>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,rgba(217,119,6,0.1),transparent_70%)]"></div>
    </header>

    <!-- The 3 Doors (Routing Section) -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: Candidates -->
            <div id="candidates" class="bg-[#17140f] rounded-2xl p-8 shadow-2xl border border-amber-950/50 flex flex-col justify-between hover:border-amber-700/50 transition duration-300 group relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-amber-950 text-amber-500 flex items-center justify-center text-xl font-bold mb-6 border border-amber-900 group-hover:bg-amber-500 group-hover:text-stone-950 transition duration-300">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-100 mb-2">For Candidates</h3>
                    <p class="text-stone-400 text-sm leading-relaxed mb-6">Deposit your credentials, match with top global employers, and access our career upskilling modules.</p>
                    <ul class="space-y-2.5 mb-8 text-sm text-stone-500">
                        <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-amber-600 text-xs"></i> AI Matching</li>
                        <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-amber-600 text-xs"></i> Skill Growth</li>
                    </ul>
                </div>
                <a href="#candidate-register" class="w-full text-center bg-stone-800 hover:bg-amber-600 hover:text-stone-950 text-amber-500 py-3 rounded-xl font-semibold text-sm transition duration-300">Get Started</a>
            </div>

            <!-- Card 2: Employers -->
            <div id="employers" class="bg-[#17140f] rounded-2xl p-8 shadow-2xl border border-amber-950/50 flex flex-col justify-between hover:border-amber-700/50 transition duration-300 group relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-amber-950 text-amber-500 flex items-center justify-center text-xl font-bold mb-6 border border-amber-900 group-hover:bg-amber-500 group-hover:text-stone-950 transition duration-300">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-100 mb-2">For Employers</h3>
                    <p class="text-stone-400 text-sm leading-relaxed mb-6">Source fresh talent, manage your candidate pipeline, and retain your staff with internal modules.</p>
                    <ul class="space-y-2.5 mb-8 text-sm text-stone-500">
                        <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-amber-600 text-xs"></i> ATS Pipeline</li>
                        <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-amber-600 text-xs"></i> Retention Tools</li>
                    </ul>
                </div>
                <a href="#employer-register" class="w-full text-center bg-stone-800 hover:bg-amber-600 hover:text-stone-950 text-amber-500 py-3 rounded-xl font-semibold text-sm transition duration-300">Recruit Now</a>
            </div>

            <!-- Card 3: Universities -->
            <div id="universities" class="bg-[#17140f] rounded-2xl p-8 shadow-2xl border border-amber-950/50 flex flex-col justify-between hover:border-amber-700/50 transition duration-300 group relative overflow-hidden">
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-amber-950 text-amber-500 flex items-center justify-center text-xl font-bold mb-6 border border-amber-900 group-hover:bg-amber-500 group-hover:text-stone-950 transition duration-300">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-bold text-stone-100 mb-2">For Universities</h3>
                    <p class="text-stone-400 text-sm leading-relaxed mb-6">Bridge the gap between graduation and employment. Track alumni and empower your students.</p>
                    <ul class="space-y-2.5 mb-8 text-sm text-stone-500">
                        <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-amber-600 text-xs"></i> Alumni Network</li>
                        <li class="flex items-center gap-2.5"><i class="fa-solid fa-check text-amber-600 text-xs"></i> Industry Partners</li>
                    </ul>
                </div>
                <a href="#uni-register" class="w-full text-center bg-stone-800 hover:bg-amber-600 hover:text-stone-950 text-amber-500 py-3 rounded-xl font-semibold text-sm transition duration-300">Connect Now</a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#0a0805] text-stone-500 py-12 border-t border-amber-950/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm">
            &copy; {{ date('Y') }} Career Bank. Harvesting talent.
        </div>
    </footer>

</body>
</html>