#  Projet E-commerce des cameras en Laravel avec MySQL  

Ce projet est une application e-commerce développée avec Laravel et une base de données MySQL. Il inclut des fonctionnalités essentielles telles que l'authentification, la gestion des rôles, la gestion des produits, l'ajout au panier et la gestion des commandes avec paiement en ligne via Stripe.  

---

##  Prérequis  
Avant de commencer, assurez-vous d'avoir installé :  

- PHP ≥ 8.0  
- Composer  
- Laravel 9  
- PostgreSQL / MySQL  
- Node.js & npm  

---

##  Installation  

### **1. Cloner le projet**  

git clone https://github.com/ayoubbr/CameraHubV1.0  
cd CameraHubV1.0


### **2. Installer les dépendances**  

composer install  
npm install && npm run dev  


### **3. Configurer l’environnement** 

Copiez le fichier .env.example et renommez-le .env : 

Modifiez les paramètres de connexion à la base de données dans .env :

DB_CONNECTION=pgsql  
DB_HOST=127.0.0.1  
DB_PORT=5432  
DB_DATABASE=nom_de_la_base  
DB_USERNAME=nom_utilisateur  
DB_PASSWORD=mot_de_passe 

Générez la clé d’application Laravel :

php artisan key:generate


### **4. Exécuter les migrations et seeders** 

php artisan migrate  --seed


### **5. Lancer le serveur de développement** 

php artisan serve  