function wait_half_sec(){
    return new Promise(resolve => setTimeout(resolve, 200));
}


async function display_profil_menu(){

    // création du menu
    let div= document.createElement("div");
    document.body.appendChild(div);
    div.classList.add("page_profil");

    // -----------------
    // Fermeture du menu
    // -----------------

    wait_half_sec().then(() => {       
        
        // Bouton de fermeture du menu
        let button = document.createElement("button");
        button.onclick= close_profil_menu;
        button.id = "close_menu";
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
        
        // -------------------------------------------------
        // Séparation entre le profil et les fonctionnalités
        // -------------------------------------------------
        
        let hline = document.createElement("hr");
        div.appendChild(hline);
        
        // --------------
        // Changement mdp
        // --------------
        
        // Bouton qui fait apparaitre le form pour la modification du mdp
        let button_mdp = document.createElement("button");
        button_mdp.innerHTML = "Modifer votre mot de passe";
        button_mdp.id = "formulaire_profil";
        div.appendChild(button_mdp);
        button_mdp.onclick= display_passwd_form;
        
        // Formulaire de modification du mdp
        let formulaire = document.createElement("form");
        div.appendChild(formulaire);
        
        
        // -------------------
        // Bars de progression
        // -------------------
        
        let section = document.createElement("section");
        section.id = "progression";
        div.appendChild(section);
        
        for (let i=0; i < histoires_name_list.length; i++){
            
            // Label de la progress bar
            let progress_label = document.createElement("label");
            progress_label.innerHTML = histoires_name_list[i];
            progress_label.for = "label_" + histoires_id_list[i];
            section.appendChild(progress_label);
            
            // Progress bar
            let progress_bar = document.createElement("progress");
            progress_bar.id = "label_" + histoires_id_list[i];
            progress_bar.value = (histoires_progress_list[i]) * 100;
            progress_bar.max = 100;
            section.appendChild(progress_bar);
            
            // Reset histoire
            let reset = document.createElement("a");
            reset.href = "index.php?action=reset&id_histoire=" + histoires_id_list[i];
            reset.innerHTML = "reset";
            section.appendChild(reset);
            
            // Saut de ligne 
            let br = document.createElement("br");
            section.appendChild(br);
        }
    })
}

async function close_profil_menu(){
    let div = document.querySelector(".page_profil");
    div.classList.add("close_menu_anim");
    div.innerHTML = "";
    wait_half_sec().then(() => {
        document.body.removeChild(div);
    });
}

function display_passwd_form(){
    // Menu du profil
    let div = document.querySelector(".page_profil");

    // Formulaire de modification du mdp
    let formulaire = document.querySelector("form");

    if (formulaire.innerHTML == ""){
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
    } else {
        formulaire.innerHTML = "";
    }
}


function display_stories(){
    let section = document.querySelector(".icon");

    for (let i=0; i < histoires_id_list.length; i++){
        // Div qui contient les infos de l'histoire
        let div = document.createElement("div");
        section.appendChild(div);
        
        // Titre de l'histoire
        let h2 = document.createElement("h2");
        h2.innerHTML = histoires_name_list[i];
        div.appendChild(h2);

        // Création du lien de la page histoire
        let a = document.createElement("a");
        a.href = "vue/histoire_vue.php?id_histoire=" + histoires_id_list[i];
        div.appendChild(a);

        // Création de l'image dans le lien
        let img = document.createElement("img");
        img.src = "vue/images/image_histoire_" + histoires_id_list[i] + ".jpg"; 
        a.appendChild(img);
    }
}