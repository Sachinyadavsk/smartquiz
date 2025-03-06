<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='about'");
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
            class="my-5 bg-[#232325] border-[#404044] border-[1px] border-opacity-30 text-white py-[3rem] px-10 grid justify-center place-item-center rounded-[30px]">
            <div class="gap-4">
                <h1 class="text-[24px] tracking-wide font-bold capitalize leading-5 mb-6 mt-4">About Us - zettaquiz
                </h1>
                <div class="space-y-8">
                    <div>
                        <p class="text-[14px]  font-normal leading-5 tracking-wide">Welcome to Zetta Quiz, where
                            quizzes meet the thrill of gaming! </br> At Zetta Quiz, we believe that learning and
                            testing your knowledge should be fun, engaging, and rewarding. Our mission is to create an
                            exciting experience where you can challenge yourself across a wide range of topics while
                            enjoying the dynamic, interactive feel of a game. Whether you're testing your general
                            knowledge, diving into trending topics, exploring gaming, or delving into relationships and
                            personality, we’ve got you covered!</p>
                    </div>
                    <div>
                        <p class="text-[14px]  font-semibold leading-5 tracking-wide">What Makes Us Different?</p>
                        <ul class="list-disc">
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]">
                                <strong>Game-Like Experience:</strong> No more boring quizzes! Our quizzes are designed
                                like games, keeping you hooked with exciting challenges, interactive formats, and
                                rewarding progress.</li>
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]">
                                <strong>Wide Range of Categories:</strong> From Sports and Entertainment to Gaming,
                                Lifestyle, and General Knowledge, there’s a quiz for everyone! We also offer fun
                                seasonal quizzes for holidays and unique personality tests.</li>
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]">
                                <strong>Engaging Gameplay:</strong> Track your progress, earn points, and rise to the
                                top of the leaderboard. Compete with friends or see how you rank among players
                                worldwide!</li>
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]"><strong>A
                                    New Challenge Every Time:</strong> Our quizzes are updated regularly to keep things
                                fresh and fun. Whether you’re a first-time player or a returning Zetta Quiz, there's
                                always something new to explore.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-[14px]  font-semibold leading-5 tracking-wide">Why Zetta Quiz?</p>
                        <ul class="list-disc">
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]">
                                <strong>Entertainment:</strong> We’ve combined learning with fun, making your quiz
                                experience feel like a game.</li>
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]">
                                <strong>Variety:</strong> With quizzes on everything from gaming to trending topics,
                                you’re bound to find something that sparks your interest.</li>
                            <li class="text-[14px] font-normal leading-5 capitalize tracking-wide ml-[20px]">
                                <strong>Personalized:</strong> Tailor your quiz-taking journey to your interests and see
                                how your knowledge evolves.</li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-[14px]  font-normal leading-5 tracking-wide">Join the fun and test your wits with
                            Zetta Quiz—where every quiz feels like a game! Ready to challenge yourself? Play now and
                            become the ultimate Zetta Quiz!</p>
                    </div>
                </div>
            </div>
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