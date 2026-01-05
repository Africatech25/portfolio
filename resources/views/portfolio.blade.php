@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

<!-- Portfolio Section -->
<section class="min-h-screen bg-gradient-to-br from-[#0E0E0E] via-[#9D4E12] to-[#23180F] pt-24 pb-20 px-4">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">
                Mes Projets
            </h1>
            <p class="text-xl text-gray-300">
                Découvrez mes réalisations et projets récents
            </p>
        </div>

        <!-- Projects Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($projects as $project)
                <div class="bg-[#23180F]/60 backdrop-blur-sm rounded-lg overflow-hidden shadow-lg hover:shadow-[#9D4E12]/50 transition-all duration-300 transform hover:scale-105">
                    
                    <!-- Project Image -->
                    <div class="h-32 bg-gradient-to-br from-[#593A27] to-[#9D4E12] overflow-hidden">
                        @if($project['image'])
                            <img src="{{ $project['image'] }}" 
                                 alt="{{ $project['title'] }}" 
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        @endif
                    </div>
                    
                    <!-- Project Content -->
                    <div class="p-4 space-y-2">
                        <!-- Title -->
                        <h3 class="text-lg font-bold text-white">
                            {{ $project['title'] }}
                        </h3>
                        
                        <!-- Description -->
                        <p class="text-xs text-gray-300 leading-relaxed">
                            {{ $project['description'] }}
                        </p>
                        
                        <!-- Technologies -->
                        <div class="flex flex-wrap gap-1.5 pt-1">
                            @foreach($project['technologies'] as $tech)
                                <span class="px-2 py-0.5 bg-[#9D4E12] text-white text-xs rounded-full">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                        
                        <!-- Link -->
                        <div class="pt-2">
                            <a href="{{ $project['link'] }}" 
                               target="_blank"
                               class="inline-flex items-center gap-1 text-[#9D4E12] hover:text-white text-xs font-semibold transition-colors">
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
        <div class="mt-16 bg-[#0E0E0E]/80 backdrop-blur-sm rounded-2xl p-8 border border-[#9D4E12]/40 shadow-2xl">
            <h2 class="text-3xl font-bold text-white text-center mb-8">Quelques chiffres</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-[#9D4E12] to-[#593A27] mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-[#9D4E12] mb-2">{{ $stats['experience'] }}</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wide">Années d'expérience</div>
                </div>
                
                <div class="text-center group">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-[#9D4E12] to-[#593A27] mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-[#9D4E12] mb-2">{{ $stats['projects'] }}+</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wide">Projets réalisés</div>
                </div>
                
                <div class="text-center group">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-[#9D4E12] to-[#593A27] mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-[#9D4E12] mb-2">{{ $stats['clients'] }}+</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wide">Clients satisfaits</div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection