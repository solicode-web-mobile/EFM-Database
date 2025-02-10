# **📌 Examen Final - Gestion des Recettes de Cuisine avec Laravel (Note sur 40 points)**
📌 **Durée : 1h15 (75 minutes)**  
📌 **Barème total : 40 points**  
📌 **Objectif :** Tester la capacité à **gérer les relations en Laravel, modifier des objets liés via un Service, structurer proprement le code et améliorer l’interface utilisateur**.  

---

## **🔹 Contexte Général**  
Tu travailles sur une **application Laravel** permettant aux utilisateurs de partager **une seule recette de cuisine**.  
Les autres utilisateurs peuvent ensuite **donner leur avis et des suggestions d'amélioration** sur la recette.  

L’application doit permettre :  
- **Chaque utilisateur** peut proposer **une seule recette** (*relation One-to-One avec `Utilisateur`*).  
- **Chaque recette** peut recevoir plusieurs **avis** (*relation One-to-Many avec `Avis`*).  
- **Les avis** peuvent contenir **des suggestions d’amélioration** (*relation Many-to-Many avec `Suggestion`*).  

L’application doit afficher les recettes, mettre à jour certaines de leurs données et permettre l’édition et la suppression des avis.

L’examen est divisé en **deux parties** :

1. **🔴 Partie 1 : Live Coding (30 minutes, 20 points)**  
   - Affichage des recettes avec leurs avis.  
   - Incrémentation du nombre de vues d’une recette et de ses avis via un Service.  
   - Ajout automatique d’une suggestion "Plat Favori" si une recette reçoit plus de 10 avis positifs.  

2. **🟢 Partie 2 : Mini-Projet (45 minutes, 20 points)**  
   - Ajout d’un formulaire permettant de modifier les suggestions associées à un avis.  
   - Ajout des boutons "Modifier" et "Supprimer" pour chaque avis.  
   - Amélioration du design de la page avec du CSS.  

---

# **🔴 Partie 1 : Live Coding (30 min - 20 points)**  
📌 **Objectif :**  
- Afficher la liste des recettes avec leurs avis.  
- Gérer le nombre de vues des recettes et des avis.  
- Modifier dynamiquement les suggestions d’amélioration d’un avis (*Many-to-Many*).  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Création de la classe `RecetteService` (6 points)**
📌 **Question 1 :** Crée une classe `RecetteService` dans `app/Services/` et ajoute une méthode `getRecettesWithAvis()` qui retourne la liste des recettes avec leurs relations (`utilisateur`, `avis`, `suggestions`). *(2 points)*  
📌 **Question 2 :** Ajoute une méthode `incrementRecetteViews(Recette $recette)` qui **incrémente le nombre de vues** de la recette et sauvegarde la modification. *(2 points)*  
📌 **Question 3 :** Ajoute une méthode `incrementAvisViews(Recette $recette)` qui **incrémente le nombre de vues de chaque avis lié à cette recette** et sauvegarde les modifications. *(2 points)*  

---

### **2️⃣ Implémentation du `RecetteController` (6 points)**
📌 **Question 4 :** Crée un contrôleur `RecetteController` et injecte `RecetteService` dans son constructeur via l’Injection de Dépendance. *(2 points)*  
📌 **Question 5 :** Implémente une méthode `index()` qui :
- Récupère la liste des recettes via `RecetteService`.
- Vérifie si une recette doit recevoir automatiquement la suggestion "Plat Favori" lorsqu’elle dépasse **10 avis positifs**.
- Retourne les données à la vue `index.blade.php`. *(4 points)*  

---

### **3️⃣ Création de la Vue `index.blade.php` (6 points)**
📌 **Question 6 :** Crée une vue `resources/views/recettes/index.blade.php` qui affiche les recettes sous forme de tableau avec les colonnes suivantes :  
- **Nom de la recette**.  
- **Nom du cuisinier** (*relation One-to-One*).  
- **Nombre de vues de la recette**.  
- **Liste des avis avec leur propre compteur de vues** (*relation One-to-Many*).  
- **Liste des suggestions d’amélioration associées aux avis** (*relation Many-to-Many*). *(4 points)*  

📌 **Question 7 :** Tester le bon fonctionnement de l'affichage et s'assurer que les vues des recettes et des avis sont bien incrémentées après chaque rafraîchissement de la page. *(2 points)*  

---

### **4️⃣ Définition de la Route et Test (2 points)**
📌 **Question 8 :** Déclare une route `/recettes` dans `routes/web.php` pour appeler la méthode `index()` du `RecetteController`. *(1 point)*  
📌 **Question 9 :** Lancer l’application, tester l’affichage dans le navigateur et vérifier que :
- Les **recettes et leurs avis** s’affichent correctement.
- Les **vues des recettes et des avis** sont bien incrémentées.
- Les **recettes dépassant 10 avis positifs reçoivent automatiquement la suggestion "Plat Favori"**. *(1 point)*  

---

# **🟢 Partie 2 : Mini-Projet (45 min - 20 points)**  
📌 **Objectif :**  
- Ajouter une fonctionnalité d’édition des suggestions associées aux avis.  
- Permettre la suppression des avis.  
- Améliorer le design et la responsivité de l’interface.  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Modification des suggestions d’un avis (8 points)**
📌 **Question 1 :** Ajouter une méthode `updateAvisSuggestions(Avis $avis, array $suggestionsIds)` dans `RecetteService` pour **modifier les suggestions associées à un avis**. *(3 points)*  
📌 **Question 2 :** Créer une méthode `edit($id)` dans `AvisController` qui retourne un formulaire d’édition avec la liste des suggestions disponibles. *(2 points)*  
📌 **Question 3 :** Implémenter une méthode `update(Request $request, $id)` dans `AvisController` qui met à jour les suggestions associées à un avis en utilisant `RecetteService`. *(2 points)*  
📌 **Question 4 :** Implémenter une méthode `show($id)` dans `ArticleController`. *(1 points)* 

---

### **2️⃣ Ajout des boutons "Modifier" et "Supprimer" (6 points)**
📌 **Question 4 :** Ajouter dans `index.blade.php` une colonne avec **un bouton "Modifier" redirigeant vers la page d'édition** de l’avis. *(2 points)*  
📌 **Question 5 :** Ajouter **un bouton "Supprimer" avec un formulaire `DELETE`** pour supprimer un avis. *(2 points)*  
📌 **Question 6 :** Implémenter la méthode `destroy($id)` dans `AvisController` pour gérer la suppression d’un avis. *(2 points)*  

---

### **3️⃣ Amélioration de l’affichage avec du CSS (6 points)**
📌 **Question 7 :** Modifier `index.blade.php` pour afficher les recettes et les avis sous forme de **tableau stylisé** en ajoutant un fichier CSS. *(2 points)*  
📌 **Question 8 :** Améliorer le **formulaire d’édition** pour qu’il soit plus clair et agréable visuellement. *(2 points)*  
📌 **Question 9 :** Vérifier que les boutons sont bien alignés et que l'affichage est **responsive**. *(2 points)*  

---

## **📢 Remarque**
- **Total de l'examen : 40 points.**  
- Tu peux ajouter en bonus :
  - **Une alerte de confirmation** avant la suppression d’un avis.  
  - **Un filtre pour afficher uniquement les recettes les plus vues.**  
  - **Un champ de recherche** pour trouver une recette par son auteur.  

Bonne chance ! 🚀