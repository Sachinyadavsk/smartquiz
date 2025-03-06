<header>
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/style.css">
    <nav class="bg-[#232325]">
        <div
            class="flex flex-col lg:flex-row lg:space-y-2 justify-between items-center lg:h-[85px] md:w-[90%] lg:w-[64%] mx-auto px-2 py-2">
            <div class="flex justify-between w-full items-center lg:w-auto lg:space-x-4 space-x-2">
                <div class="flex items-center">
                    <a href="https://game.reapbucks.com/">
                        <!--<img src="images/logo.png" class="h-10 md:h-14" alt="zettaquiz Logo" />-->
                        <h3 style="color: #ffffff;font-weight: 700;font-size: 34px;">Zetta Quiz</h3>
                    </a>
                </div>
                <div class="flex lg:hidden items-center space-x-3 z-50">
                    <div class="flex items-center w-30 bg-[#232325] px-2 py-1 rounded-full border border-[#333333] shadow-md"
                        id="points-display">
                        <img src="https://game.reapbucks.com/images/points_icon.png" alt="Coin Icon" class="h-5 w-5 mr-2">
                        <span class="text-[#FFDF84] font-medium text-sm" id="points-display"><?php
								// Example to get cookie values in PHP
								if(isset($_COOKIE['correct_answers'])) {
									$cookie_value = $_COOKIE['correct_answers'];
									echo "" . $cookie_value;
								} else {
									echo "";
								}
								?></span>
                    </div>
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="lg:hidden focus:outline-none">
                        <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden lg:flex flex-col lg:flex-row justify-center font-semibold text-sm md:text-md color-[#000] lg:mt-0 mt-4 capitalize whitespace-nowrap">
                <a href="https://game.reapbucks.com/" class="text-[#DCB54D] hover:border-b-2 border-b-2 !border-[#0FE73B] hover:text-[#0FE73B] mx-2 menu_setting">Home</a>
                <div class="group relative cursor-pointer menu_setting">
                    <button class="items-center text-center font-semibold mx-2 text-[#FFDF84] border-b-2 border-transparent hover:border-[#DCB54D] hover:text-[#DCB54D] hover:border-b-2">Categories</button>
                    <div class="absolute z-50 invisible group-hover:visible top-full left-0 bg-[#232325] shadow min-w-max max-w-full">
                        <ul class="py-1 px-1 text-sm md:text-md text-white" aria-labelledby="dropdownDefault">
                            <li class="py-2 px-3 text-center"><a href="https://game.reapbucks.com/trending-now" class="font-normal text-[#FFDF84] hover:text-[#DCB54D] hover:border-[#DCB54D] hover:border-b-4 capitalize text-center cat_class">Trending Now</a></li>
                            <li class="py-2 px-3 text-center"><a href="https://game.reapbucks.com/sports" class="font-normal text-[#FFDF84] hover:text-[#DCB54D] hover:border-[#DCB54D] hover:border-b-4 capitalize text-center cat_class">Sports</a></li>
                            <li class="py-2 px-3 text-center"><a href="https://game.reapbucks.com/general-knowledge" class="font-normal text-[#FFDF84] hover:text-[#DCB54D] hover:border-[#DCB54D] hover:border-b-4 capitalize text-center cat_class">General Knowledge</a></li>
                            <li class="py-2 px-3 text-center"><a href="https://game.reapbucks.com/entertainment" class="font-normal text-[#FFDF84] hover:text-[#DCB54D] hover:border-[#DCB54D] hover:border-b-4 capitalize text-center cat_class">Entertainment</a></li>
                            <li class="py-2 px-3 text-center"><a href="https://game.reapbucks.com/funny" class="font-normal text-[#FFDF84] hover:text-[#DCB54D] hover:border-[#DCB54D] hover:border-b-4 capitalize text-center cat_class">Funny</a></li>
                        </ul>
                    </div>
                </div>
                <a href="https://game.reapbucks.com/blogs" class="border-b-2 border-transparent mx-2 hover:border-[#DCB54D] hover:text-[#DCB54D] text-[#FFDF84] hover:border-b-2">Blogs</a>
                <a href="https://game.reapbucks.com/about-us" class="border-b-2 border-transparent mx-2 hover:border-[#DCB54D] hover:text-[#DCB54D] text-[#FFDF84] hover:border-b-2">About Us</a>
                <a href="https://game.reapbucks.com/contact-us" class="border-b-2 border-transparent mx-2 hover:border-[#DCB54D] hover:text-[#DCB54D] text-[#FFDF84] hover:border-b-2 mobile_layout">Contact Us</a>
            </div>
            <div class="lg:flex hidden items-center justify-between space-x-3 mx-2 z-10">
                <div class="flex items-center bg-[#232325] px-3 py-1 w-30 rounded-full border border-[#333333] shadow-md" id="goldDiv">
                    <img src="https://game.reapbucks.com/images/points_icon.png" alt="Coin Icon" class="h-5 w-5 mr-2">
                    <span class="text-[#FFDF84] font-medium text-sm">
                        <?php
								// Example to get cookie values in PHP
								if(isset($_COOKIE['correct_answers'])) {
									$cookie_value = $_COOKIE['correct_answers'];
									echo "" . $cookie_value;
								} else {
									echo "";
								}
								?>
                    </span>
                </div>
            </div>
        </div>
    </nav>
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
     <script>
       // Function to check and request notification permission
            function requestNotificationPermission() {
                if (!("Notification" in window)) {
                    alert("This browser does not support desktop notifications.");
                    return;
                }
            
                Notification.requestPermission().then(permission => {
                    localStorage.setItem("notification_permission", permission); // Save response
                    
                    if (permission === "granted") {
                        console.log("User allowed notifications.");
                        sendNotification();
                    } else if (permission === "denied") {
                        console.log("User blocked notifications.");
                        alert("You have blocked notifications. To enable them, change settings in your browser.");
                    }
                });
            }
            
            // Function to fetch meta description
            function getMetaDescription() {
                const metaTag = document.querySelector('meta[name="description"]');
                return metaTag ? metaTag.getAttribute("content") : "No description available";
            }
            
            // Function to show notification
            function sendNotification() {
                let title = document.title; // Get the page title
                let description = getMetaDescription(); // Get the meta description
                let url = window.location.href; // Get the page URL
            
                if (Notification.permission === "granted") {
                    new Notification(title, {
                        body: description,
                        icon: "https://game.reapbucks.com/" // Update with your logo URL
                    });
            
                    // Send data to the server
                    saveNotificationToDB(title, description, url);
                }
            }
            
            // Function to store the notification in the database via AJAX
            function saveNotificationToDB(title, description, url) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "https://game.reapbucks.com/save_notification.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            
                let data = `title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}&url=${encodeURIComponent(url)}`;
                xhr.send(data);
            }
            
            // Check notification permission on page load
            document.addEventListener("DOMContentLoaded", function () {
                const permission = localStorage.getItem("notification_permission");
            
                if (!permission || permission === "default") {
                    requestNotificationPermission(); // Ask only if no decision has been made
                }
            });

    </script>
</header>
