<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='blog'");
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
        <h1 class="sr-only">Read interesting quiz articles | zettaquiz</h1>
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
            <div class="bg-[#232325] border-[#404044] border-[1px] border-opacity-30 rounded-[30px] p-5">
                <div class="w-full flex items-center mb-5">
                    <h3 class="text-[24px] tracking-tight font-extrabold uppercase flex-none"
                        style="background: linear-gradient(176.89deg, #ffffff 2.58%, #ffffff 78.88%); -webkit-background-clip: text; color: transparent;">
                        Blogs</h3>
                </div>
                <div class="flex flex-wrap gap-3 px-[0.3rem]">
                    <!--dynmically data-->
                    <?php 
                        $sql="select * from blogs order by blogs.id desc";
                        $res=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($res)){?>
                            <div class="p-5 w-full sm:w-[calc(50%-0.75rem)] md:w-[calc(33.333%-1rem)] text-white mb-3">
                                <a href="blog-details/<?php echo str_replace(' ','-', $row['title']); ?>" class="block aspect-video"
                                    aria-label="<?php echo $row['title']?>">
                                    <img src="images/blog/<?php echo $row['image1']?>"
                                        class="w-full rounded-xl object-cover transition-transform scale-1 hover:scale-105"
                                        alt="<?php echo $row['title']?>" />
                                </a>
                                <a href="blog-details/<?php echo str_replace(' ','-', $row['title']); ?>" class="no-underline block"
                                    aria-label="<?php echo $row['title']?>">
                                    <p class="truncate cursor-pointer px-2 pt-2 font-semibold"><?php echo $row['title']?></p>
                                </a>
                                <p class="line-clamp-2 mb-1 text-[#969699] px-2 font-light text-sm"><?php echo $row['descriptions']?></p>
                                <span class="px-2 mb-2 font-medium text-2xs block text-[#736B7A]">
                                    <i class=" fa-sharp fa-solid fa-calendar-days pr-2"></i><?php echo $row['datee']?>
                                </span>
                            </div>
                    <?php $i++; } ?>
                     <!--dynmically data-->
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