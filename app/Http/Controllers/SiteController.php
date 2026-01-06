<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    // Données statiques pour votre portfolio
    private $skills = [
        'frontend' => ['Bootstrap', 'JavaScript', 'Tailwind', 'React', 'Tailwind'],
        'backend' => ['PHP', 'Laravel', 'Python', 'MySQL', 'PostgreSQL'],
        'tools' => ['Git','VS Code', 'Postman', 'Github']
    ];


    // Informations personnelles
    private $profile = [
        'name' => 'Maurice CODJO',
        'title' => 'Développeur Web & Mobile',
        'description' => 'Je transforme tes ambitions en applications web performantes qui font grandir ton business et captiver tes utilisateurs.',
        'photo' => '/images/hh.jpg',
        'highlight_words' => ['transformer', 'ambitions', 'applications web', 'business', 'captiver']
    ];

    private $projects = [

        [
            'title' => 'NEOTOKFLOW',
            'description' => 'La première plateforme pour accéder au programme de monétisation TikTok',
            'technologies' => ['PHP', 'JavaScript', 'MySQL', 'Kkiapay'],
            'image' => '/images/neo.png',
            'link' => 'https://neotokflow.com/',
            'category' => 'web'
        ],

        [
            'title' => 'DIDI JOBS CONNECT',
            'description' => 'Plateforme de mise en relation entre employeurs et chercheurs d\'emploi',
            'technologies' => ['PHP', 'MySQL', 'Tailwind'],
            'image' => '/images/acdidi.png',
            'link' => 'https://didijobsconnect.kesug.com',
            'category' => 'web'
        ],

        [
            'title' => 'Portfolio Personnel',
            'description' => 'Site web personnel pour présenter mes projets et compétences',
            'technologies' => ['HTML', 'CSS', 'JavaScript'],
            'image' => '/images/port.png',
            'link' => 'https://github.com/...',
            'category' => 'web'
        ],

        [
            'title' => 'Blog IA',
            'description' => 'Blog présentant des articles sur l\'intelligence artificielle',
            'technologies' => ['Tailwind', 'PHP', 'MySQL','Vibecoding'],
            'image' => '/images/digital.png',
            'link' => 'https://digitaletconscience.free.nf/',
            'category' => 'web'
        ],

        [
            'title' => 'Site d\'inscription concour Miss Mélénine',
            'description' => 'Site web pour l\'inscription au concours Miss Mélénine',
            'technologies' => ['WordPress', 'Elementor'],
            'image' => '/images/miss.png',
            'link' => 'https://missmelanine.com/',
            'category' => 'web'
        ],

        [
            'title' => 'BugTrack AI',
            'description' => 'Le suivi de bugs
            propulsé par l\'IA pour des résolutions plus rapides et intelligentes.',
            'technologies' => ['Vibecoding (Google AI STUDIO)'],
            'image' => '/images/bugtrack.png',
            'link' => 'https://aistudio.google.com/apps/drive/1zTxhe1OeATwBPwBWaePO8Qhf5HMM_6dM?resourceKey=&showPreview=true',
            'category' => 'app'
        ]
    ];

    private $services = [
        [
            'title' => 'Sites Vitrines',
            'description' => 'Des sites web élégants et performants pour présenter votre activité et attirer vos clients.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>',
            'features' => ['Design moderne et responsive', 'Optimisé SEO', 'Hébergement et domaine inclus', 'Facile à mettre à jour']
        ],
        [
            'title' => 'E-commerce',
            'description' => 'Boutiques en ligne complètes avec paiement sécurisé pour vendre vos produits 24/7.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>',
            'features' => ['Catalogue produits', 'Paiement en ligne sécurisé', 'Gestion des stocks', 'Tableau de bord admin']
        ],
        [
            'title' => 'Applications Web',
            'description' => 'Applications sur mesure pour automatiser vos processus et gagner en productivité.',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>',
            'features' => ['Solutions sur mesure', 'Interface intuitive', 'Sécurité renforcée', 'Support technique']
        ]
    ];

    private $faqs = [
        [
            'question' => 'Combien coûte la création d\'un site web ?',
            'answer' => 'Le tarif varie selon vos besoins : site vitrine simple à partir de 250 000 FCFA, boutique en ligne à partir de 500 000 FCFA. Je propose des devis personnalisés après étude de votre projet.'
        ],
        [
            'question' => 'Puis-je gérer mon site moi-même après livraison ?',
            'answer' => 'Absolument ! Je crée des sites faciles à administrer. Je vous forme à la gestion de contenu (textes, images, produits) via une interface simple. Un guide d\'utilisation est également fourni.'
        ],
        [
            'question' => 'Combien de temps faut-il pour créer un site complet ?',
            'answer' => 'Un site vitrine prend 1 à 2 semaines, une boutique en ligne 3 à 4 semaines, et une application web sur mesure 4 à 8 semaines selon la complexité. Les délais sont discutés ensemble dès le départ.'
        ],
        [
            'question' => 'Est-ce que tu proposes aussi l\'hébergement et le nom de domaine ?',
            'answer' => 'Oui ! Je m\'occupe de tout : choix et réservation du nom de domaine, hébergement performant, configuration technique. Vous n\'avez à vous soucier de rien, tout est inclus dans mes offres.'
        ],
        [
            'question' => 'Est-ce que tu peux refaire ou moderniser un site existant ?',
            'answer' => 'Tout à fait ! Je peux revoir complètement le design de votre site actuel, améliorer sa vitesse, le rendre responsive (mobile-friendly), ou ajouter de nouvelles fonctionnalités.'
        ],
        [
            'question' => 'Proposes-tu un paiement en plusieurs fois ?',
            'answer' => 'Oui, je propose un paiement échelonné : généralement 50% au début du projet et 50% à la livraison. Pour les gros projets, nous pouvons convenir d\'un échéancier adapté à votre budget.'
        ]
    ];

    private $testimonials = [
        [
            'name' => 'Jean-Pierre K.',
            'role' => 'Entrepreneur',
            'message' => 'Excellent travail ! Maurice a créé un site moderne et professionnel pour mon entreprise. Son écoute et sa réactivité ont fait la différence.'
        ],
        [
            'name' => 'Marie S.',
            'role' => 'Fondatrice de startup',
            'message' => 'Très satisfaite de la plateforme développée. Le projet a été livré dans les délais avec un résultat au-delà de mes attentes. Je recommande vivement !'
        ],
        [
            'name' => 'Abdoul R.',
            'role' => 'Commerçant',
            'message' => 'Ma boutique en ligne fonctionne parfaitement ! Les clients peuvent commander facilement et je gère tout depuis mon téléphone. Un vrai gain de temps.'
        ]
    ];

    private $stats = [
        'experience' => '3+',
        'projects' => 10,
        'clients' => 10,
    ];

    
    // Page One Page (tout en une)
    public function onepage()
    {
        return view('onepage', [
            'profile' => $this->profile,
            'services' => $this->services,
            'projects' => $this->projects,
            'stats' => $this->stats,
            'faqs' => $this->faqs,
            'testimonials' => $this->testimonials
        ]);
    }

    // Page d'accueil
    public function home()
    {
        return view('home', [
            'profile' => $this->profile,
            'services' => $this->services,
            'faqs' => $this->faqs,
            'testimonials' => $this->testimonials
        ]);
    }

    // Page À propos
    public function about()
    {
        return view('about', [
            'stats' => $this->stats,
            'skills' => $this->skills
        ]);
    }

    // Page Projets
    public function projects()
    {
        return view('portfolio', [
            'projects' => $this->projects,
            'stats' => $this->stats
        ]);
    }

    // Page Contact
    public function contact()
    {
        return view('contact');
    }

    // Traiter le formulaire de contact
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'phone' => 'nullable|regex:/^\+?[0-9]{7,15}$/',
            'message' => 'required|min:10'
        ]);

        // Logique d'envoi d'email ou stockage
        // Mail::to('votre@email.com')->send(new ContactMail($validated));

        return redirect()->back()->with('success', 'Message envoyé avec succès !');
    }
}