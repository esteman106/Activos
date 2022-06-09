$(document).ready(function(){
$("#login-form").submit(function(){            
        data = $(this).serialize();
        $.ajax({
            type: "POST", 
            dataType: "json",                       
            url: "authenticate",
            data: data,
            success: function(mensajes) {                
                if (mensajes[0] === 100){
                    document.getElementById("mensajes").innerHTML = mensajes[1];
                    location.href="dashboard";
                }
                if (mensajes[0] === 101){
                    document.getElementById("mensajes").innerHTML = mensajes[1];
                    document.getElementById("login-form").reset();                                   
                }
                if (mensajes[0] === 102){
                    document.getElementById("mensajes").innerHTML = mensajes[1];
                    document.getElementById("login-form").reset();
                }
                if (mensajes[0] === 103){
                    document.getElementById("mensajes").innerHTML = mensajes[1];
                    document.getElementById("login-form").reset();
                }
                if (mensajes[0] === 104){
                    document.getElementById("mensajes").innerHTML = mensajes[1];
                    document.getElementById("login-form").reset();
                }                
            },
             error: function(mensajes) {
                alert('Error general contacte administrador' + mensajes);
                document.getElementById("login-form").reset();
            }           
        });         
        return false;
    }); 
});