//Start authentication
    //  These functions switch the forms between them
        function changeformtoregister(){
            document.getElementById("conteiner_form_login_sm").style.display="none";
            document.getElementById("conteiner_form_register_sm").style.display="block";
        }

        function changeformtologin(){
            document.getElementById("conteiner_form_login_sm").style.display="block";
            document.getElementById("conteiner_form_register_sm").style.display="none";
        }
//End authentication