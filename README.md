Test-injection-sql

## Description
Ce projet est une application simple d'authentification avec un tableau de bord, développée en **PHP**, **MySQL**, **Bootstrap** et **JavaScript**. Il comprend :
- Une **page d'inscription** permettant aux utilisateurs de créer un compte.
- Une **page de connexion** sécurisée avec hachage de mot de passe.
- Un **tableau de bord** réservé aux utilisateurs authentifiés.
- Un **système de déconnexion**.

## Installation et Prise en Main
### Prérequis
- **XAMPP** installé sur votre machine.
- Un navigateur web moderne.
- Un éditeur de texte (VS Code, Sublime Text, etc.).

### Étapes d'installation
1. **Téléchargez et placez le projet** dans le dossier `htdocs` de XAMPP.
2. **Lancez XAMPP** et démarrez `Apache` et `MySQL`.
3. **Créez la base de données** via `phpMyAdmin` en exécutant la commande SQL suivante :

```sql
CREATE DATABASE test_db;
USE test_db;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);
```

4. **Configurez la connexion à la base de données** dans `db.php` si nécessaire.
5. **Accédez à l'application** via `http://localhost/nom_du_projet/login.php`.

---

## Simulation d'une Injection SQL
L'objectif est de démontrer comment une mauvaise gestion des requêtes SQL peut compromettre la sécurité.

### Étapes de simulation
1. **Rendre le projet vulnérable**
   - Modifiez `login.php` pour remplacer le code sécurisé :
   
   ```php
   $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   ```
   
   par un code non sécurisé :
   
   ```php
   $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
   $result = $conn->query($query);
   ```

2. **Effectuer une attaque SQL**
   - Dans le champ **Nom d'utilisateur**, entrez :
     ```sql
     ' OR '1'='1
     ```
   - Laissez le champ **Mot de passe** vide ou mettez n'importe quoi.
   - Résultat : l'attaquant se connecte **sans mot de passe**.

### Protection contre l'injection SQL
- **Utiliser des requêtes préparées (`bind_param()`)**.
- **Ne jamais concaténer les entrées utilisateurs directement dans les requêtes SQL**.
- **Implémenter des limitations de connexion** après plusieurs tentatives échouées.

---

## Déploiement en ligne
Pour mettre ce projet en ligne :
1. **Choisissez un hébergeur PHP** (ex : Hostinger, 000Webhost, OVH).
2. **Exportez la base de données** depuis `phpMyAdmin` et importez-la sur le serveur.
3. **Modifiez `db.php`** pour adapter les paramètres de connexion au serveur distant.
4. **Téléversez les fichiers via FTP** avec FileZilla.
5. **Accédez au site** via l'URL fournie par l'hébergeur.

---

🎯 **Ce projet montre l'importance de la sécurité en développement web. Appliquez toujours les bonnes pratiques !**

