document.addEventListener('DOMContentLoaded', function () {

    // Select all menu items that have a submenu
    var menuItems = document.querySelectorAll('.main-navigation ul li:has(ul) > a');
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('#site-navigation');

    menuItems.forEach(function (item) {
        item.addEventListener('click', function (e) {
            // Prevent the default link behavior
            e.preventDefault();
            // Get the submenu
            var menuItemHasChildren = this.parentElement;

            menuItemHasChildren.classList.toggle('active');
        });

    });

    // Close navigation when clicking outside
    document.addEventListener('click', function (e) {
        if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
            // Close the submenu
            const allActive = document.querySelectorAll('.active');

            allActive.forEach(element => {
                element.classList.remove('active');
            })

        }
    });

    menuToggle.addEventListener('click', function () {
        // Toggle the menu open/close class
        var isOpen = menu.classList.toggle('menu-open');
        // Update aria-expanded attribute
        const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !expanded);

        if (isOpen) {
            document.body.classList.add('no-scroll');
        } else {
            document.body.classList.remove('no-scroll');
        }
    });

});


