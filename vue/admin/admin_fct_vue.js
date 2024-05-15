
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------- /!\ Formulaires /!\ --------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------

 

// -----------------------------------------------------------------------
// -----------------------------------------------------------------------
// Fonction appelé par la page pour créer les forms avec des champs précis
// -----------------------------------------------------------------------
// -----------------------------------------------------------------------

// --------
// Histoire
// --------

function create_histoire_form_vue(){
    let section = document.querySelector("#histoire");

    // Nom des fields
    let tr_names = ["name", "url_img", "action", "table", ""];
    let tr_display_names = ["Nom de l'histoire : ", "Chemin de l'image : ", "", "", ""];
    let tr_types = ["text", "text", "hidden", "hidden", "submit"]
    let tr_values = ["", "", "create", "histoire", "Ajouter"]

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values); 
}


function update_histoire_form_vue(tr_values){
    let section = document.querySelector("#histoire");

    // Nom des champs
    let tr_names = ["id", "name", "url_img", "action", "table", ""];
    let tr_display_names = ["Identifiant : ", "Nom de l'histoire : ", "Chemin de l'image : ", "", "", ""];
    let tr_types = ["text", "text", "text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["update", "histoire", "Modifier"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values)
}

function delete_histoire_form_vue(tr_values){
    let section = document.querySelector("#histoire");

    // Nom des champs
    let tr_names = ["id", "action", "table", ""];
    let tr_display_names = ["Identifiant : ", "", "", ""];
    let tr_types = ["text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["delete", "histoire", "Supprimer"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


// ---------
// personnage
// ---------

function create_personnage_form_vue(){
    let section = document.querySelector("#personnage");

    // Noms des champs
    let tr_names = ["image", "name", "color", "action", "table", ""];
    let tr_display_names = ["URL de l'image : ", "Nom du personnage : ", "Couleur du nom : ", "", "", ""];
    let tr_types = ["text", "text", "text", "hidden", "hidden", "submit"];
    let tr_values = ["", "", "", "create", "personnage", "Ajouter"];

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


function update_personnage_form_vue(tr_values){
    let section = document.querySelector("#personnage");

    // Noms des champs 
    let tr_names = ["id", "image", "name", "color", "action", "table", ""];
    let tr_display_names = ["Identifiant : ", "URL de l'image : ", "Nom du personnage : ", "Couleur du nom : ", "", "", ""];
    let tr_types = ["text", "text", "text", "text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["update", "personnage", "Modifier"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}

function delete_personnage_form_vue(tr_values){
    let section = document.querySelector("#personnage");

    // Noms des champs
    let tr_names = ["id", "action", "table", ""];
    let tr_display_names = ["Identifiant : ", "", "", ""];
    let tr_types = ["text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["delete", "personnage", "Supprimer"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


// Dialogue

function create_dialogue_form_vue(){
    let section = document.querySelector("#dialogue");

    // Noms des champs
    let tr_names = ["id_histoire", "id_personnage", "texte", "id_suite_dialogue_1", "id_suite_dialogue_2", "id_suite_dialogue_3", "dés", "premier_dialogue", "id_dialogue_necessaire", "action", "table", ""];
    let tr_display_names = ["Identifiant de l'histoire : ", "Identifiant du personnage : ", "Texte de dialogue : ", "ID du prochain dialogue (1) : ", "ID du prochain dialogue (2) : ", "ID du prochain dialogue (3) : ", "Nécessite un dés : ", "Premier dialogue : ", "ID du dialogue nécessaire : ", "", "", ""];
    let tr_types = ["text", "text", "text", "text", "text", "text", "checkbox", "checkbox", "text", "hidden", "hidden", "submit"];
    let tr_values = ["", "", "", "", "", "", "", "", "", "create", "dialogue", "Ajouter"]

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


function update_dialogue_form_vue(tr_values){
    let section = document.querySelector("#dialogue");

    // Noms des champs
    let tr_names = ["id", "id_histoire", "id_personnage", "texte", "id_suite_dialogue_1", "id_suite_dialogue_2", "id_suite_dialogue_3", "dés", "premier_dialogue", "id_dialogue_necessaire", "action", "table", ""];
    let tr_display_names = ["id", "Identifiant de l'histoire : ", "Identifiant du personnage : ", "Texte de dialogue : ", "ID du prochain dialogue (1) : ", "ID du prochain dialogue (2) : ", "ID du prochain dialogue (3) : ", "Nécessite un dés : ", "Premier dialogue : ", "ID du dialogue nécessaire : ", "", "", ""];
    let tr_types = ["text", "text", "text", "text", "text", "text", "text", "checkbox", "checkbox", "text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["update", "dialogue", "Modifier"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


function delete_dialogue_form_vue(tr_values){
    let section = document.querySelector("#dialogue");

    // Noms des champs
    let tr_names = ["id", "action", "table", ""];
    let tr_display_names = ["Identifiant : ", "", "", ""];
    let tr_types = ["text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["delete", "dialogue", "Supprimer"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}




// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------- /!\ Affichages /!\ ---------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------


// Histoires

function display_histoires_vue(histoires){
    // histoires étant un tableau de dictionnaires
    
    let section = document.querySelector("#list");
    
    let ul = document.createElement("ul"); // liste principale
    section.appendChild(ul);

    // Ajout des histoires
    for (const [id, histoire] of Object.entries(histoires)) { // parcours histoires avec les clés et valeurs
        // Infos à afficher
        let name = histoire["nom"];
        let infos = [id, name];

        // Lien pour remplir le formulaire
        let link = "id_histoire=" + id;

        // création du dropdown
        let li = create_dropdown(infos, id, "histoire", link);
        ul.appendChild(li);
    }
}



// Dialogues

function display_dialogues_vue(id_histoire){
    let section = document.querySelector("#histoire_"+id_histoire);
    
    let ul = document.createElement("ul"); // liste principale
    section.appendChild(ul);


    // Ajout des dialogues
    let dialogues = histoires[id_histoire]["dialogues"];

    for (const [id, dialogue] of Object.entries(dialogues)){
        let texte = dialogue["texte"];
        let premier_dialogue = dialogue["premier_dialogue"];

        let infos = [id, texte, premier_dialogue];
        let link = "id_dialogue=" + id;

        let li = create_dropdown(infos, id, "dialogue", link, id_histoire);
        ul.appendChild(li);
    }
}


// Personnage

function display_personnage_vue(id_histoire, id_dialogue){
    let section = document.querySelector("#dialogue_"+id_dialogue);
    
    let ul = document.createElement("ul");
    section.appendChild(ul);
    
    // Ajout du personnage
    let personnage = histoires[id_histoire]["dialogues"][id_dialogue]["personnage"];
    
    let id = personnage["id"];
    let nom = personnage["nom"];
    let url = personnage["url_image"];

    let infos = [id, nom, url];
    let link = "id_personnage=" + id;

    let li = create_dropdown(infos, id, "personnage", link, id_histoire, false); // false permet de ne pas afficher un bouton pour dérouler
    ul.appendChild(li);
}

// --------------------------------
// Fonction pour créer les dropdown
// --------------------------------

function create_dropdown(infos, id, type, link, id_histoire=0, expand=true){
    let li = document.createElement("li");
    li.id = type + "_" + id;

    if (expand){ // == Peut se dérouler
        let expand_button = create_expand_button(id, type, id_histoire);
        li.appendChild(expand_button);
    }

    for (let i=0; i < infos.length; i++){ // Affiche les infos dans le li
        let p = document.createElement("p");
        p.innerHTML = infos[i];

        li.appendChild(p);
    }

    // Permet de donner les infos utiles pour le formulaire de modification
    let a = document.createElement("a"); 
    li.appendChild(a);

    a.href = "admin_vue.php?" + link;
    a.innerHTML = "Modifier";

    return li;
}


function create_expand_button(id, type, id_histoire){
    let button = document.createElement("button");
    
    button.type = "button";
    button.onclick = expand;
    button.innerHTML = "Dérouler";
    
    button.button_type = type;
    button.button_id = id;
    button.button_id_histoire = id_histoire;
    
    
    return button;
}


function expand(){
    let id = this.button_id;
    let id_histoire = this.button_id_histoire;
    let type = this.button_type;
    
    if (type == "histoire"){
        display_dialogues_vue(id);
    } else if (type == "dialogue"){
        display_personnage_vue(id_histoire, id);
    }

}