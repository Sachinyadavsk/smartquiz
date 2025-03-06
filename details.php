 <?php include("db_connection.php");?>
 <html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" href="https://game.reapbucks.com/fav-icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="https://game.reapbucks.com/fav-icon/favicon.svg" />
    <link rel="shortcut icon" href="https://game.reapbucks.com/fav-icon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="https://game.reapbucks.com/fav-icon/apple-touch-icon.png" />
    <?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='details'");
    $cat_arr4=array();
    while($row4=mysqli_fetch_assoc($cat_res4)){
    $cat_arr4[]=$row4;    
    }
    foreach($cat_arr4 as $list){
      echo htmlspecialchars_decode($list['data']);
     }?>
    <link rel="canonical" href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    
    <link href="https://game.reapbucks.com/cdnpage/css/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/swiper-bundle.min.css">
    <script type="text/javascript" src="https://game.reapbucks.com/js/ads-init.js"></script>
    <link rel="preload" as="style" href="https://game.reapbucks.com/build/assets/app-e0ebea9b.css" />
    <link rel="stylesheet" href="https://game.reapbucks.com/build/assets/app-e0ebea9b.css" />
    <link rel="modulepreload" href="https://game.reapbucks.com/build/assets/app-1da0cd6f.js" />
    <script type="module" src="https://game.reapbucks.com/build/assets/app-1da0cd6f.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <script src="https://game.reapbucks.com/cdnpage/js/jquery.min.js"></script>
    <script src="https://game.reapbucks.com/cdnpage/js/flowbite.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/style.css">
    <script src="https://game.reapbucks.com/cdnpage/js/particles.min.js"></script>
    <script src="https://game.reapbucks.com/cdnpage/js/lottie.min.js"></script>
    <link rel="canonical" href=" #" />
    <script type="text/javascript" src="https://game.reapbucks.com/js/blockadblock.js"></script>
    <script type="text/javascript" src="https://game.reapbucks.com/js/ads.js"></script>
</head>

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

        <div class="my-5">
            <div class="bg-[#232325] border-[#404044] rounded-[30px] p-5">
                
                <?php if($_REQUEST['game']!=''){
                      $game_id=$_REQUEST['game'];
                       }else{
                       header("https://game.reapbucks.com");
                       } ?>
                
                <?php 
                     $contest_id = str_replace('-',' ', $game_id);
                   $games = $con->query("SELECT * FROM games WHERE name='$contest_id'");
                   $game = $games->fetch_assoc();
                  ?>
                <div class="flex flex-col items-center justify-center space-y-3">
                    <a href="https://game.reapbucks.com/start-game/<?php echo str_replace(' ','-', $game['name']); ?>">
                        <img src="https://game.reapbucks.com/images/games/<?php echo $game['image']?>"
                            alt="<?php echo $game['name']?>" class="w-96 aspect-video rounded-2xl" />
                    </a>
                    <h3 class="text-lg p-2 font-bold text-white text-center"><?php echo $game['name']?></h3>
                    <div class="flex items-center space-x-2 text-md text-[#969699] font-medium">
                        <p>WTP Price</p>
                        <div class="flex">
                            <img src="https://game.reapbucks.com/images/points_icon.png" alt="Coin Icon" class="h-5 w-5 mr-2">
                            <span><?php echo $game['game_price']?></span>
                        </div>
                    </div>
                    <a href="https://game.reapbucks.com/start-game/<?php echo str_replace(' ','-', $game['name']); ?>"
                        class="animatedPlayBtn flex items-center justify-center bg-[#DAAB55] text-lg font-bold rounded-full px-6 py-3 space-x-2 hover:underline transition text-white">
                        <span>PLAY NOW</span>
                        <span><i class="fa-solid fa-circle-play mr-1 "></i></span>
                    </a>
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
        <div class="my-5">
            <div class="bg-[#232325] border-[#404044] rounded-[30px] p-5">
                <article class="prose w-full px-7 max-w-none text-white" id="quiz-content">
                    <?php echo $game['short_desc']?>
                </article>
            </div>
        </div>
        <div class="w-full flex justify-center my-5">
            <!--<div class="w-full" id="static-ad-3">-->
            <!--    <script>-->
            <!--        googletag.cmd.push(function () {-->
            <!--            googletag.display('static-ad-3');-->
            <!--        });-->
            <!--    </script>-->
            <!--</div>-->
             
        </div>
         <div class="my-5">
            <div class="bg-[#232325] border-[#404044] rounded-[30px] p-5">
                <div class="w-full flex items-center mb-5">
                    <h3 class="text-[24px] tracking-tight font-semibold capitalize leading-none flex-none m-2"
                        style="background: linear-gradient(176.89deg, #ffffff 2.58%, #ffffff 78.88%); -webkit-background-clip: text; color: transparent; ">
                        All Quizzes</h3>
                </div>
                <div class="center ldr_height" id="default_loader" style="display: none;">
					<p>Loading Your Favorite Quizzes!</p>
				</div>
                <div class="grid md:grid-cols-4 grid-cols-2 gap-4" id="quiz_list">
                </div>
                <div class="pagination ctr">
					<button id="prev_page" class="btn_green" disabled><< Previous</button>
					<button id="next_page" class="btn_green">Next >></button>
				</div>
				
				<script src="https://game.reapbucks.com/cdnpage/js/jquery-3.6.0.min.js"></script>
				<script>
					$(document).ready(function () {
                            let currentPage = 1;
                            const limit = 8;
                        
                            function fetchGames(page) {
                                $('#default_loader').show();
                        
                                $.ajax({
                                    url: 'https://game.reapbucks.com/fetch_games.php',
                                    type: 'GET',
                                    data: { page: page, limit: limit },
                                    success: function (response) {
                                        $('#quiz_list').html(response.trim());
                                        $('#default_loader').hide();
                        
                                        // Count the number of items returned
                                        let gameCount = $('#quiz_list').children().length;
                        
                                        // Enable/disable previous button
                                        if (page === 1) {
                                            $('#prev_page').attr('disabled', true).addClass('inactive');
                                        } else {
                                            $('#prev_page').attr('disabled', false).removeClass('inactive');
                                        }
                        
                                        // Enable/disable next button based on item count
                                        if (gameCount < limit) {
                                            $('#next_page').attr('disabled', true).addClass('inactive');
                                        } else {
                                            $('#next_page').attr('disabled', false).removeClass('inactive');
                                        }
                                    },
                                    error: function () {
                                        alert('An error occurred while fetching games.');
                                        $('#default_loader').hide();
                                    }
                                });
                            }
                        
                            // Initial fetch
                            fetchGames(currentPage);
                        
                            // Next button click
                            $('#next_page').click(function () {
                                currentPage++;
                                fetchGames(currentPage);
                            });
                        
                            // Previous button click
                            $('#prev_page').click(function () {
                                if (currentPage > 1) {
                                    currentPage--;
                                    fetchGames(currentPage);
                                }
                            });
                        });



				</script>
            </div>
        </div>
        <div class="w-full flex justify-center my-5">
            <!--<div class="w-full" id="static-ad-4">-->
            <!--    <script>-->
            <!--        googletag.cmd.push(function () {-->
            <!--            googletag.display('static-ad-4');-->
            <!--        });-->
            <!--    </script>-->
            <!--</div>-->
             
        </div>
    </div>
    <div class="w-full overflow-x-hidden mx-auto">
        <script type="text/javascript" src="https://game.reapbucks.com/js/reward-modal.js"></script>
        <?php include("footer.php");?>
    </div>
</body>

</html>