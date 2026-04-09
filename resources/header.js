document.addEventListener('DOMContentLoaded', () => {
  const header = document.getElementById('header');

  header.innerHTML = `
    <div class="banner">
      <a href="/home.php"><h1>Nanami Chrysler</h1></a>
      <div class="nav-links">
        <a href="/aboutMe/aboutme.html">About Me</a>
        <a href="/classes/classes.html">Classes</a>
        <a href="/projects/project.html">Projects</a>
        <a href="/contactMe/contactme.html">Contact Me</a>
      </div>
    </div>
  `;
});