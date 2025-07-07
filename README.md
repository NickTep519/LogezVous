# LogezVous

**LogezVous** est une plateforme pour permettre aux démarcheurs et agences immobilières de publier et gérer des biens immobiliers (vente et location) pour la grande population.

---

## 🚀 Fonctionnalités principales

- Publication et gestion de biens immobiliers
- Gestion des locataires pour les agences
- Multi rôles : Administrateur, Démarcheur, Agence, Locataire
- Recherche et filtrage avancé
- Authentification sécurisée
- Notifications et messagerie interne (à venir)

---

## ⚙️ Stack technique

- **Backend :** Laravel 12+
- **Auth :** Laravel Breeze ou Fortify
- **Permissions :** Spatie Laravel Permission
- **Upload fichiers :** Spatie Media Library
- **Frontend :** Blade / Inertia / Vue (à définir)
- **Base de données :** MySQL / PostgreSQL

---

## 🔧 Installation

```bash
# Cloner le repo
git clone https://github.com/votre-username/logezvous.git

# Aller dans le dossier
cd logezvous

# Installer les dépendances PHP
composer install

# Installer les dépendances JS
npm install && npm run dev

# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé
php artisan key:generate

# Configurer la DB dans .env puis migrer
php artisan migrate
