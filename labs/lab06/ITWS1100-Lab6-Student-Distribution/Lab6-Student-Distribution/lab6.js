/* Lab 6 - Student jQuery Exercises */
/* ================================= */
/* Complete the 5 problems below by writing jQuery code */
/* Use the framework functions like logToConsole() to help debug */

/* ========================================== */
/* 📋 IMPORTANT: SUBMISSION REQUIREMENTS     */
/* ========================================== */
/* 
/* 🔧 GIT WORKFLOW:
/*    1. Create a new branch: git checkout -b lab6
/*    2. Work on your solutions in this branch
/*    3. Test thoroughly before committing
/*    4. When complete: git add . && git commit -m "Complete Lab 6 jQuery exercises"
/*    5. Switch back to main: git checkout main
/*    6. Merge your work: git merge lab6
/*    7. Push to GitHub: git push origin main
/*
/* 🌐 DEPLOYMENT:
/*    8. Deploy your updated repository to your Azure Web App
/*    9. Verify your lab works correctly on your live site
/*
/* 📁 SUBMISSION TO LMS:
/*    10. Update your README.md file with Lab 6 information
/*    11. Add a link to Lab 6 on your personal website's landing page
/*    12. Create a ZIP file of your entire repository folder
/*    13. Submit the ZIP file to the LMS
/*
/* ⚠️  DON'T FORGET:
/*    - Test your live site before submitting
/*    - Include updated README.md in your repository
/*    - Add Lab 6 link to your website's main navigation/landing page
/*    - Verify all 5 problems work correctly
/*
/* ========================================== */

// jQuery Document Ready - This runs when the page is fully loaded
$(document).ready(function () {

    
    // ============================================
    // PROBLEM 1: PERSONAL INFORMATION & STYLING
    // ============================================
    // 🎯 GOAL: When someone clicks the h1 heading, replace "Your Name" 
    //          with your actual name and apply custom styling
    // 
    // 📝 REQUIREMENTS:
    //    - Change "Your Name" to your actual name
    //    - Apply small caps (font-variant: small-caps)
    //    - Change color (not blue or black)
    //    - Set font size to 200% (font-size: 200%)
    //
    // 💡 HINTS:
    //    - Use $('#nameHeading') or $('#nameHeading .myName') to select
    //    - Use .text() to change text content
    //    - Use .css() to apply styles: .css('property', 'value')
    //    - You can chain methods: $(selector).text('new text').css('color', 'red')
    //
    // 🏁 STARTER TEMPLATE:
    $('#nameHeading').click(function() {
        // TODO: Your code here
        // Use .text() to change the text content
        // Use .css() to apply styling

        $('#nameHeading .myName').text("Nanami Chrysler"); //change "Your Name" => Nanami Chrysler

        $('#nameHeading .myName').css({"font-variant":"small-caps","color":"green","font-size":"200%"}); //custom styling

        logToConsole('Name heading clicked - implement your solution!', 'info');
    });


    
    // ============================================
    // PROBLEM 2: TEXT ANIMATION
    // ============================================
    // 🎯 GOAL: Create smooth show/hide animations for the lorem ipsum text
    //
    // 📝 REQUIREMENTS:
    //    - "Hide Text" button: Make paragraphs vanish over 2000ms (2 seconds)
    //    - "Show Text" button: Make paragraphs appear over 3300ms (3.3 seconds)  
    //    - "Toggle Text" button: Switch between show/hide
    //
    // 💡 HINTS:
    //    - Target the #textContent div (contains the paragraphs)
    //    - Use .hide(duration), .show(duration), .toggle(duration)
    //    - Duration is in milliseconds: 2000ms = 2 seconds
    //    - preventDefault() stops the default link behavior
    //
    // 🏁 STARTER TEMPLATES:
    
    $('#hideText').click(function(e) {
        e.preventDefault(); // Prevents the link from jumping to top
        // TODO: Hide the #textContent over 2000ms
        $('#textContent').hide(2000);
        
        logToConsole('Hide text clicked - implement fade out animation!', 'info');
    });
    
    $('#showText').click(function(e) {
        e.preventDefault();
        // TODO: Show the #textContent over 3300ms
        $('#textContent').show(3300);

        logToConsole('Show text clicked - implement fade in animation!', 'info');
    });
    
    let isShowing = true;

    $('#toggleText').click(function(e) {
        e.preventDefault();
        // TODO: Toggle the #textContent visibility

        $('#textContent').toggle();

        logToConsole('Toggle text clicked - implement toggle functionality!', 'info');
    });


    
    // ============================================
    // PROBLEM 3: INTERACTIVE LIST ITEMS
    // ============================================
    // 🎯 GOAL: Make list items change color when clicked
    //
    // 📝 REQUIREMENTS:
    //    - Click normal list item → turns red (add .red class)
    //    - Click red list item → back to normal (remove .red class)
    //    - Use the existing .red CSS class (already defined in CSS)
    //
    // 💡 HINTS:
    //    - Use .addClass('red') to add the red class
    //    - Use .removeClass('red') to remove the red class  
    //    - Use .toggleClass('red') to automatically add/remove
    //    - Target: '#labList li' (all list items in the labList)
    //
    // 🏁 STARTER TEMPLATE:
    
    /*
    $('#labList li').click(function() {
        // TODO: Toggle the 'red' class on the clicked list item
        
        const itemText = $(this).text();

        $(this).toggleClass('red');

        logToConsole(`List item clicked: "${itemText}" - implement color toggle!`, 'info');
    });
    */

    $(document).on('click', '#labList li', function() {
        // TODO: Toggle the 'red' class on the clicked list item
        
        const itemText = $(this).text();

        $(this).toggleClass('red');

        logToConsole(`List item clicked: "${itemText}" - implement color toggle!`, 'info');
    });

    // ============================================
    // PROBLEM 4: DYNAMIC CONTENT CREATION
    // ============================================
    // 🎯 GOAL: Add new list items dynamically when button is clicked
    //
    // 📝 REQUIREMENTS:
    //    - When "Add List Item" is clicked, add a new item to #labList
    //    - Each new item should have a unique number
    //    - Include encouraging text like "New item X - Click me!"
    //
    // 💡 HINTS:
    //    - Use .append() to add content to the end: $('#labList').append('<li>content</li>')
    //    - Use the listItemCounter variable to track item numbers
    //    - Increment listItemCounter after each addition: listItemCounter++
    //
    // 🏁 STARTER TEMPLATE:
    $('#AddListItem').click(function() {
        // TODO: Create and append a new list item
        // Remember to increment the counter and use .append()

        let listItemCounter = $('#labList li').length; //this is length of current list

        listItemCounter++; //increment 

        $('#labList').append("<li>New item " + listItemCounter + " - Click me!</li>");

        
        logToConsole('Add list item clicked - implement dynamic list item creation!', 'info');
    });


    
    // ============================================
    // PROBLEM 5: EVENT DELEGATION CHALLENGE  
    // ============================================
    // 🎯 GOAL: Make the red-toggle feature work on dynamically added list items
    //
    // 📝 THE CHALLENGE: After adding new list items in Problem 4, try clicking them.
    //                   Do they turn red like the original items? Why or why not?
    //
    // 📝 REQUIREMENTS:
    //    - Ensure ALL list items (original AND new) can toggle red color
    //    - Research and implement event delegation using $(document).on()
    //    - Replace the Problem 3 event handler with a delegated version
    //
    // 💡 HINTS:
    //    - Events attached to specific elements only work on elements that existed when attached
    //    - New elements added later don't automatically inherit event handlers
    //    - Event delegation attaches the handler to a parent that always exists
    //    - Syntax: $(document).on('click', '#labList li', function() { ... })
    //
    // 🏁 SOLUTION APPROACH:
    //    1. Comment out or remove the Problem 3 event handler
    //    2. Replace it with a delegated event handler using $(document).on()
    //    3. Test by adding new items and clicking them
    
    // TODO: Replace the Problem 3 handler with a delegated version
    // Research $(document).on() syntax for event delegation

    // ============================================
    // BONUS CHALLENGES
    // ============================================

    //Challenge A
    $('#addCustomItem').off('click').on('click', function() { //use .off('click') to remove click handler from lab6-framework.js
        let text = $('#userInput').val().trim(); //trim spaces

        if(text.length > 0) {

            let listItemCounter = $('#customList li').length;
            
            listItemCounter++;

            $('#customList').append('<li>Custom Item ' + listItemCounter + ': ' + text + ' - Click me!</li>');

            //clear input
            $('#userInput').val('');

            logToConsole('Added custom list item: "${text}"', 'success');
        } else {
            alert("Please enter some text before adding.");
        }
    });

    $('#clearInput').off('click').on('click', function() {
        $('#userInput').val('');
        logToConsole('Input cleared', 'info');
    });

    $(document).on('click', '#customList li', function() {
        $(this).toggleClass('red');
        logToConsole('Custom list item clicked: "${$(this).text()}"', 'info');
    });


    //Challenge B
    const images = [ //array of image URLs
        "https://cdn.britannica.com/34/235834-050-C5843610/two-different-breeds-of-cats-side-by-side-outdoors-in-the-garden.jpg",
        "https://media.hswstatic.com/eyJidWNrZXQiOiJjb250ZW50Lmhzd3N0YXRpYy5jb20iLCJrZXkiOiJnaWZcL3NodXR0ZXJzdG9jay0yMjc4Nzc2MTg3LWhlcm8uanBnIiwiZWRpdHMiOnsicmVzaXplIjp7IndpZHRoIjo4Mjh9fX0=",
        "https://images.ctfassets.net/100cwma5ubtt/1rl5HYTqXKQad7yEQL7mxM/f85c5065b1760e610cf345765f86bb12/FS_1440x810_how-to-introduce-cats-to-each-other.jpg?fm=webp&w=1200&q=50",
        "https://bestfriends.org/sites/default/files/2025-07/CantaloupeNora1277MW_.jpg"
    ];

    let currentIndex = 0;

    //function to update the image
    function updateImage() {
        $('#galleryImage').attr('src', images[currentIndex]); //sets attribute to the array of images
    }

    //next button
    $('#nextImage').off('click').on('click', function() {
        currentIndex = (currentIndex + 1) % images.length; //loops to first pic
        updateImage();
        logToConsole('Switched to image ${currentIndex + 1}', 'info');
    });

    //previous button
    $('#prevImage').off('click').on('click', function() {
        currentIndex = (currentIndex - 1 + images.length) % images.length; //loops to last pic
        updateImage();
        logToConsole('Switched to image ${currentIndex + 1}', 'info');
    });

    //Challenge C
    $(document).off.on('click', '.accordion-header', function() {
        const content = $(this).next('.accordion-content');
        const active = content.hasClass('active');
        
        //close accordion items
        $('.accordion-content').removeClass('active').slideUp();
        
        if (active) {
            logToConsole('Accordion closed: ' + $(this).text(), 'info');
        } else { //open clicked item if it wasn't already open
            content.addClass('active').slideDown();
            logToConsole('Accordion opened: ' + $(this).text(), 'info');
        }
    });
}); // End of $(document).ready()
