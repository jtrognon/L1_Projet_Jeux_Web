PHILIPPE Teva

FAUCON Chloé :)

TROGNON Julie

# Once upon a time… 
# (StoryTelling Corp.)



# Pitch :
Ce site permet de jouer à plusieurs histoires. Celles-ci seront guidées par le choix d’actions et de dialogues. Chaque choix et dialogues sont eux-même la conséquences de plusieurs choix fait précédemment. Un système de lancé de dés (chance de réalisation) permettera de décider des résultats d’une action. Il y aura également un système de sauvegarde permettant au joueur de reprendre à son dernier dialogue. Et ainsi, un système de connexion.

Une page admin permettera de gérer les histoires et leurs contenus. En effet, cette page comprendra l’ajout, la modification, la suppression et la visualisation des histoires et leurs contenus.


# Visuel : 
Quant à l’affichage de la page : 
- Page principale (index) : Menu avec le choix des histoires et le lien vers la page admin.
- Page de connexion : Redirection sur cette page si l’utilisateur n’est pas connecté. Permet également de s’inscrire.
- Page d’histoire (quand une histoire est sélectionnée) : Une barre de navigation contenant le titre de l’histoire, un lien pour accéder au profil de l’utilisateur, un lien pour la sauvegarde et le retour au menu.

Le contenu principal de la page sera l’hsitoire en elle-même, avec les choix à faire et les trois dialogues précédents.


# Tâches : 

## Visuel (Teva & Chloé & Julie)
- Page de connexion (connexion et inscription) **(Teva)**
    - page de connexion
    - page d'inscription
- Page de menu **(Rania)**
    - lien vers profil
    - choix des histoires
    - lien vers admin
- Page de profil **(Rania)**
    - Déconnexion
    - changement username
    - changement mot de passe
    - Affichage progression
    - Ecraser progression
- Page admin **(Julie)**
    - Suppression
    - Ajout
    - Modification
    - Affichage de tout les dialogues de toutes les histoires
- Page d’histoire **(Teva)**
    - barre de navigation
        - profil
        - retour au menu
        - aide (optionnel si on a le temps)
    - fenetre principale
        - affichage des 3 dialogues précédents
        - le choix des dialogues
        - image des personnages
        - image de fond
        - affichage du lancé de dés

## Logique du site (Teva et Julie)
- Gestion du choix de l’utilisateur
- Sauvegarde (dans fichier json)
    - {
        [
        - id_histoire : [

            id_dialogue_1,
            
            id_dialogue_2,
            
            ...
            
            id_dernier dialogue

            ],

        ],
    
    }
- Connexion, inscription et déconnexion (Teva)
    - Connexion
    - Inscription
    - Déconnexion
- Lancé de dés

## CRUD (Chloé)
- CRUD  des histoires, dialogues et utilisateurs.
    - Dialogue
        - id
        - id_histoire
        - id personnage
        - texte
        - id_suite_dialogue_1 (celui qui vient après)
        - id_suite_dialogue_2 (potentiellement vide)
        - id_suite_dialogue_3
        - dés (boolean pour savoir si ce dialogue utilise un lancé de dés)
    - Histoire 
        - id
        - nom
    - Personnage
        - id
        - url_image
        - nom
        - couleur




# Structure fichiers

- **vue**
    - **images**
    - **css**
    - *truc_vue.js*

- **db**
    - db_connect.php
    - db_disconnect.php

- **CRUD**
    - *truc_crud.php*

- **lib**
    - *truc_lib.js*
