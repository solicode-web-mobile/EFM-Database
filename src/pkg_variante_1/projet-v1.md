---
layout: rapport
chapitre: true
package: pkg_variante_1
order: 1
---


<table class="word-style">
        <tbody>
            <tr>
              <td>
                    <img src="{{ site.baseurl }}/assets/images/logo.png"  alt="Logo">
                </td>
                <td colspan="2" class="header">
                    <p>Office de la Formation Professionnelle et de la Promotion du Travail</p>
                    <p>Direction Régionale Nord Ouest II</p>
                </td>
            </tr>
            <tr>
               <td class="bold">Solicode</td>
               <td class="bold">Examen de Fin de Module</td>
               <td class="bold">Date EFM : 12/02/2025</td>
            </tr>
            <tr>
                <td class="bold">Filière : DMB</td>
                <td class="highlight">Base de données</td>
                <td class="bold">Durée : 1 h 30 min</td>
            </tr>
            <tr>
               <td class="bold">Groupe : 101</td>
               <td class>Variante 1</td>
               <td class="bold">Année de formation : 2024/2025</td>
            </tr>
        </tbody>
</table>


## **Contexte Général**
Tu travailles sur une **application Laravel** permettant de gérer des articles de blog avec leurs relations :  
- **Un article appartient à un auteur** (*relation One-to-One avec `User`*).  
- **Un article peut avoir plusieurs commentaires** (*relation One-to-Many avec `Comment`*).  
- **Un article peut appartenir à plusieurs catégories** (*relation Many-to-Many avec `Category`*).  

L’application doit afficher les articles, mettre à jour certaines de leurs données et permettre l’édition et la suppression des articles.

L’examen est divisé en **deux parties** :

1. **Partie 1 : Live Coding (30 minutes, 20 points)**  
   - Affichage des articles et de leurs relations.  
   - Incrémentation du nombre de vues de l’article et de ses commentaires via un Service.  
   - Ajout automatique de la catégorie `Populaire` pour les articles ayant plus de 10 vues.  

2. **Partie 2 : Mini-Projet (45 minutes, 20 points)**  
   - Ajout d’un formulaire permettant de modifier les catégories associées à un article.  
   - Ajout des boutons "Modifier" et "Supprimer" pour chaque article.  
   - Amélioration du design de la page avec du CSS.  



# **Partie 1 : Live Coding (30 min - 20 points)**  

## **Barème & Questions (20 points)**
### **Création de la classe `ArticleService` (6 points)**
- **Question 1 :** Crée une classe `ArticleService` dans `app/Services/` et ajoute une méthode `getArticlesWithRelations()` qui retourne la liste des articles avec leurs relations (`user`, `comments`, `categories`). *(2 points)*  

- **Question 2 :** Ajoute une méthode `incrementArticleViews(Article $article)` qui **incrémente le nombre de vues** de l’article et sauvegarde la modification. *(2 points)*  

- **Question 3 :** Ajoute une méthode `incrementCommentViews(Article $article)` qui **incrémente le nombre de vues de chaque commentaire lié à cet article** et sauvegarde les modifications. *(2 points)*  

### **Implémentation du `ArticleController` (6 points)**

- **Question 4 :** Crée un contrôleur `ArticleController` et injecte `ArticleService` dans son constructeur via l’Injection de Dépendance. *(2 points)*  
- **Question 5 :** Implémente une méthode `index()` qui :
  - Récupère la liste des articles via `ArticleService`.
  - Vérifie si l’article doit recevoir la catégorie `Populaire` (ajouter cette catégorie s’il dépasse **10 vues**).
  - Retourne les données à la vue `index.blade.php`. *(4 points)*  



### **Création de la Vue `index.blade.php` (6 points)**
- **Question 6 :** Crée une vue `resources/views/articles/index.blade.php` qui affiche les articles sous forme de tableau avec les colonnes suivantes :  
  - **Titre de l’article**.  
  - **Nom de l’auteur** (*relation One-to-One*).  
  - **Nombre de vues de l’article**.  
  - **Liste des commentaires avec leur propre compteur de vues** (*relation One-to-Many*).  
  - **Liste des catégories de l’article** (*relation Many-to-Many*). *(4 points)*  

- **Question 7 :** Tester le bon fonctionnement de l'affichage et s'assurer que les vues des articles et des commentaires sont bien incrémentées après chaque rafraîchissement de la page. *(2 points)*  



### **Définition de la Route et Test (2 points)**
- **Question 8 :** Déclare une route `/articles` dans `routes/web.php` pour appeler la méthode `index()` du `ArticleController`. *(1 point)*  
 **Question 9 :** Lancer l’application, tester l’affichage dans le navigateur et vérifier que :
  - Les **articles et leurs relations** s’affichent correctement.
  - Les **vues des articles et des commentaires** sont bien incrémentées.
  - Les **articles populaires (> 10 vues) reçoivent bien la catégorie `Populaire`**. *(1 point)*  



# **Partie 2 : Mini-Projet (45 min - 20 points)**  

## **Barème & Questions (20 points)**
### ** Modification des catégories d’un article (Many-to-Many) (8 points)**
 **Question 10 :** Ajouter une méthode `updateArticleCategories(Article $article, array $categoryIds)` dans `ArticleService` pour **modifier les catégories associées à un article**. *(3 points)*  
 **Question 11 :** Créer une méthode `edit($id)` dans `ArticleController` qui retourne un formulaire d’édition avec la liste des catégories disponibles et celles déjà attachées à l’article. *(2 points)*  
 **Question 12 :** Implémenter une méthode `update(Request $request, $id)` dans `ArticleController` qui met à jour les catégories d’un article en utilisant `ArticleService`. *(2 points)*  
 **Question 13 :** Implémenter une méthode `show($id)` dans `ArticleController`. *(1 points)* 



### **Ajout des boutons "Modifier" et "Supprimer" (6 points)**
 **Question 14 :** Ajouter dans `index.blade.php` une colonne avec **un bouton "Modifier" redirigeant vers la page d'édition** de l'article. *(2 points)*  
 **Question 15 :** Ajouter **un bouton "Supprimer" avec un formulaire `DELETE`** pour supprimer un article. *(2 points)*  
 **Question 16 :** Implémenter la méthode `destroy($id)` dans `ArticleController` pour gérer la suppression d’un article. *(2 points)*  



### **Amélioration de l’affichage avec du CSS (6 points)**
 **Question 17 :** Modifier `index.blade.php` pour afficher les articles sous forme de **tableau stylisé** en ajoutant un fichier CSS. *(2 points)*  
 **Question 18 :** Améliorer le **formulaire d’édition** pour qu’il soit plus clair et agréable visuellement. *(2 points)*  
 **Question 19 :** Vérifier que les boutons sont bien alignés et que l'affichage est **responsive**. *(2 points)*  



## **Remarque**
- **Total de l'examen : 40 points.**  
- Tu peux ajouter en bonus :
  - **Une alerte de confirmation** avant la suppression d’un article.  
  - **Un système de filtrage** pour afficher uniquement les articles d’une catégorie donnée.  
  - **Un champ de recherche** pour trouver un article par son titre.  

Bonne chance ! 🚀