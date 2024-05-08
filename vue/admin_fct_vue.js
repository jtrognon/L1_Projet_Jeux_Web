
// -----------------------------------------------------------------------
// -----------------------------------------------------------------------
// Fonction appelé par la page pour créer les forms avec des champs précis
// -----------------------------------------------------------------------
// -----------------------------------------------------------------------

// --------
// Histoire
// --------

function create_story_form_vue(){
    let section = document.querySelector("#story");

    // Nom des fields
    let tr_names = ["name", ""];
    let tr_display_names = ["Nom de l'histoire : ", ""];
    let tr_types = ["text", "submit"]
    let tr_values = ["", "Ajouter"]

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values); 
}


function update_story_form_vue(tr_values){
    let section = document.querySelector("#story");

    // Nom des champs
    let tr_names = ["id", "name", ""];
    let tr_display_names = ["Identifiant : ", "Nom de l'histoire : ", ""];
    let tr_types = ["text", "text", "submit"];

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values)
}

function delete_story_form_vue(tr_values){
    let section = document.querySelector("#story");

    // Nom des champs
    let tr_names = ["id", ""];
    let tr_display_names = ["Identifiant : ", ""];
    let tr_types = ["text", "submit"];

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


// ---------
// Character
// ---------

function create_char_form_vue(){
    let section = document.querySelector("#character");

    // Noms des champs
    let tr_names = ["image", "name", "color", ""];
    let tr_display_names = ["URL de l'image : ", "Nom du personnage : ", "Couleur du nom : ", ""];
    let tr_types = ["text", "text", "text", "submit"];
    let tr_values = ["", "", "", "Ajouter"];

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


function update_char_form_vue(tr_values){
    let section = document.querySelector("#character");

    // Noms des champs 
    let tr_names = ["id", "image", "name", "color", ""];
    let tr_display_names = ["Identifiant : ", "URL de l'image : ", "Nom du personnage : ", "Couleur du nom : ", ""];
    let tr_types = ["text", "text", "text", "text", "submit"];

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}

function delete_char_form_vue(tr_values){
    let section = document.querySelector("#character");

    // Noms des champs
    let tr_names = ["id", ""];
    let tr_display_names = ["Identifiant : ", ""];
    let tr_types = ["text", "submit"];

    create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values);
}


// -------------------------------------------
// -------------------------------------------
// Fonctions qui servent à créer un formulaire
// -------------------------------------------
// -------------------------------------------

function create_form_vue(section, tr_display_names, tr_names, tr_types, tr_values){
    // création du formulaire

    
    let form = document.createElement("form");
    section.appendChild(form);
    form.method = "post";
    form.target = "admin_vue.php";
    

    // Affichage en forme de tableau

    let table = document.createElement("table");
    form.appendChild(table);


    // Boucle de créations des lignes 
    for (let i=0; i < tr_names.length; i++){
        // Infos
        let name = tr_names[i];
        let display_name = tr_display_names[i];
        let type = tr_types[i];
        let value = tr_values[i];

        let tr = create_tr_line(display_name, name, type, value);
        table.appendChild(tr);
    }
}


function create_tr_line(display_name, name, type, value){
    // Ligne
    let tr = document.createElement("tr");

    // Case d'affichage de nom d'entrée
    let td_name = document.createElement("td");
    td_name.innerHTML = display_name; // stoque le nom d'affichage dans la case
    tr.appendChild(td_name);

    // Case d'entrée
    let td_input = document.createElement("td");
    td_input.appendChild(create_input(name, type, value));
    tr.appendChild(td_input);


    return tr;
}


function create_input(name, type, value){
    let input = document.createElement("input")

    // Paramètre de l'entrée
    input.type = type;
    input.name = name;
    input.value = value;

    return input;
}