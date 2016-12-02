/**
 * Created by jesus on 01/12/2016.
 */


function mostraForm() {
    for(var i = 0;i<document.getElementById("parti").value;i++){
        document.getElementById("repForm").innerHTML += "<p><label>Party <input type='text' name='party-"+ i +"'/></label></p>";
        document.getElementById("repForm").innerHTML += "<p><label>Representatives <input type='text' name='votes-"+ i +"'/></label></p>";
        document.getElementById("repForm").innerHTML += "<hr/>";
    }
    document.getElementById("repForm").style.display= 'block';
    document.getElementById("repForm").innerHTML += "<p><input type='submit' name='votes' value='Introduce Votes'/>";
    document.getElementById("button").style.display = 'none';
}