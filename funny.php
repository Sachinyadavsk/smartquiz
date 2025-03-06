<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='funny'");
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
        <div class="my-5">
            <div class="bg-[#232325] border-[#404044] rounded-[30px] p-8">
                <div class="p-2 flex justify-between items-center mb-3">
                    <h3 class="text-[24px] tracking-tight font-semibold capitalize leading-none flex-none m-2"
                        style="background: linear-gradient(176.89deg, #ffffff 2.58%, #ffffff 78.88%); -webkit-background-clip: text; color: transparent; ">
                        Funny </h3>
                </div>
                <div class="min-h-[100vh]">
                    <div class="grid md:grid-cols-4 gap-3 grid-cols-2  px-[0.3rem]">
                        <!--dynmically data-->
                        <?php 
                        $sql="select * from games where type='funny' order by games.id desc";
                        $res=mysqli_query($con,$sql);
						$i=1;
						while($row=mysqli_fetch_assoc($res)){?>
                        <div>
                            <a href="view-game/<?php echo str_replace(' ','-', $row['name']); ?>">
                                <div class="aspect-video">
                                    <img class="p-0 m-0 block aspect-[4/3] object-cover w-full rounded-lg"
                                        src="images/games/<?php echo $row['image']?>"
                                        alt="<?php echo $row['name']?>" />
                                </div>
                                <div class="p-2">
                                    <h3
                                        class="mt-2 text-[18px] tracking-tight text-white font-medium capitalize leading-tight text-center">
                                        <?php echo $row['name']?></h3>
                                </div>
                            </a>
                        </div>
                        <?php $i++; } ?>
                         <!--dynmically data-->
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