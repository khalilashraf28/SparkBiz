// mdbootstrap
// Initialization for ES Users
import { Dropdown, Collapse, initMDB } from "mdb-ui-kit";

initMDB({ Dropdown, Collapse });
 
//alpha-tab
document.addEventListener("DOMContentLoaded", function () {
  const projectText = document.getElementById('projectText');
  const clientText = document.getElementById('clientText');

  function toggleText() {
    setTimeout(() => {
      clientText.style.opacity = '1';
      projectText.style.opacity = '0';
    }, 0);

    setTimeout(() => {
      clientText.style.opacity = '0';
      projectText.style.opacity = '1';
    }, 3000); // Adjust the duration as needed
  }

  toggleText(); // Initial call

  // Repeat the animation
  setInterval(toggleText, 6000); // Adjust the interval as needed
});



//counter-tab
function updateProgressBars() {
  // Update values as needed
  const happyClientsProgress = 80;
  const projectsCompletedProgress = 30;
  const projectsRemainingProgress = 10;

  document.getElementById('happyClientsCount').innerText = happyClientsProgress;
  document.getElementById('happyClientsProgressBar').style.setProperty('--progress', `${happyClientsProgress}%`);

  document.getElementById('projectsCompletedCount').innerText = projectsCompletedProgress;
  document.getElementById('projectsCompletedProgressBar').style.setProperty('--progress', `${projectsCompletedProgress}%`);

  document.getElementById('projectsRemainingCount').innerText = projectsRemainingProgress;
  document.getElementById('projectsRemainingProgressBar').style.setProperty('--progress', `${projectsRemainingProgress}%`);
}

// Call the function to update progress bars
updateProgressBars();

