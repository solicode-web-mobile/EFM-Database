# **📌 Examen Final - Gestion des Images de Motivation avec Laravel (Note sur 40 points)**  
📌 **Durée : 1h15 (75 minutes)**  
📌 **Barème total : 40 points**  
📌 **Objectif :** Tester la capacité à **gérer les relations en Laravel, modifier des objets liés via un Service, structurer proprement le code et améliorer l’interface utilisateur**.  

---

## **🔹 Contexte Général**  
Tu travailles sur une **application Laravel** permettant aux employés de partager **une seule image** qui les motive.  
Les autres employés peuvent ensuite **ajouter des messages de soutien** (*support de motivation*).  

L’application doit permettre :  
- **Chaque employé** peut partager **une seule image de motivation** (*relation One-to-One avec `Employe`*).  
- **Chaque image** peut recevoir plusieurs **messages de soutien** (*relation One-to-Many avec `SupportMotivation`*).  
- **Les messages de soutien** peuvent contenir un **type spécifique de motivation** (*relation Many-to-Many avec `TypeMotivation`*).  

L’application doit afficher les images des employés, mettre à jour certaines de leurs données et permettre l’édition et la suppression des messages de soutien.

L’examen est divisé en **deux parties** :

1. **🔴 Partie 1 : Live Coding (30 minutes, 20 points)**  
   - Affichage des images de motivation avec leurs messages de soutien.  
   - Incrémentation du nombre de vues d’une image et de ses messages via un Service.  
   - Ajout automatique du type de motivation "Encouragement" si un message reçoit plus de 5 réactions.  

2. **🟢 Partie 2 : Mini-Projet (45 minutes, 20 points)**  
   - Ajout d’un formulaire permettant de modifier les types de motivation d’un message.  
   - Ajout des boutons "Modifier" et "Supprimer" pour chaque message de soutien.  
   - Amélioration du design de la page avec du CSS.  

---

# **🔴 Partie 1 : Live Coding (30 min - 20 points)**  
📌 **Objectif :**  
- Afficher la liste des images de motivation avec leurs messages de soutien.  
- Gérer le nombre de vues des images et des messages.  
- Modifier dynamiquement les types de motivation d’un message (*Many-to-Many*).  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Création de la classe `ImageService` (6 points)**
📌 **Question 1 :** Crée une classe `ImageService` dans `app/Services/` et ajoute une méthode `getImagesWithSupport()` qui retourne la liste des images avec leurs relations (`employe`, `supportMotivation`, `typeMotivation`). *(2 points)*  
📌 **Question 2 :** Ajoute une méthode `incrementImageViews(Image $image)` qui **incrémente le nombre de vues** de l’image et sauvegarde la modification. *(2 points)*  
📌 **Question 3 :** Ajoute une méthode `incrementSupportViews(Image $image)` qui **incrémente le nombre de vues de chaque message de soutien lié à cette image** et sauvegarde les modifications. *(2 points)*  

---

### **2️⃣ Implémentation du `ImageController` (6 points)**
📌 **Question 4 :** Crée un contrôleur `ImageController` et injecte `ImageService` dans son constructeur via l’Injection de Dépendance. *(2 points)*  
📌 **Question 5 :** Implémente une méthode `index()` qui :
- Récupère la liste des images via `ImageService`.
- Incrémente les vues des images et des messages de soutien associés.
- Vérifie si un message de soutien doit recevoir automatiquement le type de motivation "Encouragement" lorsqu’il dépasse **5 réactions**.
- Retourne les données à la vue `index.blade.php`. *(4 points)*  

---

### **3️⃣ Création de la Vue `index.blade.php` (6 points)**
📌 **Question 6 :** Crée une vue `resources/views/images/index.blade.php` qui affiche les images sous forme de tableau avec les colonnes suivantes :  
- **Image partagée**.  
- **Nom de l’employé** (*relation One-to-One*).  
- **Nombre de vues de l’image**.  
- **Liste des messages de soutien avec leur propre compteur de vues** (*relation One-to-Many*).  
- **Liste des types de motivation associés aux messages** (*relation Many-to-Many*). *(4 points)*  

📌 **Question 7 :** Tester le bon fonctionnement de l'affichage et s'assurer que les vues des images et des messages sont bien incrémentées après chaque rafraîchissement de la page. *(2 points)*  

---

### **4️⃣ Définition de la Route et Test (2 points)**
📌 **Question 8 :** Déclare une route `/images` dans `routes/web.php` pour appeler la méthode `index()` du `ImageController`. *(1 point)*  
📌 **Question 9 :** Lancer l’application, tester l’affichage dans le navigateur et vérifier que :
- Les **images et leurs messages de soutien** s’affichent correctement.
- Les **vues des images et des messages de soutien** sont bien incrémentées.
- Les **messages dépassant 5 réactions reçoivent automatiquement le type de motivation "Encouragement"**. *(1 point)*  

---

# **🟢 Partie 2 : Mini-Projet (45 min - 20 points)**  
📌 **Objectif :**  
- Ajouter une fonctionnalité d’édition des types de motivation associés aux messages de soutien.  
- Permettre la suppression des messages de soutien.  
- Améliorer le design et la responsivité de l’interface.  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Modification des types de motivation d’un message (8 points)**
📌 **Question 1 :** Ajouter une méthode `updateSupportMotivation(SupportMotivation $support, array $typeMotivationIds)` dans `ImageService` pour **modifier les types de motivation associés à un message**. *(3 points)*  
📌 **Question 2 :** Créer une méthode `edit($id)` dans `SupportMotivationController` qui retourne un formulaire d’édition avec la liste des types de motivation disponibles. *(2 points)*  
📌 **Question 3 :** Implémenter une méthode `update(Request $request, $id)` dans `SupportMotivationController` qui met à jour les types de motivation d’un message en utilisant `ImageService`. *(3 points)*  

---

### **2️⃣ Ajout des boutons "Modifier" et "Supprimer" (6 points)**
📌 **Question 4 :** Ajouter dans `index.blade.php` une colonne avec **un bouton "Modifier" redirigeant vers la page d'édition** du message de soutien. *(2 points)*  
📌 **Question 5 :** Ajouter **un bouton "Supprimer" avec un formulaire `DELETE`** pour supprimer un message de soutien. *(2 points)*  
📌 **Question 6 :** Implémenter la méthode `destroy($id)` dans `SupportMotivationController` pour gérer la suppression d’un message de soutien. *(2 points)*  

---

### **3️⃣ Amélioration de l’affichage avec du CSS (6 points)**
📌 **Question 7 :** Modifier `index.blade.php` pour afficher les images et les messages sous forme de **tableau stylisé** en ajoutant un fichier CSS. *(2 points)*  
📌 **Question 8 :** Améliorer le **formulaire d’édition** pour qu’il soit plus clair et agréable visuellement. *(2 points)*  
📌 **Question 9 :** Vérifier que les boutons sont bien alignés et que l'affichage est **responsive**. *(2 points)*  

---

## **📢 Remarque**
- **Total de l'examen : 40 points.**  
- Tu peux ajouter en bonus :
  - **Une alerte de confirmation** avant la suppression d’un message.  
  - **Un filtre pour afficher uniquement les images les plus vues.**  
  - **Un champ de recherche** pour trouver une image par son auteur.  

Bonne chance ! 🚀