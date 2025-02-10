# **📌 Examen Final - Base de données**

📌 **Durée : 1h15 (75 minutes)**  
📌 **Note totale : 40 points**  
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

### **🔹 Questions et Barème**
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

# **🟢 Partie 2 : Mini-Projet (45 min - 20 points)**
📌 **Objectif :**  
- Ajouter une fonctionnalité d’édition des catégories des articles.  
- Permettre la suppression des articles.  
- Améliorer le design et la responsivité de l’interface.  

### **🔹 Questions et Barème**
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

## **🔹 Critères de Réussite**
✔ **Les articles s'affichent correctement avec leurs relations (auteur, commentaires, catégories).**  
✔ **Le compteur de vues des articles et des commentaires est bien incrémenté.**  
✔ **Les articles ayant plus de 10 vues reçoivent bien la catégorie "Populaire".**  
✔ **L’édition des catégories fonctionne correctement.**  
✔ **Les boutons "Modifier" et "Supprimer" sont bien intégrés et fonctionnels.**  
✔ **Le CSS est appliqué et améliore l'affichage de l’application.**  
✔ **L'interface est responsive et bien alignée.**  
✔ **Le code est structuré proprement et respecte le principe de séparation des responsabilités.**  

---

## **📢 Remarque**
Tu peux ajouter un **bonus (non noté)** pour aller plus loin :
- Ajouter une **alerte de confirmation** avant la suppression d’un article.  
- Ajouter un **système de filtrage** par catégorie.  
- Ajouter un **champ de recherche** pour trouver un article.  

### **📌 Barème Final**
| Partie | Description | Points |
|--------|------------|--------|
| **Partie 1** | Live Coding - Affichage et mise à jour des articles | **20** |
| **Partie 2** | Mini-Projet - Édition & Suppression avec CSS | **20** |
| **Total** | **Note maximale** | **40** |

Bonne chance ! 🚀