<?php
if (!isset($_COOKIE['cookie_policy'])) {
    echo '
    <div id="cookie-policy" style="position: fixed; bottom: 0; width: 100%; background: #000; color: #fff; padding: 10px; text-align: center; z-index: 1000;">
        <p>We use cookies to improve your experience. By using our website you are accepting our <a href="privacy-policy.php" style="color: #1e90ff; text-decoration: underline;">Privacy Policy</a>.</p>
        <button id="accept-cookies" style="background: #1e90ff; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">Ok</button>
    </div>

    <script>
        // Add event listener to the "Ok" button
        document.getElementById("accept-cookies").addEventListener("click", function() {
            // Set the cookie via JavaScript
            document.cookie = "cookie_policy=accepted; path=/; max-age=" + 60 * 60 * 24 * 30; // Expires in 30 days
            // Hide the cookie policy footer
            document.getElementById("cookie-policy").style.display = "none";
        });
    </script>
    ';
}
?>
