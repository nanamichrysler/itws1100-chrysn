# itws1100-chrysn
working url: http://chrysnrpi.eastus.cloudapp.azure.com/iit/index.html

username: chrysn

password: Famcomp73!

For home.php (landing page for the home page):
- Database table structure for comments:
    - database: mySite; table: siteComments
    - structure:
        - id => smallint, auto_increment
        - visitorName => varchar(255)
        - email => varchar(255)
        - comment => text
        - timestamp => timestamp, default = current_timestamp()
        - status => enum('approved', 'pending'), default = pending

- How to test the comment system:
https://yourwebsite.com/admin_comments.php
pw: test123