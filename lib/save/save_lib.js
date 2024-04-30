var save = [];

function save_init(user_id){
    save_file = "lib/save/save_"+user_id+"_lib.js";

    fetch(save_file)
    .then(function (rep) {
        return rep.json();
    })
    .then(function (data) {
        save = data;
    });
}


function create_save(user_id){
    
}

function add_dialog(user_id, story_id, dialog_id){
}