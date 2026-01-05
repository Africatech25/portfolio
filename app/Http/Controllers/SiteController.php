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
        'description' => 'J\'aide les startups et entreprises à transformer leurs idées en solutions digitales performantes.',
        'photo' => '/images/hh.jpg',
        'highlight_words' => ['transformer', 'solutions digitales']
    ];

    private $projects = [

        [
            'title' => 'NEOTOKFLOW',
            'description' => 'La première plateforme pour accéder au programme de monétisation TikTok',
            'technologies' => ['PHP', 'JavaScript', 'MySQL', 'Kkiapay'],
            'image' => '/images/neo.png',
            'link' => 'https://neotokflow.com/'
        ],

        [
            'title' => 'DIDI JOBS CONNECT',
            'description' => 'Plateforme de mise en relation entre employeurs et chercheurs d\'emploi',
            'technologies' => ['PHP', 'MySQL', 'Tailwind'],
            'image' => '/images/acdidi.png',
            'link' => 'https://didijobsconnect.kesug.com'
        ],

        [
            'title' => 'Portfolio Personnel',
            'description' => 'Site web personnel pour présenter mes projets et compétences',
            'technologies' => ['HTML', 'CSS', 'JavaScript'],
            'image' => '/images/port.png',
            'link' => 'https://github.com/...'
        ],

        [
            'title' => 'Blog IA',
            'description' => 'Blog présentant des articles sur l\'intelligence artificielle',
            'technologies' => ['Tailwind', 'PHP', 'MySQL','Vibecoding'],
            'image' => '/images/digital.png',
            'link' => 'https://digitaletconscience.free.nf/' 
        ],

        [
            'title' => 'Site d\'inscription concour Miss Mélénine',
            'description' => 'Site web pour l\'inscription au concours Miss Mélénine',
            'technologies' => ['WordPress', 'Elementor'],
            'image' => '/images/miss.png',
            'link' => 'https://missmelanine.com/'
        ],

        [
            'title' => 'BugTrack AI',
            'description' => 'Le suivi de bugs
            propulsé par l\'IA pour des résolutions plus rapides et intelligentes.',
            'technologies' => ['Vibecoding (Google AI STUDIO)'],
            'image' => '/images/bugtrack.png',
            'link' => 'https://aistudio.google.com/apps/drive/1zTxhe1OeATwBPwBWaePO8Qhf5HMM_6dM?resourceKey=&showPreview=true'
        ]
    ];

    private $stats = [
        'experience' => '2+',
        'projects' => 10,
        'clients' => 5,
    ];

    
    // Page d'accueil
    public function home()
    {
        return view('home', [
            'profile' => $this->profile
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