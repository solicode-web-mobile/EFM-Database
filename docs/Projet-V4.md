# **📌 Examen Final - Gestion des Stratégies d’Entraînement en Football avec Laravel (Note sur 40 points)**  
📌 **Durée : 1h15 (75 minutes)**  
📌 **Barème total : 40 points**  
📌 **Objectif :** Tester la capacité à **gérer les relations en Laravel, modifier des objets liés via un Service, structurer proprement le code et améliorer l’interface utilisateur**.  

---

## **🔹 Contexte Général**  
Tu travailles sur une **application Laravel** permettant aux joueurs d’une équipe de football de proposer **une seule stratégie d’entraînement**.  
Les autres joueurs peuvent ensuite **donner leur avis** sur la stratégie proposée.  

L’application doit permettre :  
- **Chaque joueur** peut proposer **une seule stratégie d’entraînement** (*relation One-to-One avec `Joueur`*).  
- **Chaque stratégie** peut recevoir plusieurs **avis** (*relation One-to-Many avec `Avis`*).  
- **Les avis** peuvent contenir **un type de feedback** (*relation Many-to-Many avec `TypeFeedback`*).  

L’application doit afficher les stratégies proposées, mettre à jour certaines de leurs données et permettre l’édition et la suppression des avis.

L’examen est divisé en **deux parties** :

1. **🔴 Partie 1 : Live Coding (30 minutes, 20 points)**  
   - Affichage des stratégies d’entraînement avec leurs avis.  
   - Incrémentation du nombre de vues d’une stratégie et de ses avis via un Service.  
   - Ajout automatique d’un feedback "Stratégie Validée" si une stratégie reçoit plus de 10 avis positifs.  

2. **🟢 Partie 2 : Mini-Projet (45 minutes, 20 points)**  
   - Ajout d’un formulaire permettant de modifier les types de feedback d’un avis.  
   - Ajout des boutons "Modifier" et "Supprimer" pour chaque avis.  
   - Amélioration du design de la page avec du CSS.  

---

# **🔴 Partie 1 : Live Coding (30 min - 20 points)**  
📌 **Objectif :**  
- Afficher la liste des stratégies d’entraînement avec leurs avis.  
- Gérer le nombre de vues des stratégies et des avis.  
- Modifier dynamiquement les feedbacks d’un avis (*Many-to-Many*).  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Création de la classe `StrategieService` (6 points)**
📌 **Question 1 :** Crée une classe `StrategieService` dans `app/Services/` et ajoute une méthode `getStrategiesWithAvis()` qui retourne la liste des stratégies avec leurs relations (`joueur`, `avis`, `typeFeedback`). *(2 points)*  
📌 **Question 2 :** Ajoute une méthode `incrementStrategieViews(Strategie $strategie)` qui **incrémente le nombre de vues** de la stratégie et sauvegarde la modification. *(2 points)*  
📌 **Question 3 :** Ajoute une méthode `incrementAvisViews(Strategie $strategie)` qui **incrémente le nombre de vues de chaque avis lié à cette stratégie** et sauvegarde les modifications. *(2 points)*  

---

### **2️⃣ Implémentation du `StrategieController` (6 points)**
📌 **Question 4 :** Crée un contrôleur `StrategieController` et injecte `StrategieService` dans son constructeur via l’Injection de Dépendance. *(2 points)*  
📌 **Question 5 :** Implémente une méthode `index()` qui :
- Récupère la liste des stratégies via `StrategieService`.
- Vérifie si une stratégie doit recevoir automatiquement le feedback "Stratégie Validée" lorsqu’elle dépasse **10 avis positifs**.
- Retourne les données à la vue `index.blade.php`. *(4 points)*  

---

### **3️⃣ Création de la Vue `index.blade.php` (6 points)**
📌 **Question 6 :** Crée une vue `resources/views/strategies/index.blade.php` qui affiche les stratégies sous forme de tableau avec les colonnes suivantes :  
- **Nom de la stratégie**.  
- **Nom du joueur** (*relation One-to-One*).  
- **Nombre de vues de la stratégie**.  
- **Liste des avis avec leur propre compteur de vues** (*relation One-to-Many*).  
- **Liste des feedbacks associés aux avis** (*relation Many-to-Many*). *(4 points)*  

📌 **Question 7 :** Tester le bon fonctionnement de l'affichage et s'assurer que les vues des stratégies et des avis sont bien incrémentées après chaque rafraîchissement de la page. *(2 points)*  

---

### **4️⃣ Définition de la Route et Test (2 points)**
📌 **Question 8 :** Déclare une route `/strategies` dans `routes/web.php` pour appeler la méthode `index()` du `StrategieController`. *(1 point)*  
📌 **Question 9 :** Lancer l’application, tester l’affichage dans le navigateur et vérifier que :
- Les **stratégies d’entraînement et leurs avis** s’affichent correctement.
- Les **vues des stratégies et des avis** sont bien incrémentées.
- Les **stratégies dépassant 10 avis positifs reçoivent automatiquement le feedback "Stratégie Validée"**. *(1 point)*  

---

# **🟢 Partie 2 : Mini-Projet (45 min - 20 points)**  
📌 **Objectif :**  
- Ajouter une fonctionnalité d’édition des feedbacks associés aux avis.  
- Permettre la suppression des avis.  
- Améliorer le design et la responsivité de l’interface.  

## **🔹 Barème & Questions (20 points)**
### **1️⃣ Modification des feedbacks d’un avis (8 points)**
📌 **Question 1 :** Ajouter une méthode `updateAvisFeedback(Avis $avis, array $feedbackIds)` dans `StrategieService` pour **modifier les feedbacks associés à un avis**. *(3 points)*  
📌 **Question 2 :** Créer une méthode `edit($id)` dans `AvisController` qui retourne un formulaire d’édition avec la liste des feedbacks disponibles. *(2 points)*  
📌 **Question 3 :** Implémenter une méthode `update(Request $request, $id)` dans `AvisController` qui met à jour les feedbacks d’un avis en utilisant `StrategieService`. *(2 points)*  
📌 **Question 4 :** Implémenter une méthode `show($id)` dans `ArticleController`. *(1 points)* 

---

### **2️⃣ Ajout des boutons "Modifier" et "Supprimer" (6 points)**
📌 **Question 4 :** Ajouter dans `index.blade.php` une colonne avec **un bouton "Modifier" redirigeant vers la page d'édition** de l’avis. *(2 points)*  
📌 **Question 5 :** Ajouter **un bouton "Supprimer" avec un formulaire `DELETE`** pour supprimer un avis. *(2 points)*  
📌 **Question 6 :** Implémenter la méthode `destroy($id)` dans `AvisController` pour gérer la suppression d’un avis. *(2 points)*  

---

### **3️⃣ Amélioration de l’affichage avec du CSS (6 points)**
📌 **Question 7 :** Modifier `index.blade.php` pour afficher les stratégies et les avis sous forme de **tableau stylisé** en ajoutant un fichier CSS. *(2 points)*  
📌 **Question 8 :** Améliorer le **formulaire d’édition** pour qu’il soit plus clair et agréable visuellement. *(2 points)*  
📌 **Question 9 :** Vérifier que les boutons sont bien alignés et que l'affichage est **responsive**. *(2 points)*  

---

## **📢 Remarque**
- **Total de l'examen : 40 points.**  
- Tu peux ajouter en bonus :
  - **Une alerte de confirmation** avant la suppression d’un avis.  
  - **Un filtre pour afficher uniquement les stratégies les plus vues.**  
  - **Un champ de recherche** pour trouver une stratégie par son auteur.  

Bonne chance ! 🚀