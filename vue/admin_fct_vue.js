function create_story_form_vue(){
    // Nom des fields
    let tr_names = ["name"];
    let tr_display_names = ["Nom de l'histoire"];

    create_form_vue(tr_display_names, tr_names);
}


function create_form_vue(tr_display_names, tr_names){
    // création du formulaire

    let section = document.querySelector("#story");
    
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

        let tr = create_tr_line(display_name, name);
        table.appendChild(tr);
    }


    let submit = create_input("Créer", "submit");
    form.appendChild(submit);
}


function create_tr_line(display_name, name){
    // Ligne
    let tr = document.createElement("tr");

    // Case d'affichage de nom d'entrée
    let td_name = document.createElement("td");
    td_name.innerHTML = display_name + " : "; // stoque le nom d'affichage dans la case
    tr.appendChild(td_name);

    // Case d'entrée
    let td_input = document.createElement("td");
    td_input.appendChild(create_input(name));
    tr.appendChild(td_input);


    return tr;
}


function create_input(name, type="text"){
    let input = document.createElement("input")
    input.type = type;

    if (type == "text"){
        input.name = name;
    } else {
        input.value = name;
    }

    return input;
}