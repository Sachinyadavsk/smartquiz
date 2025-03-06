<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='team_of_conditions'");
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
            <h2 class="text-[24px] leading-7 font-bold mb-6 mt-4">Terms and Conditions for zettaquiz</h2>
            <h3 class="font-normal leading-7">Effective Date: 1st December,2024</h3>
            <p class="text-[16px] font-normal leading-7 mb-6 mt-4">Welcome to Zetta Quiz, operated by Zetta Quiz
                ("we," "us," or "our"). By accessing or using the website zettaquiz.com (the "Site") and any
                related services (collectively, the "Services"), you agree to be bound by these Terms and Conditions
                ("Terms"). Please read these Terms carefully before using the Site. If you do not agree with these
                Terms, do not use the Site.</p>
            <ol class="list-decimal list-inside ml-2">
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2"> Acceptance of Terms
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">By accessing or using the Site, you agree to
                        comply with and be bound by these Terms. If you are using the Site on behalf of an organization
                        or entity, you represent and warrant that you have the authority to bind that organization or
                        entity to these Terms.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Use of the Site
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">You agree to use the Site only for lawful
                        purposes and in accordance with these Terms. You may not use the Site in any way that could
                        damage, disable, overburden, or impair the Site or interfere with any other user's use of the
                        Site.</p>
                </li>

                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Account Registration
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">Some features of the Site may require you to
                        register for an account. When creating an account, you agree to provide accurate, complete, and
                        up-to-date information. You are responsible for maintaining the confidentiality of your account
                        login credentials and for all activities that occur under your account. You agree to immediately
                        notify us of any unauthorized use of your account.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    User Content
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">You may submit, upload, or share content
                        (such as quiz responses, comments, or feedback) through the Site. You retain ownership of any
                        content you submit, but by submitting it, you grant us a non-exclusive, worldwide, royalty-free
                        license to use, display, and distribute your content in connection with the operation of the
                        Site.</p>
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">You agree not to submit content that is
                        unlawful, defamatory, obscene, or otherwise inappropriate. We reserve the right to remove or
                        modify any content that violates these Terms or our community guidelines.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Privacy and Data Collection
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">By using the Site, you consent to our
                        collection and use of your personal information in accordance with our Privacy Policy, which is
                        incorporated into these Terms by reference.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-1 p-2">
                    Restrictions on Use
                    <p class="text-[16px] font-normal leading-7 mt-4">You may not:</p>
                </li>
                <ul class="list-disc">
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">Use the Site for any illegal,
                        harmful, or fraudulent activities.</li>
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">Copy, distribute, or modify
                        any part of the Site without our prior written consent.</li>
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">Engage in data mining,
                        scraping, or harvesting of content or personal information from the Site.</li>
                    <li class="text-[14px] font-normal leading-7  tracking-wide ml-[20px]">Impersonate any person or
                        entity or falsely represent your affiliation with any person or entity.</li>
                </ul>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Intellectual Property
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">All content, features, and functionality on
                        the Site, including but not limited to text, graphics, logos, images, and software, are the
                        property of Zetta Quiz or its licensors and are protected by copyright, trademark, and other
                        intellectual property laws. You may not use any content from the Site without our express
                        permission.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Third-Party Links
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">The Site may contain links to third-party
                        websites, products, or services. We do not endorse or control these third-party sites and are
                        not responsible for their content, privacy policies, or practices. Your interactions with these
                        third-party sites are at your own risk.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Termination
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">We reserve the right to suspend or terminate
                        your access to the Site, without notice, for any reason, including if we believe you have
                        violated these Terms. Upon termination, all rights granted to you under these Terms will cease,
                        and you must immediately stop using the Site.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Disclaimer of Warranties
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">The Site and Services are provided "as is"
                        and "as available," without any warranties of any kind, either express or implied, including but
                        not limited to the implied warranties of merchantability, fitness for a particular purpose, or
                        non-infringement. We do not guarantee that the Site will be error-free, secure, or free from
                        viruses or other harmful components.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Limitation of Liability
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">To the fullest extent permitted by law, Quiz
                        Master and its affiliates, employees, agents, or partners will not be liable for any indirect,
                        incidental, special, consequential, or punitive damages arising out of or in connection with
                        your use of the Site, even if we have been advised of the possibility of such damages.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Indemnification
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">You agree to indemnify and hold harmless Quiz
                        Master, its affiliates, employees, agents, and partners from any claims, damages, liabilities,
                        or expenses (including reasonable attorneys' fees) arising from your use of the Site, your
                        violation of these Terms, or your infringement of any rights of a third party.</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Governing Law and Dispute Resolution
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">These Terms are governed by and construed in
                        accordance with the laws of NSW, Australia. Any dispute arising out of or relating to these
                        Terms will be resolved through binding arbitration in New South Wales, and the decision of the
                        arbitrator will be final and binding</p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-6 mt-4 p-2">
                    Changes to These Terms
                    <p class="text-[16px] font-normal leading-7 mb-6 mt-4">We may update or modify these Terms at any
                        time. Any changes will be posted on this page with an updated effective date. Your continued use
                        of the Site after any changes to these Terms will constitute your acceptance of those changes.
                    </p>
                </li>
                <li class="text-[24px] tracking-wide  font-semibold  leading-7 mb-2 mt-4 p-2">
                    Contact Information
                </li>
                <p class="text-[16px] font-normal leading-7 tracking-wide p-2">
                    If you have any questions or concerns about these Terms, please contact us at:
                    <a class="underline" href="contact-us.html">zettaquiz.com/contact-us</a>
                </p>
                <p class="text-[16px]   font-normal leading-7  tracking-wide p-2">
                    By using the Site, you acknowledge that you have read, understood, and agree to be bound by these
                    Terms and Conditions.
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