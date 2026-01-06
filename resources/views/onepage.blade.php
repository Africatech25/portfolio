<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['name'] }} - Portfolio One Page</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Custom color palette */
        :root {
            --color-primary: #FFFFFF;
            --color-accent: #D97706;
            --color-dark: #0E0E0E;
            --color-orange: #EA580C;
        }
        
        /* Navbar with site colors */
        .glass-nav {
            background: rgba(0, 0, 0, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(217, 119, 6, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        
        /* Active link indicator */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 100%;
            height: 2px;
            background: #D97706;
            transition: transform 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
        }
        
        /* Glow effect on CTA */
        .glow-btn {
            box-shadow: 0 0 20px rgba(8, 145, 178, 0.5);
            transition: all 0.3s ease;
        }
        
        .glow-btn:hover {
            box-shadow: 0 0 30px rgba(8, 145, 178, 0.8);
            transform: translateY(-2px);
        }
        
        /* Hamburger menu animation */
        .hamburger-line {
            transition: all 0.3s ease;
        }
        
        .hamburger-active .line-1 {
            transform: rotate(45deg) translateY(8px);
        }
        
        .hamburger-active .line-2 {
            opacity: 0;
        }
        
        .hamburger-active .line-3 {
            transform: rotate(-45deg) translateY(-8px);
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }
    </style>
</head>
<body class="bg-white">

    <!-- NAVBAR -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 px-4 pt-4">
        <div class="glass-nav max-w-5xl mx-auto rounded-full px-8 py-4 shadow-2xl">
            <div class="flex justify-between items-center">
                
                <!-- Left Navigation -->
                <ul class="hidden lg:flex items-center space-x-8">
                    <li>
                        <a class="nav-link text-white hover:text-[#D97706] font-medium cursor-pointer" 
                           onclick="scrollToSection('accueil')">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white hover:text-[#D97706] font-medium cursor-pointer" 
                           onclick="scrollToSection('approche')">
                            À propos
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white hover:text-[#D97706] font-medium cursor-pointer" 
                           onclick="scrollToSection('services')">
                            Services
                        </a>
                    </li>
                </ul>

                <!-- Logo TECH Center -->
                <div class="flex items-center gap-2">
                    <div class="bg-[#D97706] px-3 py-1 rounded-lg">
                        <span class="text-white font-bold text-lg tracking-wider">TECH</span>
                    </div>
                </div>

                <!-- Right Navigation -->
                <ul class="hidden lg:flex items-center space-x-8">
                    <li>
                        <a class="nav-link text-white hover:text-[#D97706] font-medium cursor-pointer" 
                           onclick="scrollToSection('portfolio')">
                            Réalisations
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white hover:text-[#D97706] font-medium cursor-pointer" 
                           onclick="scrollToSection('faq')">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white hover:text-[#D97706] font-medium cursor-pointer" 
                           onclick="scrollToSection('contact')">
                            Contact
                        </a>
                    </li>
                </ul>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="lg:hidden text-white focus:outline-none hamburger p-2">
                    <div class="w-6 h-5 flex flex-col justify-between">
                        <span class="hamburger-line line-1 w-full h-0.5 bg-white rounded"></span>
                        <span class="hamburger-line line-2 w-full h-0.5 bg-white rounded"></span>
                        <span class="hamburger-line line-3 w-full h-0.5 bg-white rounded"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile menu (séparé, fullscreen overlay) -->
        <div id="mobile-menu" class="fixed inset-0 bg-white/98 backdrop-blur-lg hidden lg:hidden z-50 transition-all">
            <div class="flex flex-col h-full p-6">
                
                <!-- Header du menu mobile -->
                <div class="flex justify-between items-center mb-12">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-full flex items-center justify-center">
                            <span class="text-black font-bold text-xl">M</span>
                        </div>
                    </div>
                    <button onclick="toggleMobileMenu()" class="text-black p-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Menu items -->
                <ul class="space-y-3">
                    <li>
                        <a class="flex items-center gap-4 px-6 py-4 text-black font-semibold text-lg hover:bg-[#D97706] rounded-xl transition-all cursor-pointer group" 
                           onclick="scrollToSection('accueil'); toggleMobileMenu()">
                            <svg class="w-6 h-6 text-[#D97706] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-4 px-6 py-4 text-black font-semibold text-lg hover:bg-[#D97706] rounded-xl transition-all cursor-pointer group" 
                           onclick="scrollToSection('approche'); toggleMobileMenu()">
                            <svg class="w-6 h-6 text-[#D97706] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            À propos
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-4 px-6 py-4 text-black font-semibold text-lg hover:bg-[#D97706] rounded-xl transition-all cursor-pointer group" 
                           onclick="scrollToSection('services'); toggleMobileMenu()">
                            <svg class="w-6 h-6 text-[#D97706] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Services
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-4 px-6 py-4 text-black font-semibold text-lg hover:bg-[#D97706] rounded-xl transition-all cursor-pointer group" 
                           onclick="scrollToSection('portfolio'); toggleMobileMenu()">
                            <svg class="w-6 h-6 text-[#D97706] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Réalisations
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-4 px-6 py-4 text-black font-semibold text-lg hover:bg-[#D97706] rounded-xl transition-all cursor-pointer group" 
                           onclick="scrollToSection('faq'); toggleMobileMenu()">
                            <svg class="w-6 h-6 text-[#D97706] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-4 px-6 py-4 text-black font-semibold text-lg hover:bg-[#D97706] rounded-xl transition-all cursor-pointer group" 
                           onclick="scrollToSection('contact'); toggleMobileMenu()">
                            <svg class="w-6 h-6 text-[#D97706] group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="accueil" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white via-orange-50 to-orange-100 relative overflow-hidden px-4 pt-24 pb-20">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-orange-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-orange-400 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10 max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-8">
                
                <!-- Photo -->
                <div class="flex-shrink-0">
                    <div class="overflow-hidden rounded-2xl shadow-2xl">
                        <img src="{{ $profile['photo'] ?? 'https://via.placeholder.com/300x400' }}" 
                             alt="{{ $profile['name'] }}" 
                             class="w-64 h-80 object-cover">
                    </div>
                </div>
                
                <!-- Content -->
                <div class="text-left space-y-6">
                    <h1 class="text-5xl md:text-6xl font-bold text-black animate-fade-in">
                        {{ $profile['name'] }}
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-black border-l-4 border-[#D97706] pl-4">
                        — <span class="text-black font-semibold">{{ $profile['title'] }}</span>
                    </p>
                    
                    <p class="text-lg md:text-xl text-black leading-relaxed">
                        {!! str_replace(
                            ['transformer', 'solutions digitales'],
                            ['<span class="text-black font-bold">transformer</span></br> ', '<span class="text-black font-bold">solutions digitales</span>'],
                            $profile['description']
                        ) !!}
                    </p>
                    
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="#services" 
                           onclick="scrollToSection('services')"
                           class="inline-block px-8 py-4 bg-[#D97706] hover:bg-[#EA580C] text-white text-lg font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            Mes services
                        </a>
                        <a href="https://calendly.com/maurice-codjo95/30min" 
                           target="_blank"
                           class="inline-flex items-center gap-2 px-8 py-4 bg-black hover:bg-black text-white text-lg font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Appel gratuit
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- APPROCHE SECTION -->
    <section id="approche" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white via-orange-50 to-orange-100 py-20 px-4">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold text-black mb-6">
                    Mon Approche : Du Code au Business
                </h2>
                <p class="text-xl md:text-2xl text-black max-w-4xl mx-auto leading-relaxed">
                    Je ne suis pas qu'un développeur, je suis un <span class="text-[#D97706] font-bold">partenaire de croissance</span>.
                </p>
                <p class="text-lg text-black mt-4 max-w-3xl mx-auto">
                    Trop de projets web échouent parce qu'ils se concentrent uniquement sur la technique. 
                    Mon approche est différente : <strong>je pense produit avant de penser code</strong>.
                </p>
            </div>

            <!-- Méthodologie en 4 phases -->
            <div class="space-y-12">
                
                <!-- Phase 1: Stratégie Produit -->
                <div class="bg-white border-2 border-[#D97706]/30 rounded-2xl p-8 hover:border-[#D97706] transition-all duration-300 hover:shadow-2xl">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">1</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-black mb-4 flex items-center gap-3">
                                <svg class="w-8 h-8 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                                Stratégie Produit
                            </h3>
                            <p class="text-lg text-black mb-6">
                                Avant d'écrire une ligne de code, je pose les bonnes questions :
                            </p>
                            <ul class="grid md:grid-cols-2 gap-4">
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black"><strong>Quel problème</strong> résout ton projet ?</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black"><strong>Qui sont</strong> tes utilisateurs cibles ?</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black"><strong>Quelle est</strong> ta proposition de valeur unique ?</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black"><strong>Comment vas-tu</strong> générer des revenus ?</span>
                                </li>
                            </ul>
                            <div class="mt-6 bg-[#D97706]/10 border-l-4 border-[#D97706] p-4 rounded-r-lg">
                                <p class="text-black font-semibold">✨ Résultat : Un positionnement clair qui attire les bons utilisateurs.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phase 2: Conception Orientée Conversion -->
                <div class="bg-white border-2 border-[#D97706]/30 rounded-2xl p-8 hover:border-[#D97706] transition-all duration-300 hover:shadow-2xl">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">2</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-black mb-4 flex items-center gap-3">
                                <svg class="w-8 h-8 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                                Conception Orientée Conversion
                            </h3>
                            <p class="text-lg text-black mb-6">
                                Je ne design pas pour faire joli, mais pour <strong>convertir des visiteurs en clients</strong> :
                            </p>
                            <ul class="grid md:grid-cols-2 gap-4">
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Parcours utilisateur optimisé</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">UX/UI pensée business</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Tunnels de conversion testés</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Psychologie de l'utilisateur</span>
                                </li>
                            </ul>
                            <div class="mt-6 bg-[#D97706]/10 border-l-4 border-[#D97706] p-4 rounded-r-lg">
                                <p class="text-black font-semibold">✨ Résultat : Des interfaces qui transforment le trafic en chiffre d'affaires.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phase 3: Développement Full-Stack -->
                <div class="bg-white border-2 border-[#D97706]/30 rounded-2xl p-8 hover:border-[#D97706] transition-all duration-300 hover:shadow-2xl">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">3</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-black mb-4 flex items-center gap-3">
                                <svg class="w-8 h-8 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                                Développement Full-Stack Pro
                            </h3>
                            <p class="text-lg text-black mb-6">
                                Une fois la stratégie validée, je passe à l'exécution technique :
                            </p>
                            
                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Backend -->
                                <div class="bg-black/5 rounded-xl p-6">
                                    <h4 class="text-xl font-bold text-black mb-4 flex items-center gap-2">
                                        <svg class="w-6 h-6 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                        </svg>
                                        Backend solide
                                    </h4>
                                    <ul class="space-y-2">
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>Architecture Laravel scalable</span>
                                        </li>
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>API RESTful propres</span>
                                        </li>
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>Sécurité renforcée</span>
                                        </li>
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>Base de données optimisée</span>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Frontend -->
                                <div class="bg-black/5 rounded-xl p-6">
                                    <h4 class="text-xl font-bold text-black mb-4 flex items-center gap-2">
                                        <svg class="w-6 h-6 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        Frontend moderne
                                    </h4>
                                    <ul class="space-y-2">
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>Interfaces responsive et rapides</span>
                                        </li>
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>JavaScript dynamique</span>
                                        </li>
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>Intégration paiements</span>
                                        </li>
                                        <li class="flex items-start gap-2 text-black">
                                            <span class="text-[#D97706] mt-1">▸</span>
                                            <span>SEO et performance</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="mt-6 bg-[#D97706]/10 border-l-4 border-[#D97706] p-4 rounded-r-lg">
                                <p class="text-black font-semibold">✨ Résultat : Un produit technique fiable, rapide et professionnel.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phase 4: Intelligence Artificielle -->
                <div class="bg-white border-2 border-[#D97706]/30 rounded-2xl p-8 hover:border-[#D97706] transition-all duration-300 hover:shadow-2xl">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">4</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-black mb-4 flex items-center gap-3">
                                <svg class="w-8 h-8 text-[#D97706]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                                Intelligence Artificielle Appliquée
                            </h3>
                            <p class="text-lg text-black mb-6">
                                J'intègre l'IA comme <strong>levier de valeur</strong>, pas comme gadget :
                            </p>
                            <ul class="grid md:grid-cols-2 gap-4">
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Automatisation intelligente</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Optimisation de contenu</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Assistants virtuels</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-[#D97706] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-black">Analyse prédictive</span>
                                </li>
                            </ul>
                            <div class="mt-6 bg-[#D97706]/10 border-l-4 border-[#D97706] p-4 rounded-r-lg">
                                <p class="text-black font-semibold">✨ Résultat : Ton produit travaille pour toi 24/7, même quand tu dors.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Ce qui me différencie -->
            <div class="mt-16 bg-black rounded-2xl p-8 md:p-12">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-8 text-center">
                    Ce qui me différencie
                </h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b-2 border-[#D97706]">
                                <th class="pb-4 pr-6 text-white font-semibold text-lg">Développeur classique</th>
                                <th class="pb-4 pl-6 text-[#D97706] font-semibold text-lg">Mon approche</th>
                            </tr>
                        </thead>
                        <tbody class="text-base">
                            <tr class="border-b border-white/10">
                                <td class="py-4 pr-6 text-white/70">"Je code ce que tu demandes"</td>
                                <td class="py-4 pl-6 text-white font-semibold">"Je challenge ton idée pour la rendre rentable"</td>
                            </tr>
                            <tr class="border-b border-white/10">
                                <td class="py-4 pr-6 text-white/70">Focus sur les fonctionnalités</td>
                                <td class="py-4 pl-6 text-white font-semibold">Focus sur le ROI et l'impact business</td>
                            </tr>
                            <tr class="border-b border-white/10">
                                <td class="py-4 pr-6 text-white/70">Livre le projet et disparaît</td>
                                <td class="py-4 pl-6 text-white font-semibold">Accompagne jusqu'au lancement et au-delà</td>
                            </tr>
                            <tr>
                                <td class="py-4 pr-6 text-white/70">Pense technique uniquement</td>
                                <td class="py-4 pl-6 text-white font-semibold">Pense produit, marché, monétisation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Types de projets -->
            <div class="mt-16">
                <h3 class="text-3xl md:text-4xl font-bold text-black mb-8 text-center">
                    Types de projets où j'excelle
                </h3>
                
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white border-2 border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all">
                        <div class="text-[#D97706] text-2xl mb-2">✓</div>
                        <h4 class="font-bold text-black text-lg mb-2">SaaS & Micro-SaaS</h4>
                        <p class="text-black text-sm">Abonnements récurrents, gestion utilisateurs</p>
                    </div>
                    
                    <div class="bg-white border-2 border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all">
                        <div class="text-[#D97706] text-2xl mb-2">✓</div>
                        <h4 class="font-bold text-black text-lg mb-2">Plateformes complexes</h4>
                        <p class="text-black text-sm">Marketplace, job board, e-learning</p>
                    </div>
                    
                    <div class="bg-white border-2 border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all">
                        <div class="text-[#D97706] text-2xl mb-2">✓</div>
                        <h4 class="font-bold text-black text-lg mb-2">Outils IA</h4>
                        <p class="text-black text-sm">Automatisation, optimisation, assistants</p>
                    </div>
                    
                    <div class="bg-white border-2 border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all">
                        <div class="text-[#D97706] text-2xl mb-2">✓</div>
                        <h4 class="font-bold text-black text-lg mb-2">MVP rapides</h4>
                        <p class="text-black text-sm">Valider une idée en 2-4 semaines</p>
                    </div>
                    
                    <div class="bg-white border-2 border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all">
                        <div class="text-[#D97706] text-2xl mb-2">✓</div>
                        <h4 class="font-bold text-black text-lg mb-2">Extensions Chrome</h4>
                        <p class="text-black text-sm">Productivité, scraping, automatisation</p>
                    </div>
                    
                    <div class="bg-white border-2 border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all">
                        <div class="text-[#D97706] text-2xl mb-2">✓</div>
                        <h4 class="font-bold text-black text-lg mb-2">Produits digitaux</h4>
                        <p class="text-black text-sm">Ebooks interactifs, templates, systèmes</p>
                    </div>
                </div>
            </div>

            <!-- Citation philosophie -->
            <div class="mt-16 text-center">
                <div class="inline-block bg-gradient-to-r from-[#D97706] to-[#EA580C] p-8 rounded-2xl">
                    <p class="text-white text-2xl md:text-3xl font-bold italic max-w-4xl">
                        "Un bon projet digital = Problème réel + Solution technique + Modèle business viable"
                    </p>
                </div>
                <p class="mt-8 text-black text-lg max-w-3xl mx-auto">
                    Je ne me contente pas de livrer du code propre. Je livre des <strong class="text-[#D97706]">solutions qui génèrent des résultats mesurables</strong> : utilisateurs, revenus, croissance.
                </p>
            </div>

            <!-- CTA -->
            <div class="mt-16 text-center">
                <h3 class="text-3xl font-bold text-black mb-6">
                    Tu veux construire quelque chose qui compte ?
                </h3>
                <p class="text-lg text-black mb-8">
                    Si tu cherches quelqu'un qui code <strong>ET</strong> qui pense business, parlons de ton projet.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="https://wa.me/22967828146" 
                       target="_blank"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-[#D97706] hover:bg-[#EA580C] text-white text-lg font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"></path>
                        </svg>
                        WhatsApp
                    </a>
                    <a href="mailto:mauricecodjo@gmail.com" 
                       class="inline-flex items-center gap-2 px-8 py-4 bg-black hover:bg-black/80 text-white text-lg font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Email
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services" class="min-h-screen flex items-center justify-center bg-white py-20 px-4">
        <div class="max-w-7xl mx-auto">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">
                    Mes Services
                </h2>
                <p class="text-xl text-black max-w-2xl mx-auto">
                    Des solutions web adaptées à vos besoins et à votre budget
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white border border-[#D97706]/30 rounded-xl p-8 hover:border-[#D97706] transition-all duration-300 hover:shadow-xl hover:shadow-[#0891B2]/20 group">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $service['icon'] !!}
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-black mb-4">
                            {{ $service['title'] }}
                        </h3>
                        
                        <p class="text-black mb-6 leading-relaxed">
                            {{ $service['description'] }}
                        </p>
                        
                        <ul class="space-y-2">
                            @foreach($service['features'] as $feature)
                                <li class="flex items-center gap-2 text-black">
                                    <svg class="w-5 h-5 text-[#D97706] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- PORTFOLIO SECTION -->
    <section id="portfolio" class="min-h-screen bg-gradient-to-br from-white via-orange-50 to-orange-100 py-20 px-4">
        <div class="max-w-7xl mx-auto">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">
                    Mes Réalisations
                </h2>
                <p class="text-xl text-black">
                    Découvrez un aperçu de mes projets récents
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button onclick="filterProjects('all')" 
                        class="filter-btn active px-6 py-3 bg-[#D97706] hover:bg-white text-black font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                    Tous les projets
                </button>
                <button onclick="filterProjects('web')" 
                        class="filter-btn px-6 py-3 bg-[#EA580C]/60 hover:bg-[#D97706] text-black font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 border border-[#D97706]/30">
                    Sites Web
                </button>
                <button onclick="filterProjects('ecommerce')" 
                        class="filter-btn px-6 py-3 bg-[#EA580C]/60 hover:bg-[#D97706] text-black font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 border border-[#D97706]/30">
                    E-commerce
                </button>
                <button onclick="filterProjects('app')" 
                        class="filter-btn px-6 py-3 bg-[#EA580C]/60 hover:bg-[#D97706] text-black font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 border border-[#D97706]/30">
                    Applications
                </button>
            </div>

            <!-- Projects Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($projects as $project)
                    <div class="project-card bg-black rounded-lg overflow-hidden shadow-lg hover:shadow-[#D97706]/50 transition-all duration-300 transform hover:scale-105 border border-[#D97706]/20" data-category="{{ $project['category'] }}">
                        
                        <div class="h-32 bg-gradient-to-br from-[#D97706] to-[#EA580C] overflow-hidden">
                            @if($project['image'])
                                <img src="{{ $project['image'] }}" 
                                     alt="{{ $project['title'] }}" 
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            @endif
                        </div>
                        
                        <div class="p-4 space-y-2">
                            <h3 class="text-lg font-bold text-white">
                                {{ $project['title'] }}
                            </h3>
                            
                            <p class="text-xs text-white leading-relaxed">
                                {{ $project['description'] }}
                            </p>
                            
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                @foreach($project['technologies'] as $tech)
                                    <span class="px-2 py-0.5 bg-[#D97706] text-white text-xs rounded-full">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                            
                            <div class="pt-2">
                                <a href="{{ $project['link'] }}" 
                                   target="_blank"
                                   class="inline-flex items-center gap-1 text-[#D97706] hover:text-white text-xs font-semibold transition-colors">
                                    Voir le projet
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Stats Section -->
            <div class="mt-16 bg-white/80 backdrop-blur-sm rounded-2xl p-8 border border-[#D97706]/40 shadow-2xl">
                <h3 class="text-3xl font-bold text-black text-center mb-8">Quelques chiffres</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center group">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-[#D97706] to-[#EA580C] mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-[#D97706] mb-2">{{ $stats['experience'] }}</div>
                        <div class="text-black text-sm uppercase tracking-wide">Années d'expérience</div>
                    </div>
                    
                    <div class="text-center group">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-[#D97706] to-[#EA580C] mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-[#D97706] mb-2">{{ $stats['projects'] }}+</div>
                        <div class="text-black text-sm uppercase tracking-wide">Projets réalisés</div>
                    </div>
                    
                    <div class="text-center group">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-[#D97706] to-[#EA580C] mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-[#D97706] mb-2">{{ $stats['clients'] }}+</div>
                        <div class="text-black text-sm uppercase tracking-wide">Clients satisfaits</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FAQ SECTION -->
    <section id="faq" class="min-h-screen flex items-center justify-center bg-white py-20 px-4">
        <div class="max-w-4xl mx-auto w-full">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">
                    Questions Fréquentes
                </h2>
                <p class="text-xl text-black">
                    Les réponses aux questions que mes clients me posent souvent
                </p>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white border-2 border-black rounded-xl overflow-hidden hover:border-[#D97706] transition-all">
                        <button onclick="toggleFaq({{ $index }})" 
                                class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 group">
                            <span class="text-lg font-semibold text-black group-hover:text-[#D97706] transition-colors">
                                {{ $faq['question'] }}
                            </span>
                            <svg id="icon-{{ $index }}" class="w-6 h-6 text-[#D97706] transform transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="faq-{{ $index }}" class="hidden px-6 pb-5">
                            <p class="text-black leading-relaxed">
                                {{ $faq['answer'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section id="testimonials" class="min-h-screen flex items-center justify-center bg-white py-20 px-4">
        <div class="max-w-7xl mx-auto">
            
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-black mb-4">
                    Mes clients parlent mieux que moi
                </h2>
                <p class="text-xl text-black">
                    Découvrez ce qu'ils disent de mes services
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                    <div class="bg-white border border-[#D97706]/30 rounded-xl p-6 hover:border-[#D97706] transition-all duration-300 hover:shadow-xl hover:shadow-[#0891B2]/20">
                        <div class="flex gap-1 mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 text-[#D97706]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        
                        <p class="text-black mb-6 leading-relaxed italic">
                            "{{ $testimonial['message'] }}"
                        </p>
                        
                        <div class="flex items-center gap-3 pt-4 border-t border-[#D97706]/30">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#D97706] to-[#EA580C] rounded-full flex items-center justify-center">
                                <span class="text-black font-bold text-lg">
                                    {{ substr($testimonial['name'], 0, 1) }}
                                </span>
                            </div>
                            <div>
                                <div class="text-black font-semibold">{{ $testimonial['name'] }}</div>
                                <div class="text-black text-sm">{{ $testimonial['role'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="min-h-screen flex items-center justify-center bg-black py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Vous avez un projet en tête ?
            </h2>
            <p class="text-xl text-white mb-10 max-w-2xl mx-auto">
                Discutons de votre projet et voyons comment je peux vous aider à le concrétiser
            </p>
            
            <div class="flex flex-wrap gap-6 justify-center">
                <a href="https://wa.me/22941815387?text=Bonjour%20Maurice,%20j'ai%20un%20projet%20web" 
                   target="_blank"
                   class="inline-flex items-center gap-3 px-10 py-5 bg-[#25D366] hover:bg-[#20BA5A] text-black text-xl font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Par WhatsApp
                </a>
                
                <a href="mailto:maurice.codjo95@gmail.com" 
                   class="inline-flex items-center gap-3 px-10 py-5 bg-white hover:bg-white text-[#D97706] text-xl font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Par Email
                </a>
            </div>

            <!-- Contact Info -->
            <div class="mt-12 grid md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-6 h-6 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <h4 class="font-semibold">WhatsApp</h4>
                    </div>
                    <p class="text-white">+229 01 41 81 53 87</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h4 class="font-semibold">Localisation</h4>
                    </div>
                    <p class="text-white">Porto-Novo, Bénin</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-[#D97706]/20 py-8 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <div class="flex justify-center gap-6 mb-6">
                <a href="https://github.com/Mcodjo" target="_blank" class="text-black hover:text-[#D97706] transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/maurice-codjo-6a82b82a3/" target="_blank" class="text-black hover:text-[#D97706] transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </a>
            </div>
            <p class="text-black">© 2026 {{ $profile['name'] }}. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Smooth scroll to section
        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (!element) return;
            
            const navHeight = document.getElementById('navbar').offsetHeight;
            const elementPosition = element.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - navHeight - 20;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }

        // Toggle mobile menu
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('mobile-menu-button');
            if (mobileMenu && hamburger) {
                mobileMenu.classList.toggle('hidden');
                hamburger.classList.toggle('hamburger-active');
            }
        }

        // Initialize after DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', toggleMobileMenu);
            }
        });

        // Toggle FAQ
        function toggleFaq(index) {
            const faqContent = document.getElementById(`faq-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            
            faqContent.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Filter projects
        function filterProjects(category) {
            const projects = document.querySelectorAll('.project-card');
            const buttons = document.querySelectorAll('.filter-btn');
            
            buttons.forEach(btn => {
                btn.classList.remove('active', 'bg-[#D97706]');
                btn.classList.add('bg-[#EA580C]/60', 'border', 'border-[#D97706]/30');
            });
            
            event.target.classList.add('active', 'bg-[#D97706]');
            event.target.classList.remove('bg-[#EA580C]/60', 'border', 'border-[#D97706]/30');
            
            projects.forEach(project => {
                if (category === 'all' || project.dataset.category === category) {
                    project.style.display = 'block';
                    setTimeout(() => {
                        project.style.opacity = '1';
                        project.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    project.style.opacity = '0';
                    project.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        project.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = ['accueil', 'services', 'portfolio', 'faq', 'contact'];
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            sections.forEach(section => {
                const element = document.getElementById(section);
                if (element) {
                    const rect = element.getBoundingClientRect();
                    if (rect.top <= 100 && rect.bottom >= 100) {
                        current = section;
                    }
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('onclick')?.includes(current)) {
                    link.classList.add('active');
                }
            });
        });
    </script>

</body>
</html>
