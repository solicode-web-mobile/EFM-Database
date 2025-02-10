# **📌 Énoncé de la Partie 2 : Mini-Projet (Note sur 20 points)**
📌 **Durée : 30 à 45 minutes**  
📌 **Barème total : 20 points**  
📌 **Objectif :** Tester la capacité à **modifier des relations Many-to-Many**, **gérer l’édition et la suppression d’articles**, et **ajouter du style à l’interface**.

---

## **🔹 Contexte**
Tu dois améliorer la gestion des articles du blog en ajoutant :  
1. **Un formulaire pour modifier les catégories associées à un article** (*relation Many-to-Many*).  
2. **Un bouton "Modifier" et un bouton "Supprimer" pour chaque article**.  
3. **Un peu de CSS pour rendre l’affichage plus agréable**.

Tu dois structurer ton code en respectant **le principe de séparation des responsabilités** en utilisant **`ArticleService`** pour la gestion des modifications.

---

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

## **🔹 Résumé du Barème**
| **Question** | **Description** | **Points** |
|-------------|---------------|------------|
| **1** | `ArticleService` - Modifier les catégories d’un article | 3 |
| **2** | `ArticleController` - Formulaire d’édition des catégories | 2 |
| **3** | `ArticleController` - Mise à jour des catégories d’un article | 3 |
| **4** | Vue `index.blade.php` - Bouton "Modifier" | 2 |
| **5** | Vue `index.blade.php` - Bouton "Supprimer" | 2 |
| **6** | `ArticleController` - Suppression d’un article | 2 |
| **7** | CSS - Améliorer l’affichage des articles | 2 |
| **8** | CSS - Améliorer l’affichage du formulaire d’édition | 2 |
| **9** | CSS - Vérifier l’alignement et la responsivité | 2 |
| **Total** | **Note maximale** | **20** |

---

## **🔹 Étapes Progressives**
### 📌 **1️⃣ Modification des catégories d’un article**
- Ajouter la **méthode de mise à jour des catégories** dans `ArticleService`.  
- Créer une **page de modification** qui affiche les catégories déjà associées à l’article.  
- Ajouter une case à cocher permettant **d’attacher ou de détacher** une catégorie.  
- Gérer la mise à jour avec la méthode `update()`.  

### 📌 **2️⃣ Ajout des boutons "Modifier" et "Supprimer"**
- Ajouter **un bouton "Modifier"** qui redirige vers la page d’édition.  
- Ajouter **un bouton "Supprimer"** qui utilise un formulaire `DELETE` pour supprimer un article.  
- Gérer la suppression dans `ArticleController`.  

### 📌 **3️⃣ Ajout du CSS**
- Modifier `index.blade.php` pour améliorer l’affichage de la table.  
- Modifier le **formulaire d’édition** pour qu’il soit plus esthétique.  
- Vérifier que l’affichage est **responsive** et bien aligné.  

---

## **🔹 Critères de Réussite**
✔ **La modification des catégories fonctionne correctement.**  
✔ **Les boutons "Modifier" et "Supprimer" sont bien ajoutés et fonctionnels.**  
✔ **L'affichage est clair et agréable grâce au CSS.**  
✔ **L’interface est responsive et bien alignée.**  
✔ **Le code est structuré et respecte le principe de séparation des responsabilités.**  
✔ **L'exercice est terminé en moins de 45 minutes.**  

---

## **📢 Remarque**
Si tu veux aller plus loin, tu peux proposer en **bonus** :  
- **Une alerte de confirmation** avant la suppression d’un article.  
- **Un système de filtrage** pour afficher uniquement les articles d’une catégorie donnée.  
- **Un champ de recherche** pour trouver un article par son titre.  

Bonne chance ! 🚀