function display_profil_menu(){

    // création du menu
    let div= document.createElement("div");
    document.body.appendChild(div);
    div.classList.add("page_profil");

    // -----------------
    // Fermeture du menu
    // -----------------
        
    // Bouton de fermeture du menu
    let button = document.createElement("button");
    button.onclick= close_profil_menu;
    div.appendChild(button);

    
    // Image du bouton de fermeture du menu
    let image = document.createElement("img");
    image.src="vue/images/retour.png";
    button.appendChild(image);
    
    
    // ---------------
    // Infos générales
    // ---------------
    
    // Titre du menu
    let texte = document.createElement("h1");
    texte.innerHTML = "PROFIL";
    div.appendChild(texte);

    // Image du profil
    let img = document.createElement("img");
    img.src="vue/images/icon.png";
    div.appendChild(img);

    // Nom de l'utilisateur
    let user_name = document.createElement("p");
    user_name.innerHTML = login;
    div.appendChild(user_name);


    // --------------
    // Changement mdp
    // --------------

    // Bouton qui fait apparaitre le form pour la modification du mdp
    let button_mdp = document.createElement("button");
    button_mdp.innerHTML = "Modifer votre mot de passe";
    div.classList.add("formulaire_profil");
    div.appendChild(button_mdp);
    button_mdp.onclick= display_passwd_form;

    // Formulaire de modification du mdp
    let formulaire = document.createElement("form");
    div.appendChild(formulaire);


    // -------------------
    // Bars de progression
    // -------------------

    for (let i=0; i < histoires_name_list.length; i++){
        // Label de la progress bar
        let progress_label = document.createElement("label");
        progress_label.innerHTML = histoires_name_list[i];
        progress_label.for = "label_" + histoires_id_list[i];
        div.appendChild(progress_label);

        // Progress bar
        let progress_bar = document.createElement("progress");
        progress_bar.id = "label_" + histoires_id_list[i];
        progress_bar.value = (histoires_progress_list[i]) * 100;
        progress_bar.max = 100;
        div.appendChild(progress_bar);

        // Reset histoire
        let reset = document.createElement("a");
        reset.href = "index.php?action=reset&id_histoire=" + histoires_id_list[i];
        reset.innerHTML = "reset";
        div.appendChild(reset);

        // Saut de ligne 
        let br = document.createElement("br");
        div.appendChild(br);
    }
}

function close_profil_menu(){
    let div = document.querySelector(".page_profil");
    document.body.removeChild(div);
}

function display_passwd_form(){
    // Menu du profil
    let div = document.querySelector(".page_profil");

    // Formulaire de modification du mdp
    let formulaire = document.querySelector("form");
    formulaire.innerHTML = "";
    formulaire.action = "index.php?login="+login;
    formulaire.method = "post";
    
    // Entrée du nouveau mdp
    let texte = document.createElement("input");
    texte.type = "text";
    texte.name = "nouveau_mdp";
    formulaire.appendChild(texte);
    
    // Bouton de soumission du formulaire
    let button = document.createElement("input");
    button.type = "submit";
    button.innerHTML="envoyer";
    formulaire.appendChild(button);
}


function display_stories(){
    let section = document.querySelector(".icon");

    for (let i=0; i < histoires_id_list.length; i++){
        // Titre de l'histoire
        let h2 = document.createElement("h2");
        h2.innerHTML = histoires_name_list[i];
        section.appendChild(h2);

        // Création du lien de la page histoire
        let a = document.createElement("a");
        a.href = "vue/histoire_vue.php?id_histoire=" + histoires_id_list[i];
        section.appendChild(a);

        // Création de l'image dans le lien
        let img = document.createElement("img");
        img.src = "vue/images/image_histoire_" + histoires_id_list[i] + ".jpg"; 
        a.appendChild(img);
    }
}