# cuisineForms974
Application de gestion de formations en cuisine

# Cahier des charges
## Presentation du projet

### Activite de l'entreprise
>Centre de formation de cuisine qui propose des ateliers à des élèves à partir de 12 ans, mais aussi à des particuliers.
Les cours proposés aux particuliers permettent de financer l’achat de matériels et de matières premières.

### Rôle de l'application
- >Nous voulons une application web qui permette à des particuliers de s’inscrire aux ateliers que nous proposons.
- >Nous voulons tester la viabilité de l’application, c’est pourquoi nous voulons une application simple dans un premier temps.

## Objectif de l'application
>Booster cette activité grâce à une application web.

## Cibles
- >Les jeunes actifs entre 25 - 35 ans. 
- >Des personnes qui veulent apprendre à cuisiner afin de manger correctement.

## Objectifs quantitatifs
Nous partons sur le principe que le client souhaite connaître son traffic sur leur application et avoir des statistiques selon les utilisateurs

## Perimètres du projet
L’application doit :
- Fonctionner en ligne
- Afficher correctement sur plusieurs navigateurs récents (Edge, Chrome, Firefox)
- Respecter les normes du W3C
- Etre responsive
- >Il est à noter qu’il n’est pas nécessaire de se soucier du paiement, car cela se fera sur place avant le début des ateliers.

## Description de l'existant
Aucune application existe à ce jour.

### Ressources disponibles

#### Couleurs
 - #d0c62
 - #f3671f

#### Polices
- Les titres doivent utiliser la police Roboto.
- Les autres textes utilisent la police Verdana.

### Ressources humaines
- Chef de projet : Payet Jordan,
- Collaborateurs :
  - XX,
  - XX
Le projet est mené par notre entreprise en fullstack, chacun étant polyvalent, nous interviendront sur chacune des étapes de la construction de l'application.

## Description graphique et ergonomique
Pour la charte graphique nous avons déjà les ressources existantes en termes de palette de couleurs et police.
Reste à déterminer l'interface graphique.

### Interface graphique
>Nous n’avons pas de directives particulières pour la première version de l’application si ce
n’est que l’interface devra être simple et clean.

### Sitemap
### Maquette mobile
### Maquette desktop
### Maquette tablette

## Description fonctionnelle et technique

### Informations relatives aux utilisateurs
Nous avons identifié 2 types d’utilisateurs :
 - Cuisinier :
   - Il créé les ateliers et les propose aux particuliers.
    - Il est défini par son nom, prénom, email et spécialité.
    - Tous les champs sont **obligatoires sauf spécialité**.
  - Particulier :
    - Le particulier s’inscrit à un atelier en entrant son nom prénom, numéro de téléphone et email.
    - Il est défini par les champs nom, prénom, téléphone et emails.
    - Tous les champs sont **obligatoires sauf téléphone**.
  
**Remarque :**
Il ne peut avoir **2 utilisateurs avec le même email**.

## Informations relatives aux ateliers
Chaque atelier possède les champs suivants :
- un titre
- une description du contenu de l’atelier
- une date
- l’horaire de début
- la durée
- le nombre de places disponible
- le nombre de places réservées
- le prix
- une image

Ces champs sont tous obligatoires.
## User story
N°|En tant que|Je veux|Afin de|Critères d'acceptation
:---|:---|:---:|:---:|---:
1|Cuisinier|désactiver/activer|Rendre visible ou invisible pour les particuliers|**Désactiver** l’atelier ne rend plus visible sur la liste des ateliers. **Activer** l’atelier le rend visible sur la liste des ateliers
2|Cuisinier|modifier un atelier|changer les informations rentrées précédemment|Les modifications apparaissent dans la liste des ateliers
3|Cuisinier|créer un atelier|proposer à des particuliers|L’atelier nouvellement créé apparaît dans la liste des ateliers
4|Cuisinier|avoir une interface d’administration sécurisée|d’être le seul à pouvoir modifier mes ateliers|Le cuisinier accède aux pages sécurisées grâce à un login et mot de passe. Le cuisinier ne voit que les ateliers qu’il a créé
5|Particulier|voir la liste des ateliers|s'inscrire à un atelier|Une page qui affiche la liste des ateliers disponibles
6|Particulier|m'inscrire à un atelier|de réserver ma place|Lorsqu'un particulier s'inscrit à un atelier le nombre de place réservées de celui-ci augmente

## Bakclog 
N°|Tâches|Priorisation|Fin
:---|:---|:---:|---:
1|
## Interpretations
- [ ] 2 fichiers json : users + ateliers
- [ ] Accueil = slider des 3 derniers ajouts + fleche vers les autres ateliers
- [ ] Module de connexion
- [ ] Mettre une date d'ajout ou modification de la carte atelier
- [ ] Lier un cuisinier par l'id des ateliers
- [ ] Lier un particulier par l'id de l'atelier auquel il s'sinscrit
- [ ] Page de recapitulatif des ateliers crées par un cuisinier
- [ ] Page de recapitulatif des ateliers auwquels on est inscrit en particulier
- [ ] Page qui renvoie le détail d'un atelier

## Contraintes techniques
### Hébergement
Le site sera hébergé sur heroku via le compte github.

### Logs
Le client souhaite obtenir ses logs de serveur afin d'en assurer la maintenance.

### Technologies
- HTML
- CSS
- BOOTSTRAP
- JQUERY
- PHP
- Bibliothèque d'animation (data-aos)

## Gestion des tâches
[KANBAN Gestion du projet](https://trello.com/b/X1LdLKrI/cuisineforms974)
