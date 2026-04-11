document.addEventListener('DOMContentLoaded', () => {
  const header = document.getElementById('header');
  header.innerHTML = `
    <div class="banner">
      <a href="/iit/home.php"><h1>Nanami Chrysler</h1></a>
      <div class="nav-links">
        <a href="/iit/classes/classes.html">Classes</a>
        <a href="/iit/projects/project.html">Projects</a>
        <a href="/iit/contactMe/contactme.html">Contact Me</a>
      </div>
    </div>
  `;
});