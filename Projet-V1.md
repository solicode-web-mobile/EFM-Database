# **📌 Examen Final - Gestion des Articles avec Laravel (Note sur 40 points)**  
📌 **Durée : 1h15 (75 minutes)**  
📌 **Barème total : 40 points**  
📌 **Objectif :** Tester la capacité à **gérer les relations en Laravel, modifier des objets liés via un Service, structurer proprement le code et améliorer l’interface utilisateur**.  

---

## **🔹 Contexte Général**
Tu travailles sur une **application Laravel** permettant de gérer des articles de blog avec leurs relations :  
- **Un article appartient à un auteur** (*relation One-to-One avec `User`*).  
- **Un article peut avoir plusieurs commentaires** (*relation One-to-Many avec `Comment`*).  
- **Un article peut appartenir à plusieurs catégories** (*relation Many-to-Many avec `Category`*).  

L’application doit afficher les articles, mettre à jour certaines de leurs données et permettre l’édition et la suppression des articles.

L’examen est divisé en **deux parties** :

1. **🔴 Partie 1 : Live Coding (30 minutes, 20 points)**  
   - Affichage des articles et de leurs relations.  
   - Incrémentation du nombre de vues de l’article et de ses commentaires via un Service.  
   - Ajout automatique de la catégorie `Populaire` pour les articles ayant plus de 10 vues.  

2. **🟢 Partie 2 : Mini-Projet (45 minutes, 20 points)**  
   - Ajout d’un formulaire permettant de modifier les catégories associées à un article.  
   - Ajout des boutons "Modifier" et "Supprimer" pour chaque article.  
   - Amélioration du design de la page avec du CSS.  

---

# **🔴 Partie 1 : Live Coding (30 min - 20 points)**  
📌 **Objectif :**  
- Afficher la liste des articles avec leurs relations.  
- Gérer le nombre de vues des articles et des commentaires.  
- Modifier dynamiquement les catégories d’un article (*Many-to-Many*).  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Création de la classe `ArticleService` (6 points)**
📌 **Question 1 :** Crée une classe `ArticleService` dans `app/Services/` et ajoute une méthode `getArticlesWithRelations()` qui retourne la liste des articles avec leurs relations (`user`, `comments`, `categories`). *(2 points)*  
📌 **Question 2 :** Ajoute une méthode `incrementArticleViews(Article $article)` qui **incrémente le nombre de vues** de l’article et sauvegarde la modification. *(2 points)*  
📌 **Question 3 :** Ajoute une méthode `incrementCommentViews(Article $article)` qui **incrémente le nombre de vues de chaque commentaire lié à cet article** et sauvegarde les modifications. *(2 points)*  

---

### **2️⃣ Implémentation du `ArticleController` (6 points)**
📌 **Question 4 :** Crée un contrôleur `ArticleController` et injecte `ArticleService` dans son constructeur via l’Injection de Dépendance. *(2 points)*  
📌 **Question 5 :** Implémente une méthode `index()` qui :
- Récupère la liste des articles via `ArticleService`.
- Incrémente les vues des articles et des commentaires associés.
- Vérifie si l’article doit recevoir la catégorie `Populaire` (ajouter cette catégorie s’il dépasse **10 vues**).
- Retourne les données à la vue `index.blade.php`. *(4 points)*  

---

### **3️⃣ Création de la Vue `index.blade.php` (6 points)**
📌 **Question 6 :** Crée une vue `resources/views/articles/index.blade.php` qui affiche les articles sous forme de tableau avec les colonnes suivantes :  
- **Titre de l’article**.  
- **Nom de l’auteur** (*relation One-to-One*).  
- **Nombre de vues de l’article**.  
- **Liste des commentaires avec leur propre compteur de vues** (*relation One-to-Many*).  
- **Liste des catégories de l’article** (*relation Many-to-Many*). *(4 points)*  

📌 **Question 7 :** Tester le bon fonctionnement de l'affichage et s'assurer que les vues des articles et des commentaires sont bien incrémentées après chaque rafraîchissement de la page. *(2 points)*  

---

### **4️⃣ Définition de la Route et Test (2 points)**
📌 **Question 8 :** Déclare une route `/articles` dans `routes/web.php` pour appeler la méthode `index()` du `ArticleController`. *(1 point)*  
📌 **Question 9 :** Lancer l’application, tester l’affichage dans le navigateur et vérifier que :
- Les **articles et leurs relations** s’affichent correctement.
- Les **vues des articles et des commentaires** sont bien incrémentées.
- Les **articles populaires (> 10 vues) reçoivent bien la catégorie `Populaire`**. *(1 point)*  

---

# **🟢 Partie 2 : Mini-Projet (45 min - 20 points)**  
📌 **Objectif :**  
- Ajouter une fonctionnalité d’édition des catégories des articles.  
- Permettre la suppression des articles.  
- Améliorer le design et la responsivité de l’interface.  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Modification des catégories d’un article (Many-to-Many) (8 points)**
📌 **Question 1 :** Ajouter une méthode `updateArticleCategories(Article $article, array $categoryIds)` dans `ArticleService` pour **modifier les catégories associées à un article**. *(3 points)*  
📌 **Question 2 :** Créer une méthode `edit($id)` dans `ArticleController` qui retourne un formulaire d’édition avec la liste des catégories disponibles et celles déjà attachées à l’article. *(2 points)*  
📌 **Question 3 :** Implémenter une méthode `update(Request $request, $id)` dans `ArticleController` qui met à jour les catégories d’un article en utilisant `ArticleService`. *(3 points)*  

---

### **2️⃣ Ajout des boutons "Modifier" et "Supprimer" (6 points)**
📌 **Question 4 :** Ajouter dans `index.blade.php` une colonne avec **un bouton "Modifier" redirigeant vers la page d'édition** de l'article. *(2 points)*  
📌 **Question 5 :** Ajouter **un bouton "Supprimer" avec un formulaire `DELETE`** pour supprimer un article. *(2 points)*  
📌 **Question 6 :** Implémenter la méthode `destroy($id)` dans `ArticleController` pour gérer la suppression d’un article. *(2 points)*  

---

### **3️⃣ Amélioration de l’affichage avec du CSS (6 points)**
📌 **Question 7 :** Modifier `index.blade.php` pour afficher les articles sous forme de **tableau stylisé** en ajoutant un fichier CSS. *(2 points)*  
📌 **Question 8 :** Améliorer le **formulaire d’édition** pour qu’il soit plus clair et agréable visuellement. *(2 points)*  
📌 **Question 9 :** Vérifier que les boutons sont bien alignés et que l'affichage est **responsive**. *(2 points)*  

---

## **📢 Remarque**
- **Total de l'examen : 40 points.**  
- Tu peux ajouter en bonus :
  - **Une alerte de confirmation** avant la suppression d’un article.  
  - **Un système de filtrage** pour afficher uniquement les articles d’une catégorie donnée.  
  - **Un champ de recherche** pour trouver un article par son titre.  

Bonne chance ! 🚀