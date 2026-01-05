@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

<!-- Hero Section with Two Column Layout -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#0E0E0E] via-[#9D4E12] to-[#23180F] relative overflow-hidden px-4 pt-24 pb-20">
    <!-- Decorative elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#9D4E12] rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#593A27] rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative z-10 max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row items-center">
            
            <!-- Left Column - Photo -->
            <div class="flex-shrink-0">
                <div class="overflow-hidden rounded-2xl shadow-2xl">
                    <img src="{{ $profile['photo'] ?? 'https://via.placeholder.com/300x400' }}" 
                         alt="{{ $profile['name'] }}" 
                         class="w-64 h-80 object-cover">
                </div>
            </div>
            
            <!-- Right Column - Content -->
            <div class="text-left space-y-6 md:pl-8">
                <!-- Name -->
                <h1 class="text-5xl md:text-6xl font-bold text-white animate-fade-in">
                    {{ $profile['name'] }}
                </h1>
                
                <!-- Title -->
                <p class="text-xl md:text-2xl text-gray-300 border-l-4 border-[#9D4E12] pl-4">
                    — <span class="text-black font-semibold">{{ $profile['title'] }}</span>
                </p>
                
                <!-- Description -->
                <p class="text-lg md:text-xl text-gray-200 leading-relaxed">
                    {!! str_replace(
                        ['transformer', 'solutions digitales'],
                        ['<span class="text-black font-bold">transformer</span></br> ', '<span class="text-black font-bold">solutions digitales</span>'],
                        $profile['description']
                    ) !!}
                </p>
                
                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="{{ url('/portfolio') }}" 
                       class="inline-block px-8 py-4 bg-[#9D4E12] hover:bg-[#593A27] text-white text-lg font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        Voir mes projets
                    </a>
                    <a href="https://calendly.com/maurice-codjo95/30min" 
                       target="_blank"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-white hover:bg-gray-100 text-[#9D4E12] text-lg font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Profitez d'un appel gratuit
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

<style>
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

@endsection