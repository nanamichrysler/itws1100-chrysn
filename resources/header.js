document.addEventListener('DOMContentLoaded', () => {
  const header = document.getElementById('header');
  header.innerHTML = `
    <div class="banner">
      <a href="/home.php"><h1>Nanami Chrysler</h1></a>
      <div class="nav-links">
        <a href="/home.php" class="button cta">Home</a>
        <a href="/aboutMe/aboutme.html" class="button cta">About Me</a>
        <a href="/classes/classes.html" class="button cta">Classes</a>
        <a href="/projects/project.html" class="button cta">Projects</a>
        <a href="/contactMe/contactme.html" class="button cta">Contact Me</a>
      </div>
    </div>
  `;
});