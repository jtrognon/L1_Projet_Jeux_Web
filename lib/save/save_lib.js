var save = [];
var user_id = 1;


function save_init(user_id){
    save_file = "lib/save/save_files/save_"+user_id+"_lib.json";

    fetch(save_file)
    .then(function (rep) {
        return rep.json();
    })
    .then(function (data) {
        save = data;
    });
}


function save_upload(){
    save["pouet"] = "truc";

    let json = JSON.stringify(save);

    window.location.href = "/~grp1/lib/save/upload_save_lib.php?user_id="+user_id+"&json="+json;
}


function create_save(user_id){
    
}


function add_story(){}

function add_dialog(user_id, story_id, dialog_id){
}