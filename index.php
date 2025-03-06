<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='home'");
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
            <div class="bg-[#232325] border-[#404044] rounded-[30px] popular-quiz-container popular-quiz-main p-5">
                <div class="flex items-center">
                    <h3 class="text-[24px] tracking-tight text-white font-semibold capitalize leading-none flex-none m-2"
                        style="background: linear-gradient(176.89deg, #ffffff 2.58%, #ffffff 78.88%); -webkit-background-clip: text; color: transparent; ">
                        Popular Quizzes</h3>
                </div>
                <div class="swiper-container p-4 relative">
                    <div class="swiper-wrapper mt-8">
                        <?php 
                        $sql="select * from games order by games.id desc";
                        $res=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($res)){?>

                        <!--dynamically get data-->
                        <div class="swiper-slide">
                            <a href="view-game/<?php echo str_replace(' ','-', $row['name']); ?>">
                                <div class="aspect-square">
                                    <img src="images/games/<?php echo $row['image']?>"
                                        alt="<?php echo $row['name']?>"
                                        class="w-full aspect-square rounded-lg transition-transform scale-1 hover:scale-105" />
                                </div>
                                <h3 class="font-bold text-sm md:text-md pt-2 text-white text-center"><?php echo $row['name']?></h3>
                            </a>
                        </div>
                        <?php $i++; } ?>
                        <!--dynamically get data-->
                        
                    </div>
                    <div class="prev absolute z-[1] top-[50%] translate-y-[-50%] -left-1"> <i
                            class="fa fa-chevron-left w-auto h-auto text-[20px] text-white" aria-hidden="true"></i>
                    </div>
                    <div class="next absolute z-[1] top-[50%] translate-y-[-50%] -right-2"> <i
                            class="fa fa-chevron-right w-auto h-auto text-[20px] text-white" aria-hidden="true"></i>
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
        <div class="my-5">
            <div class="bg-[#232325] border-[#404044] rounded-[30px] p-5">
                <div class="w-full flex items-center mb-5">
                    <h3 class="text-[24px] tracking-tight font-semibold capitalize leading-none flex-none text-white m-2"
                        style="background: linear-gradient(176.89deg, #ffffff 2.58%, #ffffff 78.88%); -webkit-background-clip: text; color: transparent; ">
                        New Quizzes</h3>
                </div>
                <div class="grid md:grid-cols-6 grid-cols-3 gap-4">
                    <!--dynmically data get-->
                    <?php 
                        $sql="select * from games order by games.id desc limit 6";
                        $res=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($res)){?>
                    <div>
                        <a href="view-game/<?php echo str_replace(' ','-', $row['name']); ?>">
                            <div class="aspect-square">
                                <img src="images/games/<?php echo $row['image']?>"
                                    alt="<?php echo $row['name']?>"
                                    class="w-full aspect-square rounded-lg transition-transform scale-1 hover:scale-105" />
                            </div>
                            <h3 class="text-sm md:text-md pt-2 font-bold text-white text-center"><?php echo $row['name']?></h3>
                        </a>
                    </div>
                     <?php $i++; } ?>
                     <!--dynmically data get-->
                </div>
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
				
				<script src="cdnpage/js/jquery-3.6.0.min.js"></script>
				<script>
					$(document).ready(function () {
                    let currentPage = 1;
                    const limit = 8;
                
                    function fetchGames(page) {
                        $('#default_loader').show();
                
                        $.ajax({
                            url: 'fetch_games.php',
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
        <script src="cdnpage/js/swiper-bundle.min.js"></script>
        <script>
            var mySwiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 30,
                direction: 'horizontal',
                simulateTouch: false,
                autoHeight: true,
                loop: true,
                breakpoints: {
                    320: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    768: {
                        slidesPerView: 5,
                        spaceBetween: 40
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 40
                    },
                },
                navigation: {
                    nextEl: '.next',
                    prevEl: '.prev',
                },
            });
        </script>
    </div>
    <div class="w-full overflow-x-hidden mx-auto">
        <script type="text/javascript" src="js/reward-modal.js"></script>
        <?php include("footer.php");?>
    </div>
</body>

</html>