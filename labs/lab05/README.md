# itws1100-chrysn
working url: http://chrysnrpi.eastus.cloudapp.azure.com/iit/index.html

lab url: http://chrysnrpi.eastus.cloudapp.azure.com/iit/labs/lab05/ITWS1100-Lab5-JavaScript%202/lab5.html

username: chrysn

password: Famcomp73!

Learned:

- .focus() => jumps the cursor to that box for the user to fill out

- <iframe> => used in contactme.html to embed lab5.html directly into it 

Created:
- function validate(formObj){}
    - ensures that before user submits form, all fields are filled out

- function clearText() {}
    - for comments section
    - deletes the "Please enter your comments" text when user clicks on section

- function putText() {}
    - for comments section
    - puts back "Please enter your comments" text when user clicks out of the section w/out filling it out

- function getName() {}
    - for "Show Name Info" Button
    - if fields are filled out: pops up their first name, last name, and nickname
    - if fields are not filled out: tell suser to fill out all fields

To solve Crime #1 (Form labels that aren’t associated to form input fields):
    - used 'for' attribute
    - e.g. <label for="firstName" class="field">First Name:</label>

To solve Crime #4 (Not indicating an active form field):
    - used ‘:focus’ selector in lab5.css
    - e.g. input:focus { background-color: #fee; }

To solve Extra Credit (On First Load of the Page, Focus First Form Element):
    - added 'autofocus' => automatically places keyboard focus on that element when web page loads
        - here:<input type="text" size="60" value="" name="firstName" id="firstName" autofocus/>

- product: contact info form