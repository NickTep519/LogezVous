# 🏠 LogezVous

**LogezVous** est une plateforme web de gestion et de mise en relation immobilière : agences, démarcheurs, propriétaires et clients.

---

## 📌 Objectif

- Centraliser les annonces immobilières : vente, location, terrain, magasin, bureaux, etc.
- Offrir un tableau de bord complet pour chaque rôle (admin, manager, agent, démarcheur, propriétaire, client).
- Digitaliser la gestion locative : contrats, factures, paiements.
- Simplifier la recherche pour les clients.

---

## ⚙️ Stack technique

- **Backend :** Laravel 10+
- **Auth :** Laravel Breeze ou Jetstream
- **Rôles & Permissions :** [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v6/introduction)
- **Upload média :** [Spatie Media Library](https://spatie.be/docs/laravel-medialibrary/v11/introduction)
- **Frontend :** Blade + TailwindCSS (ou Vue/React si besoin)
- **Base de données :** MySQL
- **Autres :**
  - Mailhog (pour tests mails)
  - Dompdf (factures PDF)
  - Pusher ou Laravel Echo pour notifications temps réel (optionnel)

---

## ✅ Fonctionnalités principales

### 🔑 Authentification
- Inscription avec rôle choisi
- Vérification email
- Attribution auto des rôles

### 🏢 Gestion des agences
- Création d’une agence à l’inscription d’un `agency_manager`
- Lien manager ↔️ agence
- Agents reliés à une agence

### 🏘️ Annonces immobilières
- Multi-upload images via Spatie Media Library
- Filtres avancés : type, prix, chambres, surface, quartier, statut
- Slug unique pour chaque bien
- Coordonnées GPS (maps)

### 🗂️ Tableau de bord
- Tableau de bord spécifique selon rôle :
  - Super Admin / Admin
  - Agency Manager / Agent
  - Démarcheur
  - Propriétaire
  - Locataire
- Statistiques annonces, clients, locations

### 💼 Property Management (module)
- Contrats de location
- Gestion des paiements
- Génération de factures PDF
- Historique locataires

### 🔒 Sécurité
- Middleware `auth` + `role` via Spatie
- Routes protégées par rôle
- Politique pour modification des biens

### 🗃️ Commandes utiles

# Créer la base de données + seeders
php artisan migrate:fresh --seed

# Lancer le serveur local
php artisan serve

# Vérifier les rôles & permissions
php artisan tinker
