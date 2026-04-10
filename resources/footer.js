document.addEventListener('DOMContentLoaded', () => {
  const footerContainer = document.getElementById('footer-content');

  const footerData = {
    "sections": [
      {
        "title": "Nanami Chrysler",
        "link": "../home.php",
        "content": [
          "ITWS & Cognitive Science student focused on web development, UX, and consulting."
        ]
      },
      {
        "title": "Classes",
        "link": "../classes/classes.html",
        "content": []
      },
      {
        "title": "Projects",
        "link": "../projects/project.html",
        "content": []
      },
      {
        "title": "Contact Me",
        "link": "../contactMe/contactme.html",
        "content": [
          {
            "text": "Email", 
            "link": "mailto:nanami.jc73@gmail.com",
            "icon": "/iit/resources/images/gmail icon.png"
          },
          {
            "text": "LinkedIn", 
            "link": "https://www.linkedin.com/in/nanami-chrysler/",
            "icon": "/iit/resources/images/linkedin icon.webp",
            "target": "blank" 
          }
        ]
      }
    ]
  };

  footerData.sections.forEach(section => {
    const sectionDiv = document.createElement('div');
    sectionDiv.className = 'footer-section';

    // h4 title — wrap in <a> if section has a link
    const h4 = document.createElement('h4');
    h4.textContent = section.title;

    if (section.link) {
      const a = document.createElement('a');
      a.href = section.link;
      a.appendChild(h4);
      sectionDiv.appendChild(a);
    } else {
      sectionDiv.appendChild(h4);
    }

    // content items — separate loop
    section.content.forEach(item => {
      if (typeof item === 'string') {
        const p = document.createElement('p');
        p.textContent = item;
        sectionDiv.appendChild(p);
      } else if (item.text && item.link) {
        const a = document.createElement('a');
        a.href = item.link;
        a.className = 'footer-link';

        // add image if it exists
        if (item.icon) {
          const img = document.createElement('img');
          img.src = item.icon;
          img.alt = item.text;
          img.className = 'img-footer';
          a.appendChild(img);
        }

        // add text after image
        const span = document.createElement('span');
        span.textContent = item.text;
        a.appendChild(span);

        sectionDiv.appendChild(a);
      }
    });

    footerContainer.appendChild(sectionDiv);
  });
});