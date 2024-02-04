function validateForm() {
    var name =  document.getElementById('name').value;
    if (name == "") {
        document.querySelector('.status').innerHTML = "El nombre no puede estar vacio";
        return false;
    }
    var email =  document.getElementById('email').value;
    if (email == "") {
        document.querySelector('.status').innerHTML = "El email no puede estar vacio";
        return false;
    } else {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(email)){
            document.querySelector('.status').innerHTML = "Formato de email invalido";
            return false;
        }
    }
    var subject =  document.getElementById('subject').value;
    if (subject == "") {
        document.querySelector('.status').innerHTML = "El asunto no puede estar vacio";
        return false;
    }
    var message =  document.getElementById('message').value;
    if (message == "") {
        document.querySelector('.status').innerHTML = "El mensaje no puede estar vacio";
        return false;
    }
    document.querySelector('.status').innerHTML = "Enviado correctamente";

    document.getElementById('name').value="";
    document.getElementById('email').value="";
    document.getElementById('subject').value="";
    document.getElementById('message').value="";
  }