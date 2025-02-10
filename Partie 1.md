# **📌 Énoncé de la Partie 1 : Live Coding (Note sur 20 points)**  
📌 **Durée : 30 minutes**  
📌 **Barème total : 20 points**  
📌 **Objectif :** Tester la capacité à manipuler **les relations Eloquent**, **les services Laravel**, et **la modification d’objets liés**.  

---

## **🔹 Contexte**
Tu développes une application Laravel qui affiche une liste d’articles avec leurs relations. Lors de l'affichage de chaque article, plusieurs mises à jour doivent être effectuées à l’aide d’un **Service (`ArticleService`)** :

1. **Incrémenter le nombre de vues de l'article**.  
2. **Incrémenter le nombre de vues des commentaires liés à cet article**.  
3. **Ajouter automatiquement la catégorie `Populaire` aux articles ayant plus de 10 vues** (*relation Many-to-Many*).  

Tu dois structurer ton code proprement en **séparant la logique métier dans `ArticleService`**.

---

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

## **🔹 Résumé du Barème**
| **Question** | **Description** | **Points** |
|-------------|---------------|------------|
| **1** | `ArticleService` - Récupérer les articles avec leurs relations | 2 |
| **2** | `ArticleService` - Incrémenter le nombre de vues de l’article | 2 |
| **3** | `ArticleService` - Incrémenter le nombre de vues des commentaires | 2 |
| **4** | `ArticleController` - Injection de `ArticleService` | 2 |
| **5** | `ArticleController` - Logique métier (`index()`, gestion des vues & catégories) | 4 |
| **6** | Vue `index.blade.php` - Affichage des articles et relations | 4 |
| **7** | Test de l'affichage et vérification des mises à jour | 2 |
| **8** | Déclaration de la route `/articles` | 1 |
| **9** | Test final et validation des fonctionnalités | 1 |
| **Total** | **Note maximale** | **20** |

---

## **🔹 Critères de Réussite**
✔ **La liste des articles s'affiche correctement.**  
✔ **Le nom de l'auteur est bien affiché.**  
✔ **Le compteur de vues des articles et des commentaires s'incrémente à chaque affichage.**  
✔ **Les commentaires sont bien listés sous chaque article avec leur propre compteur de vues.**  
✔ **Les catégories sont bien listées sous chaque article.**  
✔ **Les articles ayant plus de 10 vues reçoivent bien la catégorie "Populaire".**  
✔ **Le code est structuré proprement et respecte les bonnes pratiques Laravel.**  
✔ **L'exercice est terminé en moins de 30 minutes.**  

---

## **📢 Remarque**
- La **Partie 2 (Mini-Projet, 20 points)** portera sur :
  - **Modification des catégories d’un article (Many-to-Many).**
  - **Ajout d’un bouton "Modifier" et "Supprimer" pour chaque article.**
  - **Ajout de styles CSS pour améliorer l’affichage.**

Bonne chance ! 🚀