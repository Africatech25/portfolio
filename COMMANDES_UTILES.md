# 🛠️ Commandes Utiles - Portfolio Couleurs

## Pour Démarrer le Projet

```bash
# Installer les dépendances
composer install
npm install

# Générer la clé d'application
php artisan key:generate

# Lancer le serveur de développement
php artisan serve

# Lancer Vite en mode watch
npm run dev
```

---

## Pour Tester les Couleurs

```bash
# Accéder à la page de test
# http://localhost:8000/test-colors

# Ou via artisan
php artisan tinker
Route::get('/test-colors', fn() => view('test-colors'));
```

---

## Commandes de Migration

```bash
# Si vous avez des migrations
php artisan migrate

# Avec seeding
php artisan migrate:seed
```

---

## Build pour Production

```bash
# Build les assets
npm run build

# Vérifier que tout compile
php artisan config:cache
php artisan route:cache
```

---

## Pour Nettoyer le Cache

```bash
# Vider tous les caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ou tout d'un coup
php artisan optimize:clear
```

---

## Commandes Blade Utiles

```bash
# Cacher les commandes Blade
php artisan view:cache

# Nettoyer le cache des vues
php artisan view:clear
```

---

## Vérification du Code

```bash
# Vérifier le PHP (si Pint est installé)
php pint

# Vérifier les erreurs PHP
php artisan tinker
```

---

## Documentation Markdown

### Fichiers de Documentation Créés

```bash
# Ouvrir la documentation principale
cat PALETTE_COULEURS.md

# Ouvrir le rapport d'intégration
cat RAPPORT_INTEGRATION_COULEURS.md

# Ouvrir le résumé
cat RESUME_INTEGRATION.md

# Ouvrir la checklist
cat CHECKLIST_INTEGRATION.md
```

---

## Commandes Git (Optionnel)

```bash
# Voir les fichiers changés
git status

# Voir les changements
git diff resources/css/app.css

# Ajouter les fichiers
git add .

# Commiter les changements
git commit -m "Intégration palette de couleurs"

# Pousser les changements
git push
```

---

## Vérification des Fichiers

```bash
# Lister les fichiers CSS
ls -la resources/css/

# Lister les fichiers de documentation
ls -la | grep -E "PALETTE|RAPPORT|RESUME|CHECKLIST|EXEMPLES"

# Vérifier la structure
tree resources/views/

# Ou avec find
find . -name "*.blade.php" -path "*/resources/views/*"
```

---

## Pour les Développeurs

### Éditeur de Code

```bash
# Ouvrir VS Code
code .

# Ouvrir dans un éditeur
nano resources/css/colors.css

# Ou vim
vim resources/css/colors.css
```

### Rechercher des Couleurs

```bash
# Chercher les hardcoded colors (ancienne palette)
grep -r "#c4ff00" resources/

# Chercher les nouvelles couleurs
grep -r "#9D4E12" resources/

# Chercher les variables CSS
grep -r "var(--" resources/
```

---

## Format et Validation

```bash
# Vérifier la syntaxe CSS
php artisan

# Tester les routes
php artisan route:list | grep -E "test-colors|home|portfolio|contact"
```

---

## Commandes Utiles au Quotidien

### Développement Rapide
```bash
# Terminal 1: Serveur Laravel
php artisan serve

# Terminal 2: Build Vite
npm run dev

# Terminal 3: Optionnel - Tinker pour tests
php artisan tinker
```

### Avant de Commiter
```bash
# Vérifier qu'il n'y a pas d'erreurs
php artisan config:cache --no-warmup

# Vérifier les routes
php artisan route:list

# Tester les vues
php artisan view:cache --force
```

### Maintenance
```bash
# Nettoyer avant production
php artisan optimize:clear

# Optimiser pour production
php artisan optimize
```

---

## Troubleshooting

### Si CSS ne charge pas

```bash
# Vider le cache Vite
rm -rf node_modules/.vite

# Relancer Vite
npm run dev

# Ou rebuild
npm run build
```

### Si les couleurs ne s'affichent pas

```bash
# Vérifier les variables CSS dans colors.css
cat resources/css/colors.css

# Vérifier l'import dans app.css
head -5 resources/css/app.css

# Vérifier le rendu HTML
curl http://localhost:8000 | grep "style="
```

### Si la page de test ne s'affiche pas

```bash
# Vérifier la route
php artisan route:list | grep test-colors

# Vérifier le fichier existe
ls -la resources/views/test-colors.blade.php

# Vérifier pas d'erreur 404
curl -i http://localhost:8000/test-colors
```

---

## Performance

### Mesurer les performances

```bash
# Utiliser Laravel Debugbar
# Ajouter: Barryvdh/laravel-debugbar

# Tester les animations
# Ouvrir DevTools > Performance > Recorder

# Vérifier la taille CSS
du -h resources/css/app.css
```

---

## Déploiement

### Avant le déploiement

```bash
# Vérifier l'environnement
php artisan env

# Compiler les assets
npm run build

# Vérifier les permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Nettoyer les caches
php artisan optimize:clear
```

### En production

```bash
# Mettre en cache
php artisan config:cache
php artisan route:cache

# Optimiser
php artisan optimize

# Vérifier les logs
tail -f storage/logs/laravel.log
```

---

## Raccourcis Utiles

### Alias pour Terminal (Optionnel)

```bash
# Ajouter à votre .bashrc ou .zshrc
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
alias art='php artisan'
alias npm-dev='npm run dev'
alias npm-build='npm run build'
alias clear-cache='php artisan optimize:clear'
```

Ensuite:
```bash
# Utiliser simplement:
art serve
npm-dev
clear-cache
```

---

## Ressources Utiles

### Documentation
- [Laravel Docs](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Bootstrap 5](https://getbootstrap.com)
- [MDN CSS Variables](https://developer.mozilla.org/fr/docs/Web/CSS/--*)

### Couleurs
- [Color Hex](https://www.color-hex.com)
- [ColorHexa](https://www.colorhexa.com)
- [Coolors.co](https://coolors.co)

---

## Notes Finales

```
✅ Infrastructure prête
✅ Documentation complète
✅ Tests préparés
✅ Production ready
```

Pour toute question ou problème, consultez la documentation:
- `PALETTE_COULEURS.md` - Guide complet
- `RAPPORT_INTEGRATION_COULEURS.md` - Détails techniques
- `RESUME_INTEGRATION.md` - Vue d'ensemble
- `CHECKLIST_INTEGRATION.md` - Checklist

---

**Created by**: GitHub Copilot  
**Date**: Novembre 2025  
**Status**: ✅ Complete
