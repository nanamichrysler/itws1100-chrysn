<?php 
include('resources/includes/config.inc.php'); // database configuration 

@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
   echo '<div class="messages">Could not connect to the database. Error: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}

include('resources/includes/header.php');
?>
    <div class="banner">
      <a href=index.php><h1>Nanami Chrysler</h1></a>
      <div class="nav-links">
        <a href="index.php" class="button cta">Home</a> <!--from .hero .cta class-->
        <a href="./aboutMe/aboutme.html" class="button cta">About Me</a>
        <a href="./labs/labs.html" class="button cta">Labs</a>
        <a href="./groupProjects/groupProject.html" class="button cta">Group Projects</a>
        <a href="./contactMe/contactme.html" class="button cta">Contact Me</a>
      </div>
    </div>
    <div class="home-flex">
      <div class="home-left">
        <h3>Hi, I'm Nanami!</h3>
        <h5>ITWS & Cognitive Science • Portfolio Labs</h5>
        <p class="paragraph-slogan">
            Exploring the intersection of data & creativity.
        </p>
        <p>
          This site showcases my labs from ITWS. Each project applies web development, UX principles,
          and interactive design.
        </p>
        <br>
        <br>
        <br>
        <a href="./labs/labs.html" class="button cta">View Labs</a>
        <a href="./groupProjects/groupProject.html" class="button cta">View Projects</a>
        <a href="./contactMe/contactme.html" class="button cta">Get In Touch</a>
        </div>
      <div class="home-right">
        <img src="./resources/images/headshot.jpg" alt="Headshot" class="img-headshot">
      </div>
    </div>
    <section>
      <h4>Skills</h4>
      <div class="projects-grid">
        <div class="card">
          <p>Python</p>
        </div>
        <div class="card">
          <p>C++</p>
        </div>
        <div class="card">
          <p>HTML</p>
        </div>
        <div class="card">
          <p>CSS</p>
        </div>
        <div class="card">
          <p>Figma</p>
        </div>
        <div class="card">
          <p>Canva</p>
        </div>
        <div class="card">
          <p>Market Research</p>
        </div>
        <div class="card">
          <p>English (native fluency), Japanese (native fluency)</p>
        </div>
      </div>
      <div class="projects-grid">
        <div class="card">
          <p class="paragraph-home">
          Take a look at my RSS feed of this site: <a href="./labs/lab04/rss.xml" class="button cta">RSS feed</a>
          </p>
        </div>
        <div class="card">
          <p class="paragraph-home">
          Take a look at my Atom feed of this site: <a href="./labs/lab04/atom.xml" class="button cta">Atom feed</a>
          </p>
        </div>
      </div>
    </section>
    <div class="contact-icons">
      <a href="mailto:nanami.jc73@gmail.com">
        <img src="./resources/images/gmail icon.png" alt=Gmail" class="img-gmail">
        nanami.jc73@gmail.com
      </a>
      <a href="tel:+15302194452">
        <img src="./resources/images/phone logo.png" alt="Phone" class="img-gmail">
        (530)-219-4452
      </a>
      <a href="https://www.linkedin.com/in/nanami-chrysler" target="_blank">
        <img src="./resources/images/linkedin icon.webp" alt="LinkedIn" class="img-linkedIn">
        www.linkedin.com/in/nanami-chrysler
      </a>
  </div>
  <h2>Visitor Comments</h2>

  <?php
  if ($dbOk) {

    $query = "SELECT visitor_name, email, comment_text, feature, comment_timestamp 
              FROM siteComments 
              WHERE status = 'approved'
              ORDER BY comment_timestamp DESC";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<p>No comments yet — be the first to leave one!</p>";
    } else {
        while ($row = $result->fetch_assoc()) {

          echo '<div class="comment-box">';
          echo '<strong>' . htmlspecialchars($row['visitor_name']) . '</strong><br>';
          echo '<em>' . htmlspecialchars($row['comment_timestamp']) . '</em><br>';
          echo '<p>' . nl2br(htmlspecialchars($row['comment_text'])) . '</p>';

          if (!empty($row['feature'])) {
              echo '<p><b>Feature Suggestion:</b> ' . htmlspecialchars($row['feature']) . '</p>';
          }

          echo '</div><hr>';
        }
    }

    $stmt->close();
  }
  ?>

  <h2>Leave a Comment</h2>

  <form id="commentForm" action="submit_comment.php" method="POST">
      <label>Name (required):</label><br>
      <input type="text" name="name" id="name" required><br><br>

      <label>Email (required):</label><br>
      <input type="email" name="email" id="email" required><br><br>

      <label>Your Comment (required):</label><br>
      <textarea name="comment" id="comment" required></textarea><br><br>

      <label>Feature Suggestion (optional):</label><br>
      <textarea name="feature"></textarea><br><br>

      <button type="submit">Submit Comment</button>
  </form>

  <script>
  document.getElementById("commentForm").onsubmit = function(e) {
      let name = document.getElementById("name").value.trim();
      let email = document.getElementById("email").value.trim();
      let comment = document.getElementById("comment").value.trim();

      if (name === "" || email === "" || comment === "") {
          e.preventDefault();
          alert("Please fill out all required fields.");
      }
  };
  </script>

<?php include('resources/includes/footer.php') ?>