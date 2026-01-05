<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Custom color palette */
        :root {
            --color-primary: #0E0E0E;
            --color-accent: #9D4E12;
            --color-dark: #23180F;
            --color-brown: #593A27;
        }
        
        /* Navbar with site colors */
        .glass-nav {
            background: rgba(14, 14, 14, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(157, 78, 18, 0.2);
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
            background: #9D4E12;
            transition: transform 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
        }
        
        /* Glow effect on CTA */
        .glow-btn {
            box-shadow: 0 0 20px rgba(157, 78, 18, 0.5);
            transition: all 0.3s ease;
        }
        
        .glow-btn:hover {
            box-shadow: 0 0 30px rgba(157, 78, 18, 0.8);
            transform: translateY(-2px);
        }
        
        /* Mobile menu animation */
        .mobile-menu-enter {
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
    </style>
</head>
<body class="bg-gray-50">

    <!-- NAVBAR - Centered Navigation Design -->
    <nav id="navbar" class="glass-nav fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center items-center py-5 relative">
                
                <!-- Desktop menu - Centered -->
                <ul class="hidden md:flex items-center space-x-12">
                    <li>
                        <a class="nav-link text-gray-200 hover:text-white font-medium text-lg {{ request()->is('home') ? 'active' : '' }}" 
                           href="{{ url('/') }}">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                Accueil
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-gray-200 hover:text-white font-medium text-lg {{ request()->is('portfolio') ? 'active' : '' }}" 
                           href="{{ url('/portfolio') }}">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                Portfolio
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-gray-200 hover:text-white font-medium text-lg {{ request()->is('contact') ? 'active' : '' }}" 
                           href="{{ url('/contact') }}">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Contact
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="glow-btn px-8 py-3 bg-[#9D4E12] hover:bg-[#593A27] text-white rounded-full font-semibold" 
                           href="{{ url('/contact') }}">
                            Collaborer
                        </a>
                    </li>
                </ul>

                <!-- Mobile menu button with animation -->
                <button id="mobile-menu-button" class="md:hidden absolute right-0 text-white focus:outline-none hamburger p-2">
                    <div class="w-6 h-5 flex flex-col justify-between">
                        <span class="hamburger-line line-1 w-full h-0.5 bg-white rounded"></span>
                        <span class="hamburger-line line-2 w-full h-0.5 bg-white rounded"></span>
                        <span class="hamburger-line line-3 w-full h-0.5 bg-white rounded"></span>
                    </div>
                </button>
            </div>

            <!-- Mobile menu with modern design -->
            <div id="mobile-menu" class="hidden md:hidden mobile-menu-enter">
                <ul class="pb-4 space-y-1">
                    <li>
                        <a class="flex items-center gap-3 px-4 py-3 text-gray-200 hover:bg-[#9D4E12]/20 rounded-lg transition {{ request()->is('home') ? 'bg-[#9D4E12]/20' : '' }}" 
                           href="{{ url('/home') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-3 px-4 py-3 text-gray-200 hover:bg-[#9D4E12]/20 rounded-lg transition {{ request()->is('portfolio') ? 'bg-[#9D4E12]/20' : '' }}" 
                           href="{{ url('/portfolio') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-3 px-4 py-3 text-gray-200 hover:bg-[#9D4E12]/20 rounded-lg transition {{ request()->is('contact') ? 'bg-[#9D4E12]/20' : '' }}" 
                           href="{{ url('/contact') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact
                        </a>
                    </li>
                    <li class="pt-2">
                        <a class="flex items-center justify-center gap-2 mx-4 px-6 py-3 bg-[#9D4E12] hover:bg-[#593A27] text-white rounded-lg font-semibold transition" 
                           href="{{ url('/contact') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Collaborer
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENU DES PAGES -->
    <div>
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="bg-[#0E0E0E] border-t border-[#9D4E12]/30">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid md:grid-cols-4 gap-6">
                
                <!-- About Section -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-bold text-white mb-2">Maurice CODJO</h3>
                    <p class="text-gray-400 text-sm mb-3 leading-relaxed">
                        Développeur Web & Mobile passionné, </br> je crée des solutions digitales performantes et innovantes.
                    </p>
                    <div class="flex gap-3">
                        <a href="https://github.com/Mcodjo" target="_blank" class="w-8 h-8 bg-[#9D4E12] hover:bg-[#593A27] rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/maurice-codjo-6a82b82a3/" target="_blank" class="w-8 h-8 bg-[#9D4E12] hover:bg-[#593A27] rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        <a href="mailto:maurice.codjo95@gmail.com" class="w-8 h-8 bg-[#9D4E12] hover:bg-[#593A27] rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div>
                    <h4 class="text-sm font-semibold text-white mb-3">Navigation</h4>
                    <ul class="space-y-1.5">
                        <li><a href="{{ url('/') }}" class="text-gray-400 text-sm hover:text-[#9D4E12] transition-colors">Accueil</a></li>
                        <li><a href="{{ url('/portfolio') }}" class="text-gray-400 text-sm hover:text-[#9D4E12] transition-colors">Portfolio</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-gray-400 text-sm hover:text-[#9D4E12] transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-sm font-semibold text-white mb-3">Contact</h4>
                    <ul class="space-y-1.5 text-gray-400 text-xs">
                        <li class="flex items-center gap-2">
                            <svg class="w-3 h-3 text-[#9D4E12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            maurice.codjo95@gmail.com
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-3 h-3 text-[#9D4E12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            +229 01 41 81 53 87
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-3 h-3 text-[#9D4E12]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Porto-Novo, Bénin
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-[#9D4E12]/30 mt-6 pt-4 text-center">
                <p class="text-gray-400 text-xs">
                    &copy; {{ date('Y') }} Tous droits réservés. | Développé par Maurice CODJO.
                </p>
            </div>
        </div>
    </footer>

    <!-- Enhanced Scripts -->
    <script>
        // Mobile menu toggle with animation
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburger = mobileMenuButton.querySelector('.hamburger');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            hamburger.classList.toggle('hamburger-active');
        });
        
        // Navbar scroll effect
        let lastScroll = 0;
        const navbar = document.getElementById('navbar');
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll <= 0) {
                navbar.style.boxShadow = 'none';
            } else {
                navbar.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.3)';
            }
            
            lastScroll = currentScroll;
        });
    </script>
</body>
</html>