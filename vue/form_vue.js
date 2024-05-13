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

    if (type == "checkbox"){
        input.onclick = function () {
            this.value = this.value + 1 % 2;
        };
    }

    input.value = value;

    return input;
}
