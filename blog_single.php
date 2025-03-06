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
        <h1 class="sr-only">Master Spelling with Fun Quizzes and Games! | zettaquiz</h1>
        <div class="w-full flex justify-center my-5">
            <!--<div class="w-full" id="static-ad-1">-->
            <!--    <script>-->
            <!--        googletag.cmd.push(function () {-->
            <!--            googletag.display('static-ad-1');-->
            <!--        });-->
            <!--    </script>-->
            <!--</div>-->
             
        </div>
        <?php if($_REQUEST['blog']!=''){
          $blog_ns=$_REQUEST['blog'];
           }else{
           header("https://game.reapbucks.com");
           } ?>
       <?php 
           $blog_id = str_replace('-',' ', $blog_ns);
           $blogs = $con->query("SELECT * FROM blogs WHERE title='$blog_id'");

           if ($blogs->num_rows > 0) {
               while ($blog = $blogs->fetch_assoc()) {
          ?>
        <div class="text-white my-5 bg-[#232325] border-[#404044]  border-[1px]  border-opacity-30 py-[3rem] px-7  justify-center item-center rounded-[30px]">
            <img src="https://game.reapbucks.com/images/blog/<?php echo $blog['image1']?>" alt="Spelling Test: Turn Learning Into Fun!" class="w-full object-cover aspect-[3/2] max-h-[60vh] rounded-lg mb-3">
            <h1 class="font-bold text-3xl uppercase"><?php echo $blog['title']?></h1>
            <span class="text-[#969699] mt-2 mb-5 font-light text-xs"><i class="my-2 fa-sharp fa-solid fa-calendar-days pr-2"></i><?php echo $blog['datee']?></span>
            <article class="!text-white prose px-2 w-full max-w-none" id="blog-content"><?php echo $blog['description']?></article>
        </div>
          <?php
                }
            } else {
                echo '';
            }
            ?>
        <div
            class="my-5 game-banner-container text-white bg-[#232325] border-[#404044] border-[1px] border-opacity-30 justify-center rounded-[30px]">
            <div
                class="bg-[#232325] border-[#404044] w-full  border-opacity-30 rounded-[30px] bg-cover bg-no-repeat game-banner-container p-5">
                <div class="w-full flex items-center mb-3">
                    <h3 class="text-[24px] tracking-tight font-semibold capitalize leading-none flex-none text-white m-2"
                        style="background: linear-gradient(176.89deg, #ffffff 2.58%, #ffffff 78.88%); -webkit-background-clip: text; color: transparent; ">
                        Similar Blogs</h3>
                    <div class="grow"></div>
                    <a class="text-[14px] font-normal leading-[14px] capitalize text-white" href="https://game.reapbucks.com/blogs">view
                        all </a>
                    <img src="https://game.reapbucks.com/images/right-arrow.svg" class="text-[14px] font-normal h-5 w-5" alt="right arrow">
                </div>
                <div class="grid md:grid-cols-3 grid-cols-1 gap-4 px-[0.3rem]">
                     <!--dynmically data-->
                    <?php 
                        $sql="select * from blogs order by blogs.id desc";
                        $res=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($res)){?>
                    <div class="flex flex-col p-2 rounded-lg">
                        <a href="https://game.reapbucks.com/blog-details/<?php echo str_replace(' ','-', $row['title']); ?>" class="aspect-[3/2]">
                            <img src="https://game.reapbucks.com/images/blog/<?php echo $row['image1']?>"
                                class="w-full rounded-xl object-cover transition-transform scale-1 hover:scale-105"
                                alt="<?php echo $row['title']?>" />
                        </a>
                        <a href="https://game.reapbucks.com/blog-details/<?php echo str_replace(' ','-', $row['title']); ?>" class="no-underline" aria-label="<?php echo $row['title']?>">
                            <p class="truncate cursor-pointer px-2 pt-2 font-semibold"><?php echo $row['title']?></p>
                        </a>
                        <a href="https://game.reapbucks.com/blog-details/<?php echo str_replace(' ','-', $row['title']); ?>" aria-label="Similar blogs read more" class="">
                            <p class="text-[#969699] line-clamp-2 px-2 mb-1 font-light text-sm"><?php echo $row['descriptions']?></p>
                        </a>
                        <span class="text-[#736B7A] px-2 mb-2 font-medium text-xs">
                            <i class="fa-sharp fa-solid fa-calendar-days pr-2"></i><?php echo $row['datee']?>
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