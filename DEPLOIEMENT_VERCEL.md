# 🚀 Déploiement sur Vercel

## Prérequis

- Compte Vercel (gratuit) : [vercel.com](https://vercel.com)
- Git installé
- CLI Vercel (optionnel)

## 📋 Étapes de déploiement

### 1. Préparation du projet

Le projet est déjà configuré avec :
- ✅ `vercel.json` - Configuration Vercel
- ✅ `api/index.php` - Point d'entrée serverless
- ✅ `.vercelignore` - Fichiers à exclure

### 2. Configuration des variables d'environnement

Dans le dashboard Vercel, ajoutez ces variables :

```env
APP_NAME="Votre Portfolio"
APP_ENV=production
APP_KEY=base64:VOTRE_CLE_GENEREE
APP_DEBUG=false
APP_URL=https://votre-app.vercel.app

LOG_CHANNEL=stderr
SESSION_DRIVER=cookie
CACHE_DRIVER=array
```

**Important :** Générez votre `APP_KEY` avec :
```bash
php artisan key:generate --show
```

### 3. Déploiement via GitHub

#### Option A : Déploiement automatique (recommandé)

1. Créez un dépôt GitHub pour votre projet
2. Poussez votre code :
```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/votre-username/portfolio.git
git push -u origin main
```

3. Allez sur [vercel.com/new](https://vercel.com/new)
4. Importez votre dépôt GitHub
5. Vercel détectera automatiquement Laravel
6. Cliquez sur "Deploy"

#### Option B : Déploiement via CLI

1. Installez Vercel CLI :
```bash
npm i -g vercel
```

2. Connectez-vous :
```bash
vercel login
```

3. Déployez :
```bash
vercel
```

4. Pour la production :
```bash
vercel --prod
```

### 4. Après le déploiement

1. **Mettez à jour APP_URL** dans les variables d'environnement Vercel avec votre URL finale
2. **Testez toutes les pages** : home, portfolio, contact
3. **Vérifiez les assets** (images, CSS, JS)

## ⚙️ Configuration spécifique

### Gestion des assets

Les assets dans `/public` sont servis statiquement. Assurez-vous que :
- Les images sont dans `/public/images/`
- Le CSS/JS compilé est dans `/public/build/`

### Sessions et cache

- **Sessions** : Configurées en mode `cookie` (stateless)
- **Cache** : Mode `array` (temporaire)
- **Logs** : Redirigés vers `stderr` pour Vercel

## 🔄 Déploiements futurs

Avec GitHub connecté, chaque `git push` sur la branche `main` déclenchera automatiquement un nouveau déploiement.

## ❗ Limitations Vercel pour Laravel

1. **Pas de système de fichiers persistant** - Les uploads de fichiers ne persistent pas
2. **Pas de base de données incluse** - Utilisez une DB externe si nécessaire
3. **Temps d'exécution limité** - 10s max pour le plan gratuit
4. **Pas de tâches CRON** - Pas de scheduler Laravel

## 🐛 Dépannage

### Erreur 500
- Vérifiez les logs dans le dashboard Vercel
- Assurez-vous que `APP_KEY` est défini
- Vérifiez que `APP_DEBUG=false` en production

### Assets non chargés
- Vérifiez que `APP_URL` correspond à votre URL Vercel
- Exécutez `npm run build` localement avant de pousser

### Erreur de routing
- Vérifiez que `api/index.php` existe
- Consultez `vercel.json` pour les règles de routing

## 📚 Ressources

- [Documentation Vercel](https://vercel.com/docs)
- [Vercel PHP Runtime](https://github.com/vercel-community/php)
- [Laravel sur Vercel](https://github.com/vercel/vercel/tree/main/examples/laravel)

## 🎉 Votre portfolio est en ligne !

URL : `https://votre-app.vercel.app`
