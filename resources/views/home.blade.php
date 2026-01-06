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

<!-- Services Section -->
<section class="min-h-screen flex items-center justify-center bg-[#0E0E0E] py-20 px-4">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Mes Services
            </h2>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Des solutions web adaptées à vos besoins et à votre budget
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-gradient-to-br from-[#23180F] to-[#0E0E0E] border border-[#9D4E12]/30 rounded-xl p-8 hover:border-[#9D4E12] transition-all duration-300 hover:shadow-xl hover:shadow-[#9D4E12]/20 group">
                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-[#9D4E12] to-[#593A27] rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $service['icon'] !!}
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-white mb-4">
                        {{ $service['title'] }}
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        {{ $service['description'] }}
                    </p>
                    
                    <!-- Features -->
                    <ul class="space-y-2">
                        @foreach($service['features'] as $feature)
                            <li class="flex items-center gap-2 text-gray-300">
                                <svg class="w-5 h-5 text-[#9D4E12] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
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

<!-- FAQ Section -->
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#0E0E0E] via-[#23180F] to-[#0E0E0E] py-20 px-4">
    <div class="max-w-4xl mx-auto w-full">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Questions Fréquentes
            </h2>
            <p class="text-xl text-gray-400">
                Les réponses aux questions que mes clients me posent souvent
            </p>
        </div>

        <!-- FAQ Accordion -->
        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
                <div class="bg-[#23180F]/60 backdrop-blur-sm border border-[#9D4E12]/30 rounded-xl overflow-hidden hover:border-[#9D4E12]/60 transition-all">
                    <button onclick="toggleFaq({{ $index }})" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between gap-4 group">
                        <span class="text-lg font-semibold text-white group-hover:text-[#9D4E12] transition-colors">
                            {{ $faq['question'] }}
                        </span>
                        <svg id="icon-{{ $index }}" class="w-6 h-6 text-[#9D4E12] transform transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq-{{ $index }}" class="hidden px-6 pb-5">
                        <p class="text-gray-400 leading-relaxed">
                            {{ $faq['answer'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Testimonials Section -->
<section class="min-h-screen flex items-center justify-center bg-[#0E0E0E] py-20 px-4">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Mes clients parlent mieux que moi
            </h2>
            <p class="text-xl text-gray-400">
                Découvrez ce qu'ils disent de mes services
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="bg-gradient-to-br from-[#23180F] to-[#0E0E0E] border border-[#9D4E12]/30 rounded-xl p-6 hover:border-[#9D4E12] transition-all duration-300 hover:shadow-xl hover:shadow-[#9D4E12]/20">
                    <!-- Stars -->
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-[#9D4E12]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                    
                    <!-- Message -->
                    <p class="text-gray-300 mb-6 leading-relaxed italic">
                        "{{ $testimonial['message'] }}"
                    </p>
                    
                    <!-- Author -->
                    <div class="flex items-center gap-3 pt-4 border-t border-[#9D4E12]/30">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#9D4E12] to-[#593A27] rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">
                                {{ substr($testimonial['name'], 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <div class="text-white font-semibold">{{ $testimonial['name'] }}</div>
                            <div class="text-gray-500 text-sm">{{ $testimonial['role'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Final CTA Section -->
<section class="min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-[#9D4E12] via-[#593A27] to-[#23180F] py-20 px-4">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Vous avez un projet en tête ?
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Discutons de votre projet et voyons comment je peux vous aider à le concrétiser
        </p>
        
        <div class="flex flex-wrap gap-6 justify-center">
            <a href="https://wa.me/22941815387?text=Bonjour%20Maurice,%20j'ai%20un%20projet%20web" 
               target="_blank"
               class="inline-flex items-center gap-3 px-10 py-5 bg-[#25D366] hover:bg-[#20BA5A] text-white text-xl font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Par WhatsApp
            </a>
            
            <a href="{{ url('/contact') }}" 
               class="inline-flex items-center gap-3 px-10 py-5 bg-white hover:bg-gray-100 text-[#9D4E12] text-xl font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                Voir les coordonnées
            </a>
        </div>
    </div>
</section>

<script>
    function toggleFaq(index) {
        const faqContent = document.getElementById(`faq-${index}`);
        const icon = document.getElementById(`icon-${index}`);
        
        faqContent.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>

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