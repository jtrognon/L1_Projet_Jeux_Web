// let choices = [{"text" : "Je suis le choix 1", "id": 2}, {"text" : "choix 2", "id": 3}];
// add_choices(choices);

function add_choices(choices){
  let form = document.querySelector("#choix");

  for (let i=0; i < choices.length; i++){
    let choice = choices[i];

    let button = create_choice_button(choice);
    form.appendChild(button);
  }
}



function create_choice_button(choice){
  let button = document.createElement("input");
  button.type = "button";
  button.value = choice["text"];
  button.id = choice["id"];

  return button;
}