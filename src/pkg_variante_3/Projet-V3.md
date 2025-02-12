---
layout: rapport
chapitre: true
package: pkg_variante_3
order: 3
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
               <td class>Variante 3</td>
               <td class="bold">Année de formation : 2024/2025</td>
            </tr>
        </tbody>
</table>

## **Contexte Général**  
Tu travailles sur une **application Laravel** permettant aux membres d’une **association de randonnée** de partager **une seule proposition de randonnée**.  
Les autres membres peuvent ensuite **ajouter des avis et des suggestions d’amélioration**.  

L’application doit permettre :  
- **Chaque membre** peut proposer **une seule randonnée** (*relation One-to-One avec `Membre`*).  
- **Chaque randonnée** peut recevoir plusieurs **avis** (*relation One-to-Many avec `Avis`*).  
- **Les avis** peuvent contenir **des suggestions d’amélioration** (*relation Many-to-Many avec `Suggestion`*).  

L’application doit afficher les propositions de randonnée, mettre à jour certaines de leurs données et permettre l’édition et la suppression des avis.

L’examen est divisé en **deux parties** :

1. **Partie 1 : Live Coding (30 minutes, 20 points)**  
   - Affichage des propositions de randonnée avec leurs avis.  
   - Incrémentation du nombre de vues d’une randonnée et de ses avis via un Service.  
   - Ajout automatique d’une suggestion "Randonnée Recommandée" si une randonnée reçoit plus de 10 avis positifs.  

2. **Partie 2 : Mini-Projet (45 minutes, 20 points)**  
   - Ajout d’un formulaire permettant de modifier les suggestions associées à un avis.  
   - Ajout des boutons "Modifier" et "Supprimer" pour chaque avis.  
   - Amélioration du design de la page avec du CSS.  

---

# **Partie 1 : Live Coding (30 min - 20 points)**  
 **Objectif :**  
- Afficher la liste des propositions de randonnée avec leurs avis.  
- Gérer le nombre de vues des propositions et des avis.  
- Modifier dynamiquement les suggestions d’amélioration d’un avis (*Many-to-Many*).  

## **Barème & Questions (20 points)**
### **Création de la classe `RandonneeService` (6 points)**
 **Question 1 :** Crée une classe `RandonneeService` dans `app/Services/` et ajoute une méthode `getRandonneesWithAvis()` qui retourne la liste des randonnées avec leurs relations (`membre`, `avis`, `suggestions`). *(2 points)*  
 **Question 2 :** Ajoute une méthode `incrementRandonneeViews(Randonnee $randonnee)` qui **incrémente le nombre de vues** de la randonnée et sauvegarde la modification. *(2 points)*  
 **Question 3 :** Ajoute une méthode `incrementAvisViews(Randonnee $randonnee)` qui **incrémente le nombre de vues de chaque avis lié à cette randonnée** et sauvegarde les modifications. *(2 points)*  

---

### **Implémentation du `RandonneeController` (6 points)**
 **Question 4 :** Crée un contrôleur `RandonneeController` et injecte `RandonneeService` dans son constructeur via l’Injection de Dépendance. *(2 points)*  
 **Question 5 :** Implémente une méthode `index()` qui :
- Récupère la liste des randonnées via `RandonneeService`.
- Vérifie si une randonnée doit recevoir automatiquement la suggestion "Randonnée Recommandée" lorsqu’elle dépasse **10 avis positifs**.
- Retourne les données à la vue `index.blade.php`. *(4 points)*  

---

### **Création de la Vue `index.blade.php` (6 points)**
 **Question 6 :** Crée une vue `resources/views/randonnees/index.blade.php` qui affiche les propositions de randonnée sous forme de tableau avec les colonnes suivantes :  
- **Nom de la randonnée**.  
- **Nom du membre** (*relation One-to-One*).  
- **Nombre de vues de la randonnée**.  
- **Liste des avis avec leur propre compteur de vues** (*relation One-to-Many*).  
- **Liste des suggestions d’amélioration associées aux avis** (*relation Many-to-Many*). *(4 points)*  

 **Question 7 :** Tester le bon fonctionnement de l'affichage et s'assurer que les vues des randonnées et des avis sont bien incrémentées après chaque rafraîchissement de la page. *(2 points)*  

---

### **Définition de la Route et Test (2 points)**
 **Question 8 :** Déclare une route `/randonnees` dans `routes/web.php` pour appeler la méthode `index()` du `RandonneeController`. *(1 point)*  
 **Question 9 :** Lancer l’application, tester l’affichage dans le navigateur et vérifier que :
- Les **propositions de randonnées et leurs avis** s’affichent correctement.
- Les **vues des randonnées et des avis** sont bien incrémentées.
- Les **randonnées dépassant 10 avis positifs reçoivent automatiquement la suggestion "Randonnée Recommandée"**. *(1 point)*  

---

# **Partie 2 : Mini-Projet (45 min - 20 points)**  
 **Objectif :**  
- Ajouter une fonctionnalité d’édition des suggestions associées aux avis.  
- Permettre la suppression des avis.  
- Améliorer le design et la responsivité de l’interface.  

## **Barème & Questions (20 points)**
### ** Modification des suggestions d’un avis (8 points)**
 **Question 10 :** Ajouter une méthode `updateAvisSuggestions(Avis $avis, array $suggestionsIds)` dans `RandonneeService` pour **modifier les suggestions associées à un avis**. *(3 points)*  
 **Question 11 :** Créer une méthode `edit($id)` dans `AvisController` qui retourne un formulaire d’édition avec la liste des suggestions disponibles. *(2 points)*  
 **Question 12 :** Implémenter une méthode `update(Request $request, $id)` dans `AvisController` qui met à jour les suggestions associées à un avis en utilisant `RandonneeService`. *(2 points)*  
 **Question 13 :** Implémenter une méthode `show($id)` dans `ArticleController`. *(1 points)* 

---

### **Ajout des boutons "Modifier" et "Supprimer" (6 points)**
 **Question 14 :** Ajouter dans `index.blade.php` une colonne avec **un bouton "Modifier" redirigeant vers la page d'édition** de l’avis. *(2 points)*  
 **Question 15 :** Ajouter **un bouton "Supprimer" avec un formulaire `DELETE`** pour supprimer un avis. *(2 points)*  
 **Question 16 :** Implémenter la méthode `destroy($id)` dans `AvisController` pour gérer la suppression d’un avis. *(2 points)*  

---

### ** Amélioration de l’affichage avec du CSS (6 points)**
 **Question 17 :** Modifier `index.blade.php` pour afficher les randonnées et les avis sous forme de **tableau stylisé** en ajoutant un fichier CSS. *(2 points)*  
 **Question 18 :** Améliorer le **formulaire d’édition** pour qu’il soit plus clair et agréable visuellement. *(2 points)*  
 **Question 19 :** Vérifier que les boutons sont bien alignés et que l'affichage est **responsive**. *(2 points)*  

---

## **Remarque**
- **Total de l'examen : 40 points.**  
- Tu peux ajouter en bonus :
  - **Une alerte de confirmation** avant la suppression d’un avis.  
  - **Un filtre pour afficher uniquement les randonnées les plus vues.**  
  - **Un champ de recherche** pour trouver une randonnée par son auteur.  

Bonne chance ! 🚀