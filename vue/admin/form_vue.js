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
    

    // Affichage en forme de tableaconst [id, histoire] of Object.entries(histoires)u

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
    if (type != "submit"){
        let td_name = document.createElement("td");
        td_name.innerHTML = display_name; // stoque le nom d'affichage dans la case
        tr.appendChild(td_name);
    }

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

    if (type == "checkbox" && value == "1"){
        input.checked = true;
    }

    return input;
}



// permet de créer la section qui accueil les formulaires
function create_section(section_id, section_title){
    let main_section = document.querySelector("#forms");

    let section = document.createElement("section");
    section.id = section_id;
    section.classList.add("form");
    main_section.appendChild(section);

    let title = document.createElement("h3");
    title.innerHTML = section_title;
    section.appendChild(title);
}


function clear_sections(){
    let main_section = document.querySelector("#forms");
    let sections = document.querySelectorAll(".form");

    for (let i=0; i < sections.length; i++){
        let section = sections[i];

        main_section.removeChild(section);        
    }
}


