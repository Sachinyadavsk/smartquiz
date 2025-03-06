 <?php include("db_connection.php");?>
 <html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" href="fav-icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="fav-icon/favicon.svg" />
    <link rel="shortcut icon" href="fav-icon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="fav-icon/apple-touch-icon.png" />
    <link rel="manifest" href="fav-icon/site.webmanifest" />
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='result'");
    $cat_arr4=array();
    while($row4=mysqli_fetch_assoc($cat_res4)){
    $cat_arr4[]=$row4;    
    }
    foreach($cat_arr4 as $list){
      echo htmlspecialchars_decode($list['data']);
     }?>
    <link rel="canonical" href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    
    <!--css link-->
    <link href="cdnpage/css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preload" as="style" href="build/assets/app-e0ebea9b.css" />
    <link rel="stylesheet" href="build/assets/app-e0ebea9b.css" />
    <link rel="modulepreload" href="build/assets/app-1da0cd6f.js" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="cdnpage/css/tailwind.min.css" rel="stylesheet">
    
    <!--script js-->
    <script type="text/javascript" src="js/ads-init.js"></script>
    <script type="text/javascript" src="js/lifeline-ads.js"></script>
    <script type="module" src="build/assets/app-1da0cd6f.js"></script>
    <script type="text/javascript" src="js/blockadblock.js"></script>
    <script type="text/javascript" src="js/ads.js"></script>
    <script src="cdnpage/js/jquery.min.js"></script>
    <script src="cdnpage/js/flowbite.min.js"></script>
    <script src="cdnpage/js/jquery-3.6.0.min.js"></script>
    <script src="cdnpage/js/lottie.min.js"></script>
                  
</head>
<style>
    body {
        min-width: 280px;
    }
    .quiz_content {
        height: calc(100% - 100px) !important;
    }
</style>

 <?php 
   $game_id = $_GET['game_id'];
   $games = $con->query("SELECT * FROM games WHERE id='$game_id'");

   if ($games->num_rows > 0) {
        $game = $games->fetch_assoc();
        $images =$game['image'];
        $name = $game['name'];
    } else {
        echo '';
    }
    ?>
                  
<body class="overflow-y-hidden font-inter google-anno-skip bg-gray-100">
    <div class="w-full h-[100dvh] relative main-container">
        <div class="absolute top-0 left-0 h-full w-full">
            <div class="flex justify-center items-center h-full">
                <div class="md:max-w-[700px] w-full h-full mobile_view_container">
                    <header>
                        <nav class="bg-[#131313] border-[#424243] shadow-md z-10 w-full sm:max-w-[700px] fixed">
                            <div class="h-[40px] w-full content-center">
                                <ul class="font-medium flex justify-between self-center w-full">
                                    <li class="mx-3 px-2">
                                        <a href="index.php" class=""><i class="fa-solid fa-house"
                                                style="font-size:20px; color:white;"></i></a>
                                    </li>
                                    <li class="mx-1 px-2 truncate text-white">
                                        <a href="javascript:void(0);"><?php echo $name;?> </a>
                                    </li>
                                    <li class="mx-3 px-2">
                                        <div class="mx-2">
                                            <button id="shareButton"><i class="fa-solid fa-share"
                                                    style="font-size:20px;color:white;"></i></button>
                                            <input type="hidden" value="<?php echo $name;?>">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <div id="shareModal"
                        class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-20 md:mr-4">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
                            <img src="images/games/<?php echo $images?>"
                                alt="Game Logo" class="h-[150px] w-[150px] mb-4 mx-auto" />
                            <h2 class="text-md font-semibold mb-4 text-center">Invite your friends to play this game!
                            </h2>
                            <input type="text" id="shareLink" value="<?php echo $name;?>" readonly
                                class="w-full p-2 rounded mb-4 text-blue-700 underline font-md border-dashed border-2 border-sky-700">
                            <button id="copyButton"
                                class="bg-blue-500 text-white py-2 px-4 mb-4 w-full rounded-full">Copy</button>
                            <button id="doneShareModal" class=" text-black py-2 px-4 rounded w-full">Done</button>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#shareButton').on('click', function () {
                                $('#shareModal').removeClass('hidden');
                            });

                            $('#closeShareModal, #doneShareModal').on('click', function () {
                                $('#shareModal').addClass('hidden');
                            });

                            $('#copyButton').on('click', function () {
                                const copyText = document.getElementById("shareLink");
                                copyText.select();
                                document.execCommand("copy");
                                $(this).text("Copied");
                                setTimeout(() => {
                                    $(this).text("Copy");
                                }, 5000);
                            });

                        });
                    </script>
                   
                    <div class="w-full flex justify-center my-5">
                        <!-- <div class="w-full" id="static-ad-1">
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('static-ad-1');
                                });
                            </script>
                        </div> -->
                        
                    </div>
                    

                    <div class="w-[40%] fixed bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded m-[2rem] z-50"
                        role="alert" id="flash-success" style="display:none;">
                        <strong class="font-bold message items-center"></strong>
                    </div>
                    <div class="bg-red-100 border border-red-400 fixed text-red-700 px-4 py-3 rounded w-[40%] m-[2rem] z-50"
                        role="alert" id="flash-error" style="display:none;">
                        <strong class="font-bold message items-center"></strong>
                    </div>

                    <div class="overflow-hidden h-[calc(100%-40px)] pt-10">
                        
                        <div class="h-24"></div>
                        <div id="quiz-container"
                            class="mt-2 quiz_content overflow-y-auto overflow-x-hidden custom-scrollbar"
                            style="height: calc(100% - 103px)">
                                <?php 
                                  $game_id = $_GET['game_id'];
                                  $score = $_GET['correct_answers'];
                                  $totalQuestions = $_GET['totalQuestions'];
                                  
                                     if($score==0){
                                      ?>
                                    <div class="mx-6">
                                                    <div class="bg-[#232325] text-white flex flex-col justify-center items-center mx-auto">
                                                         <h1 class="text-[30px] font-semibold text-center text-white">Better Luck Next Time!</h1>
                                                        <div class="flex items-center justify-center">
                                                            <img src="images/sad.gif" alt="Sad face" class="h-28 object-contain mr-2 my-2">
                                                        </div>
                                                        <div class="flex flex-row space-x-4 w-full p-2">
                                                            <div class="bg-[#19191B] border-[#424243] rounded-lg flex-1 p-4"> 
                                                                 <p class="text-2xl font-semibold text-center text-[#F5C154]" id="quiz_score"><?php echo $score ?></p>
                                                                 <p class="text-md text-white text-center">Your Score</p>
                                                            </div>
                                                            <div class="bg-[#19191B] border-[#424243] rounded-lg flex-1 p-4">
                                                                 <p class="text-2xl font-semibold text-center text-[#F5C154]" id="quiz_coins"><?php echo $totalQuestions ?></p>
                                                                 <p class="text-md text-white text-center">Total Question</p>
                                                            </div>
                                                         </div>
                                                         <a href="https://game.reapbucks.com/" id="playGameBtn" class="animatedPlayBtn bg-[#19191B] text-xl flex justify-center items-center rounded-full w-48 p-3 my-3 border border-[#424243] text-center mx-auto" type="button">
                                                             <div class="flex justify-center items-center text-white shrink-0">
                                                                 <div class="h-[20px] mr-1"><i class="fa-solid fa-home"></i></div>
                                                                 <span class="font-bold text-white uppercase text-md ml-1">Home</span>
                                                             </div>
                                                         </a>
                                                     </div>
                                                 </div>
                                                 <?php
                                         }else{
                                             ?>
                                              <div class="mx-6">
                                             <div class="bg-[#232325] text-white flex flex-col justify-center items-center mx-auto">
                                                 <h1 class="text-[30px] font-semibold text-center text-white">Well Played!</h1>
                                                 <div class="flex items-center justify-center">
                                                     <img src="images/well_played.gif" alt="Happy face" class="h-28 object-contain mr-2 my-2">
                                                 </div>
                                                 <div class="flex flex-row space-x-4 w-full p-2">
                                                     <div class="bg-[#19191B] border-[#424243] rounded-lg flex-1 p-4">
                                                         <p class="text-2xl font-semibold text-center text-[#F5C154]" id="quiz_score"><?php echo $score ?></p>
                                                         <p class="text-md text-white text-center">Your Score</p>
                                                     </div>
                                                     <div class="bg-[#19191B] border-[#424243] rounded-lg flex-1 p-4">
                                                         <p class="text-2xl font-semibold text-center text-[#F5C154]" id="quiz_coins"><?php echo $totalQuestions ?></p>
                                                         <p class="text-md text-white text-center">Total Question</p>
                                                     </div>
                                                 </div>
                                                 <a href="https://game.reapbucks.com/" id="playGameBtn" class="animatedPlayBtn bg-[#19191B] text-xl flex justify-center items-center rounded-full w-48 p-3 my-3 border border-[#424243] text-center mx-auto" type="button">
                                                     <div class="flex justify-center items-center text-white shrink-0">
                                                        <div class="h-[20px] mr-1"><i class="fa-solid fa-home"></i></div>
                                                         <span class="font-bold text-white uppercase text-md ml-1">Home</span>
                                                     </div>
                                                 </a>
                                             </div>
                                         </div>
                                         <?php
                                     }
                                     ?>

                            <!--<div class="w-full" id="static-ad-1">-->
                            <!--    <script>-->
                            <!--        googletag.cmd.push(function () {-->
                            <!--            googletag.display('static-ad-1');-->
                            <!--        });-->
                            <!--    </script>-->
                            <!--</div>-->
                            
                            
                                        <script>
                                        $(document).ready(function() {
                                                var currentScore = getCookie('correct_answers') ? parseInt(getCookie('correct_answers')) : 0;
                                                var newScore = <?php echo $score; ?>;
                                                var updatedScore = currentScore + newScore;
                                                if (updatedScore > 0) {
                                                    $('#points-display').text(updatedScore + ' Pt.').removeClass('negative').addClass('positive');
                                                } else {
                                                    $('#points-display').text('0 Pt.').removeClass('positive').addClass('negative');
                                                }
                                                document.cookie = "correct_answers=" + updatedScore + "; path=/; max-age=" + (60 * 60 * 24 * 30);
                                            });
                                    
                                            function getCookie(name) {
                                                var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                                                if (match) return match[2];
                                                return null;
                                            }
                                    </script>
                        </div>
                       
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>