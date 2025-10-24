/*ici on fait de tel sorte que l'orsqu'on appuit sur submit il affiche uun alert pour nous dire qu'on s'est crer un compte
et nous redirige vers se conecter(DOMContentLoaded pour que tout l'html se charge d'abord, 
event.preventDefault()pour ne pas reactualiser la page donc l'alert ne s'afficherais pas )     
document.addEventListener("DOMContentLoaded", function() {
    let seconte=document.getElementById("submit");
    seconte.onclick = function(event) {
        event.preventDefault();
        ///console.log("js charger");
        alert("inscription reussie,SE CONNECTEZ");
        window.location.assign('http://localhost/GreenMind/connection.php');
    
    };
    });
*/
function afficherHeure() {
  const maintenant = new Date();
  const options = {
    timeZone: 'Africa/Dakar',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit'
  };
  const heure = maintenant.toLocaleTimeString('fr-FR', options);
  document.getElementById('heure').textContent = heure;
}

// Actualiser chaque seconde
setInterval(afficherHeure, 1000);
afficherHeure();


    