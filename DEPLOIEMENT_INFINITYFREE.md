# Déploiement Laravel sur InfinityFree

## Préparation locale

### 1. Installer toutes les dépendances
```bash
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

### 2. Optimiser Laravel pour la production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 3. Créer un fichier .env pour la production
Créez `.env.production` avec :
```env
APP_NAME="Votre Portfolio"
APP_ENV=production
APP_KEY=base64:2juxc9iTT9se8iPsQmtxeh3Ri246WkEzR/qN6X7h6FQ=
APP_DEBUG=false
APP_URL=https://votre-domaine.infinityfreeapp.com

DB_CONNECTION=mysql
DB_HOST=sql123.infinityfree.com
DB_PORT=3306
DB_DATABASE=votre_base
DB_USERNAME=votre_user
DB_PASSWORD=votre_password

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

## Structure de fichiers sur InfinityFree

InfinityFree utilise cette structure :
```
/htdocs/              ← Dossier public (Document Root)
/private/             ← Dossier privé (pour les fichiers Laravel)
```

### 4. Préparer la structure de déploiement

Créez cette structure dans un dossier temporaire :

**htdocs/** (contenu du dossier `public/`)
- index.php
- .htaccess
- robots.txt
- build/
- images/

**private/** (tout le reste du projet)
- app/
- bootstrap/
- config/
- database/
- resources/
- routes/
- storage/
- vendor/
- artisan
- composer.json
- .env

### 5. Modifier index.php

Éditez `htdocs/index.php` pour pointer vers le bon chemin :

```php
<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Ancien: require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../private/vendor/autoload.php';

// Ancien: $app = require_once __DIR__.'/../bootstrap/app.php';
$app = require_once __DIR__.'/../private/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
```

### 6. Créer un .htaccess adapté

Dans `htdocs/.htaccess` :

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # Forcer HTTPS
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
    
    # Redirection vers index.php
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### 7. Configurer les permissions storage

Assurez-vous que `private/storage` et `private/bootstrap/cache` sont accessibles en écriture.

## Étapes sur InfinityFree

### 1. Créer un compte
- Allez sur https://infinityfree.net
- Créez un compte gratuit
- Notez vos identifiants MySQL et FTP

### 2. Configurer la base de données
- Créez une base MySQL depuis le panneau de contrôle
- Importez vos tables si nécessaire (export depuis phpMyAdmin local)
- Notez : `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

### 3. Upload via FTP
Utilisez FileZilla ou un client FTP :
- Host : `ftpupload.net` ou votre serveur FTP
- Upload `htdocs/` dans `/htdocs/`
- Upload `private/` dans `/private/` (créez ce dossier)

### 4. Configurer .env
- Renommez `.env.production` en `.env` dans `/private/`
- Mettez à jour avec vos infos MySQL d'InfinityFree

### 5. Vérifier les chemins storage
Dans `private/bootstrap/app.php`, assurez-vous que les chemins sont corrects.

## Vérification

1. Visitez `https://votre-domaine.infinityfreeapp.com`
2. Vérifiez que le site fonctionne
3. Testez les routes et formulaires

## Problèmes courants

### Erreur 500
- Vérifiez les permissions de `storage/` et `bootstrap/cache/`
- Vérifiez que `.env` est correct
- Consultez les logs dans `storage/logs/`

### Base de données
- InfinityFree utilise MySQL, pas SQLite
- Créez les tables via migrations ou import SQL

### Assets manquants
- Exécutez `npm run build` avant upload
- Vérifiez que `/build/assets/` est bien uploadé

### Sessions ne fonctionnent pas
- Utilisez `SESSION_DRIVER=file` au lieu de `cookie`
- Vérifiez permissions `storage/framework/sessions/`

## Alternative recommandée

Pour un meilleur hébergement Laravel (gratuit avec limitations) :
- **Railway** : https://railway.app
- **Heroku** (plan gratuit limité)
- **PythonAnywhere** (supporte PHP)
- **000webhost** (similaire à InfinityFree)

Ces plateformes supportent mieux Composer et Artisan.

## Important

⚠️ **InfinityFree n'est pas idéal pour Laravel** car :
- Pas de ligne de commande
- Performances limitées
- Pas de support Composer en ligne

Pour un portfolio simple (sans admin complexe), ça peut fonctionner.
Pour un projet Laravel complet, préférez un hébergement payant comme :
- **Hostinger** (4-6€/mois)
- **DigitalOcean** (5$/mois)
- **Cloudways** (12$/mois)
