document.getElementById("submit").addEventListener("click", function(e){
 
    //var error_first;
    
    var error_mess;
    
    
    
    
    
    
    var quantite = document.getElementById("quantite");
    
    var num = /^[A-Za-z1-9]+$/;
     
     
    
    if (!quantite.value) {
        error_mess = "quantite Required!!";
    }

    else if (num.test(quantite.value)==false && quantite.value<0)
    {
        error_mess = "quantite must contain positive number!!";
}
    

    
    
    if (error_mess) {
        e.preventDefault();
        document.getElementById("error_mess").innerHTML = error_mess;
        return false;}
        else
        {
            document.getElementById("error_mess").innerHTML = "";
        }

   
});