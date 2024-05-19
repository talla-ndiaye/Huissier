$(document).ready(function () {
    $(".menu-links li a").click(function (e) {
      $(".menu-links li.active").removeClass("active");
      var $parent = $(this).parent();
      $parent.addClass("active");
    });
    $(".hamburger-icon").click(function () {
      $(".menu-links").toggleClass("left");
    });
    $(".hamburger-icon").click(function () {
      $(this).toggleClass("ham-style");
    });
    const themeSwitch = document.querySelector("#checkbox");
    themeSwitch.addEventListener("change", () => {
      document.body.classList.toggle("dark-theme");
    });
  });
  

 /* debut du script permetatnt de generer la date et l'huere*/
  document.addEventListener('DOMContentLoaded', function() {
    // Mettre à jour la date actuelle
    var currentDateElement = document.getElementById('current-date');
    var now = new Date();
    var day = String(now.getDate()).padStart(2, '0');
    var month = String(now.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0
    var year = now.getFullYear();
    currentDateElement.textContent = day + '/' + month + '/' + year;

    // Calculer le temps restant avant 20h
    function updateTimeRemaining() {
      var timeRemainingElement = document.getElementById('time-remaining');
      var now = new Date();
      var targetTime = new Date();
      targetTime.setHours(20, 0, 0, 0); // 20h00

      if (now > targetTime) {
        // Si c'est après 20h, définissez l'heure cible au jour suivant
        targetTime.setDate(targetTime.getDate() + 1);
      }

      var diff = targetTime - now;
      var hours = Math.floor(diff / (1000 * 60 * 60));
      var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((diff % (1000 * 60)) / 1000);

      timeRemainingElement.textContent = hours + 'h:' + minutes + 'm:' + seconds + 's';
    }

    // Mettre à jour le temps restant toutes les secondes
    setInterval(updateTimeRemaining, 1000);
    updateTimeRemaining(); // Appeler immédiatement pour mettre à jour à l'instant du chargement
  });
  
 /* fin du script permetatnt de generer la date et l'huere*/
