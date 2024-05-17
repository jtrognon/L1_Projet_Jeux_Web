
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------- /!\ Formulaires /!\ --------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------

 // Choix des formulaires

function forms_choice(){
    let choice = document.querySelector("#choix_forms").selectedOptions[0].value;
    clear_sections();

    if (choice == "histoire"){
        display_histoire_forms_vue();
    } else if (choice == "personnage"){
        display_personnage_forms_vue();
    } else {
        display_dialogue_forms_vue();
    }
}


function form_type_choice(){
    let forms_choice = document.querySelector("#choix_forms").selectedOptions[0].value;
    let type_choice = document.querySelector("#choix_form_type").selectedOptions[0].value;
    
    console.log(type_choice);

    clear_sections() // Supprime tout les formulaires

    if (forms_choice == "histoire"){
        display_histoire_forms_vue(type_choice);
    } else if (forms_choice == "personnage"){
        display_personnage_forms_vue(type_choice);
    } else {
        display_dialogue_forms_vue(type_choice);
    }
}


// -----------------------------------------------------------------------
// -----------------------------------------------------------------------
// Fonction appelé par la page pour créer les forms avec des champs précis
// -----------------------------------------------------------------------
// -----------------------------------------------------------------------

// --------
// Histoire
// --------

function display_histoire_forms_vue(type_choice="all"){
    create_section("histoire", "Histoire : "); // créé la section histoire qui permet d'ajouter les forms

    if (type_choice == "all"){
        create_histoire_form_vue(histoire_infos.slice(1)); // form de création
        update_histoire_form_vue(histoire_infos); // form de mise à jour
        delete_histoire_form_vue(id_histoire); // form pour la suppression
    } else if (type_choice == "create"){
        create_histoire_form_vue(histoire_infos.slice(1));
    } else if (type_choice == "update"){
        update_histoire_form_vue(histoire_infos);
    } else {
        delete_histoire_form_vue(id_histoire);
    }
}


function create_histoire_form_vue(tr_values){
    let section = document.querySelector("#histoire");

    // Nom des fields
    let tr_names = ["name", "url_img", "action", "table", ""];
    let tr_display_names = ["Nom de l'histoire : ", "Chemin de l'image : ", "", "", ""];
    let tr_types = ["text", "text", "hidden", "hidden", "submit"]
    tr_values = tr_values.concat(["create", "histoire", "Ajouter"]);

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

function display_personnage_forms_vue(type_choice="all"){
    create_section("personnage", "Personnage : "); // créé la section personnage qui permet d'ajouter les forms

    if (type_choice == "all"){
        create_personnage_form_vue(personnage_infos.slice(1)); // form de création
        update_personnage_form_vue(personnage_infos); // form de mise à jour
        delete_personnage_form_vue(id_personnage); // form pour la suppression
    } else if (type_choice == "create"){
        create_personnage_form_vue(personnage_infos.slice(1));
    } else if (type_choice == "update"){
        update_personnage_form_vue(personnage_infos);
    } else {
        delete_personnage_form_vue(id_personnage);
    }
}

function create_personnage_form_vue(tr_values){
    let section = document.querySelector("#personnage");

    // Noms des champs
    let tr_names = ["image", "name", "color", "action", "table", ""];
    let tr_display_names = ["URL de l'image : ", "Nom du personnage : ", "Couleur du nom : ", "", "", ""];
    let tr_types = ["text", "text", "color", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["create", "personnage", "Ajouter"]);

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


function update_personnage_form_vue(tr_values){
    let section = document.querySelector("#personnage");

    // Noms des champs 
    let tr_names = ["id", "image", "name", "color", "action", "table", ""];
    let tr_display_names = ["Identifiant : ", "URL de l'image : ", "Nom du personnage : ", "Couleur du nom : ", "", "", ""];
    let tr_types = ["text", "text", "text", "color", "hidden", "hidden", "submit"];
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
function display_dialogue_forms_vue(type_choice="all"){
    create_section("dialogue", "Dialogue : "); // créé la section dialogue qui permet d'ajouter les forms

    if (type_choice == "all"){
        create_dialogue_form_vue(dialogue_infos.slice(1)); // form de création
        update_dialogue_form_vue(dialogue_infos); // form de mise à jour
        delete_dialogue_form_vue(id_dialogue); // form pour la suppression
    } else if (type_choice == "create"){
        create_dialogue_form_vue(dialogue_infos.slice(1));
    } else if (type_choice == "update"){
        update_dialogue_form_vue(dialogue_infos);
    } else {
        delete_dialogue_form_vue(id_dialogue);
    }
}

function create_dialogue_form_vue(tr_values){
    let section = document.querySelector("#dialogue");

    // Noms des champs
    let tr_names = ["id_histoire", "id_personnage", "texte", "id_suite_dialogue_1", "id_suite_dialogue_2", "id_suite_dialogue_3", "dés", "premier_dialogue", "id_dialogue_necessaire", "action", "table", ""];
    let tr_display_names = ["Identifiant de l'histoire : ", "Identifiant du personnage : ", "Texte de dialogue : ", "ID du prochain dialogue (1) : ", "ID du prochain dialogue (2) : ", "ID du prochain dialogue (3) : ", "Nécessite un dés : ", "Premier dialogue : ", "ID du dialogue nécessaire : ", "", "", ""];
    let tr_types = ["text", "text", "text", "text", "text", "text", "checkbox", "checkbox", "text", "hidden", "hidden", "submit"];
    tr_values = tr_values.concat(["create", "dialogue", "Ajouter"]);

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

        // création du dropdown
        let li = create_dropdown(infos, id, "histoire", id);
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

        let li = create_dropdown(infos, id, "dialogue", id_histoire);
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

    let li = create_dropdown(infos, id, "personnage", id_histoire, false); // false permet de ne pas afficher un bouton pour dérouler
    ul.appendChild(li);
}


function display_all_personnage_vue(personnage_list){
    let section = document.querySelector("#list");

    let ul = document.createElement("ul");
    section.appendChild(ul);

    for (let i=0; i < personnage_list.length; i++){
        let personnage = personnage_list[i];

        
    let id = personnage["id"];
    let nom = personnage["nom"];
    let url = personnage["url_image"];

    let infos = [id, nom, url];

    let li = create_dropdown(infos, id, "personnage", 0, false); // false permet de ne pas afficher un bouton pour dérouler
    ul.appendChild(li);
    }
}


// --------------------------------
// Fonction pour créer les dropdown
// --------------------------------

function create_dropdown(infos, id, type, id_histoire=0, expand=true){
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

    let a = create_auto_fill_button(id, type);
    li.appendChild(a);
    

    return li;
}

function create_auto_fill_button(id, type){
    let a = document.createElement("a");
    a.href = "admin_vue.php?id_" + type + "=" + id;
    a.innerHTML = "Modifier";

    return a;
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
        let histoire = document.querySelector("#histoire_" + id_histoire);
        
        if (histoire.children.length < 5){
            display_dialogues_vue(id);
        } else {
            let dialogues = histoire.children[4];
            histoire.removeChild(dialogues);
        }
    } else if (type == "dialogue"){
        let dialogue = document.querySelector("#dialogue_" + id);

        if (dialogue.children.length < 6){
            display_personnage_vue(id_histoire, id);
        } else {
            let personnage = dialogue.children[5];
            dialogue.removeChild(personnage);
        }
    }

}