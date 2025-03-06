<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='disclaimer'");
    $cat_arr4=array();
    while($row4=mysqli_fetch_assoc($cat_res4)){
    $cat_arr4[]=$row4;    
    }
    foreach($cat_arr4 as $list){
      echo htmlspecialchars_decode($list['data']);
     }?>
<?php include("bottom_header_url.php");?>
<body class="min-w-72 sm:h-full font-inter  main-container google-anno-skip">
    <div class="w-full mx-auto">
       <?php include("header.php");?>
        <script>
            $(document).ready(function () {

                $("#btn-back-to-top").click(function () {
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                });

                $(window).on('scroll', function (event) {
                    if ($(this).scrollTop() > 20) {
                        $("#btn-back-to-top").removeClass('hidden')
                    } else {
                        $("#btn-back-to-top").addClass('hidden')
                    }
                });
            });
        </script>
    </div>
    <div class="md:w-[80%] lg:w-[64%] w-full mx-auto relative overflow-x-hidden">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert"
            id="flash-message" style="display: none !important;">
            <strong class="font-bold message"></strong>
        </div>
        <script>
            $(function () {
                var message = "";
                if (message && message === 'string') {
                    $("#flash-message").find('message').text(message);
                    $("#flash-message").show();
                    setTimeout(function () {
                        $("#flash-message").hide();
                    }, 3000);
                }
            });
        </script>
        <div class="w-full flex justify-center my-5">
            <!--<div class="w-full" id="static-ad-1">-->
            <!--    <script>-->
            <!--        googletag.cmd.push(function () {-->
            <!--            googletag.display('static-ad-1');-->
            <!--        });-->
            <!--    </script>-->
            <!--</div>-->
             
        </div>
        <div
            class="my-5 bg-[#232325] border-[#404044] border-[1px] border-opacity-30 text-white py-[3rem] px-[4rem] grid justify-center place-item-center rounded-[30px]">
            <h2 class="leading-7 text-[24px] font-bold mb-6 mt-4">Privacy Policy for zettaquiz</h2>
            <h3 class="font-normal leading-7">Effective Date: 1st December, 2024</h3>
            <p class="text-[16px] font-normal leading-7 mb-6 mt-4">At Zetta Quiz, we are committed to protecting your
                privacy and ensuring a safe online experience. This Privacy Policy outlines the types of information we
                collect, how we use it, and the steps we take to safeguard your personal information. By using our
                website, zettaquiz.com, you agree to the terms outlined in this policy.</p>
            <ol class="list-decimal list-inside ml-2">
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">Information We Collect
                </li>
                <p class="text-[14px]  font-normal leading-7  tracking-wide ml-[10px]"> We may collect the following
                    types of information when you use Zetta Quiz: <br /><br /></p>
                <ul class="list-disc">
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]"><strong>Personal
                            Information:</strong> This may include your name, email address, and any other information
                        you provide to us when creating an account, subscribing to newsletters, or engaging with our
                        quizzes and features.</li>
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]"><strong>Non-Personal
                            Information:</strong> We collect information about your usage of our website, including your
                        IP address, browser type, device information, and interactions with the website (e.g., quiz
                        responses, clicks, etc.).</li>
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]"><strong>Cookies and Tracking
                            Technologies:</strong> We use cookies and other tracking technologies to enhance user
                        experience, analyze website traffic, and personalize content. You can manage your cookie
                        preferences in your browser settings.</li>
                </ul>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    How We Use Information
                </li>
                <p class="text-[14px] font-normal leading-7  tracking-wide ml-[10px]"> We may use the information we
                    collect in the following ways: </p>
                <ul class="list-disc">
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">
                        To provide, personalize, and improve the functionality of the website and quizzes.
                    </li>
                    <li class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                        To communicate with you, respond to inquiries, and send updates regarding new quizzes, features,
                        and offers.
                    </li>
                    <li class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                        To analyze trends, track user activity, and gather insights to improve the website's
                        performance.
                    </li>
                    <li class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                        To ensure the security and integrity of our website, including protecting against fraud and
                        unauthorized access.
                    </li>
                </ul>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Sharing Your Information
                </li>
                <p class="text-[14px] font-normal leading-7  tracking-wide mb-3 ml-[20px]">
                    We do not sell, rent, or share your personal information with third parties, except in the following
                    circumstances:
                </p>
                <ul class="list-disc">
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">
                        <strong>Service Providers:</strong> We may share your information with trusted third-party
                        service providers who assist with website operations, analytics, and customer service. These
                        service providers are bound by confidentiality agreements and are only permitted to use your
                        information to the extent necessary to provide their services.
                    </li>
                    <li class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                        <strong>Legal Compliance:</strong> We may disclose your information if required by law or in
                        response to legal requests, such as subpoenas or court orders.
                    </li>
                </ul>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Data Security
                </li>
                <p class="text-[14px]  font-normal leading-7  tracking-wide ml-[20px]">
                    We take reasonable measures to protect the security of your personal information, including using
                    encryption and other security technologies. However, no method of transmission over the internet or
                    electronic storage is completely secure, and we cannot guarantee absolute security.
                </p>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Your Rights and Choices
                </li>
                <p class="text-[14px] font-normal leading-7  tracking-wide mb-3 ml-[20px]">
                    You have the right to:
                </p>
                <ul class="list-disc">
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">
                        Access, update, or delete your personal information by contacting us.
                    </li>
                    <li class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                        Opt-out of receiving promotional emails by following the unsubscribe instructions in the email
                        or contacting us directly.
                    </li>
                    <li class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                        Disable cookies through your browser settings, although this may affect your ability to use
                        certain features of the website.
                    </li>
                </ul>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Third-Party Links
                </li>
                <p class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                    Zetta Quiz may contain links to third-party websites, services, or resources. We are not
                    responsible for the privacy practices of these external sites and encourage you to review their
                    privacy policies.
                </p>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Children's Privacy
                </li>
                <p class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                    Our website is not intended for children under the age of 13, and we do not knowingly collect
                    personal information from children. If we become aware that we have inadvertently collected personal
                    information from a child under 13, we will take steps to delete that information.
                </p>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Changes to This Privacy Policy
                </li>
                <p class="text-[14px]   font-normal leading-7  tracking-wide ml-[20px]">
                    We may update this Privacy Policy from time to time to reflect changes in our practices or for other
                    operational, legal, or regulatory reasons. Any updates will be posted on this page with an updated
                    effective date.
                </p>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-6 p-2">
                    Contact Us
                </li>
                <p class="text-[16px]   font-normal leading-7  tracking-wide ml-[20px]">
                    If you have any questions or concerns about this Privacy Policy or how we handle your personal
                    information, please contact us at: <a class="underline"
                        href="contact-us.html">zettaquiz.com</a>.
                </p>

                <p class="text-[16px] my-4 font-normal leading-7  tracking-wide ml-[20px]">
                    By using our website, you acknowledge that you have read and understood this Privacy Policy.
                </p>
            </ol>
        </div>
        <div class="w-full flex justify-center my-5">
            <!--<div class="w-full" id="static-ad-2">-->
            <!--    <script>-->
            <!--        googletag.cmd.push(function () {-->
            <!--            googletag.display('static-ad-2');-->
            <!--        });-->
            <!--    </script>-->
            <!--</div>-->
             
        </div>
    </div>
    <div class="w-full overflow-x-hidden mx-auto">
        <script type="text/javascript" src="js/reward-modal.js"></script>
        <?php include("footer.php");?>
    </div>
</body>
</html>