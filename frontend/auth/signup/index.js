document.addEventListener("DOMContentLoaded", function(){

    function getElementValue(id){
        let value = document.getElementById(id).value;
        return value;
    }

    document.getElementById("submitRegistration").addEventListener("click", function(e){
        e.preventDefault();

        let username = getElementValue("username");

        console.log(username);
    })
})