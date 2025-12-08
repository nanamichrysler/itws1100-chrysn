<?php 
include('quiz3/includes/config.inc.php'); // database configuration 

//connect to database
@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
   echo '<div class="messages">Could not connect to the database. Error: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}

include('quiz3/includes/header.php'); //includes links to CSS, Java, jQuery
?>

<div class="banner">
  <a href=home.php><h1>Nanami Chrysler</h1></a>
  <div class="nav-links">
    <a href="home.php" class="button cta">Home</a> 
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
    <div class="card"><p>Python</p></div>
    <div class="card"><p>C++</p></div>
    <div class="card"><p>HTML</p></div>
    <div class="card"><p>CSS</p></div>
    <div class="card"><p>Figma</p></div>
    <div class="card"><p>Canva</p></div>
    <div class="card"><p>Market Research</p></div>
    <div class="card"><p>English (native fluency), Japanese (native fluency)</p></div>
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
<!--comment form, generated from ChatGPT -->
<h4>What Did You Think of My Website? Please Share Your Thoughts in the Comments!</h4>
<div id="commentBox">
  <form id="commentForm" action="./quiz3/includes/submit_comment.php" method="POST">
    <div class="comment-fields">
          <input type="text" id="name" name="name" class="comment-field" placeholder="Name" required>
          <input type="email" id="email" name="email" class="comment-field" placeholder="Email" required>
    </div>
    <textarea name="comment" id="comment" name="comment" class="comment-input" required placeholder="Add a comment..."></textarea>
    <button type="submit" class="comment-submit">Comment</button>
  </form>
</div>
<?php
if ($dbOk) { //connected to database
  //retrieve approved comments & order them by newest comments first
  $query = "SELECT visitorName, email, comment, timestamp 
            FROM siteComments 
            WHERE status = 'approved'
            ORDER BY timestamp DESC";

  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result(); //stores all of the approved ocmments

  //display approved comments if there are any, display message if none are approved yet
  if ($result->num_rows === 0) {
    echo '<div class="commentApproved">';
    echo "<p>No comments yet — be the first to leave one!</p>";
    echo '</div>';
  } else {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="commentApproved">';
      echo '<strong>' . htmlspecialchars($row['visitorName']) . '</strong><br>';
      echo '<em>' . htmlspecialchars($row['timestamp']) . '</em><br>';
      echo '<p>' . nl2br(htmlspecialchars($row['comment'])) . '</p>';
      echo '</div>';
    }
  }
  $stmt->close();
}
?>
<br>
<div class="contact-icons">
  <a href="mailto:nanami.jc73@gmail.com">
    <img src="./resources/images/gmail icon.png" alt="Gmail" class="img-gmail">
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
<?php include('quiz3/includes/footer.php') ?>