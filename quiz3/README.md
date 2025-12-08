# itws1100-chrysn
working url: http://chrysnrpi.eastus.cloudapp.azure.com/iit/index.html

username: chrysn

password: Famcomp73!

For home.php (landing page for the home page):
- Database table structure for comments:
    - Database: mySite; table: siteComments
    - Structure:
        - id => smallint, auto_increment
        - visitorName => varchar(255)
        - email => varchar(255)
        - comment => text
        - timestamp => timestamp, default = current_timestamp()
        - status => enum('approved', 'pending'), default = pending

- How to test the comment system:
    1. Visit: http://chrysnrpi.eastus.cloudapp.azure.com/iit/quiz3/admin_comments.php
    2. Log in using this password: test123
    3. If there are no pending comments currently, visit http://chrysnrpi.eastus.cloudapp.azure.com and enter a new comment
    4. Click: approve
    5. Return to http://chrysnrpi.eastus.cloudapp.azure.com to verify that the comment was approved and displayed

- Sections that Used AI assistance:
    - home.php
    - submit_comment.php
    - admin_comments.php

- Resources Consulted: 
    - https://comicbook.com/comics/list/7-most-powerful-avengers-introduced-since-2000/
        - used its comment section layout as reference
    - ChatGPT & Gemini 
        - Please refrer to AI_PROMPTS.txt o see what I prompted the AI models