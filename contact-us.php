
<?php include("top_header_url.php");?>
<?php                                                                                                               
    $cat_res4=mysqli_query($con,"select * from meta_data where page='contact'");
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
            class="my-5 bg-[#232325] border-[#404044] border-[1px] border-opacity-30 text-white py-[3rem] px-[4rem] grid justify-center place-item-center rounded-[30px] min-h-[80vh]">
            <div class="my-auto">
                <h3 id="success" class="bg-green-100 text-green-600 p-4 m-2"></h3>
                <h3 id="errors" class="bg-red-100 text-red-600 p-4 m-2"></h3>
                <h1 class="text-5xl text-center tracking-wide font-bold capitalize my-4">Contact Us</h1>
                <p class="text-[14px] text-[#969699] text-center font-normal leading-5 tracking-wide">Questions or
                    Feedback? Contact us here!</p>
                    <form method="post" id="contact_us_form" onsubmit="sendContactUsMail(event);">
                        <div class="space-y-4 pt-4">
                            <div class="">
                                <input type="text"
                                    class="bg-[#19191B] border-[#424243] w-full p-2 my-1 border-2 rounded-lg outline-none"
                                    id="name" name="name" placeholder="Enter Name">
                                <input type="email"
                                    class="bg-[#19191B] border-[#424243] w-full p-2 my-1 border-2 rounded-lg outline-none"
                                    id="email" name="email" placeholder="Enter Email">
                            </div>
                            <textarea rows="4" class="bg-[#19191B] border-[#424243] w-full p-2 rounded-lg outline-none"
                                id="message" name="message" placeholder="Your message..."></textarea>
                            <div class="flex items-center justify-center">
                                <button id="contactUsSubmitBtn"
                                    class="transition-transform scale-1 hover:scale-105 uppercase bg-[#19191B] border-[#424243] py-2 font-semibold text-white text-lg rounded-full w-44"
                                    type="submit">
                                    Submit
                                </button>
                                <i id="contact-us-loader" class="animate-spin text-2xl fa-solid fa-spinner"></i>
                            </div>
                        </div>
                    </form>
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

        <script type="text/javascript">
            $(document).ready(function () {
                $('#success').text('');
                $('#success').hide();
                $('#errors').text('');
                $('#errors').hide();
                $('#contact-us-loader').hide()
            })

            function sendContactUsMail(event) {
                $('#success').text('');
                $('#success').hide();
                $('#errors').text('');
                $('#errors').hide();
                var sendContactUsMailUrl = "send-contact-us-mail.html";

                event.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var message = $('#message').val();
                if (!name) {
                    $('#errors').text('Name cannot be empty');
                    $('#errors').show();
                    return
                }
                if (!email) {
                    $('#errors').text('Email cannot be empty');
                    $('#errors').show();
                    return
                }
                if (!validateEmail(email)) {
                    $('#errors').text('Please enter valid email');
                    $('#errors').show();
                    return
                }
                if (!message) {
                    $('#errors').text('Message cannot be empty');
                    $('#errors').show();
                    return
                }
                $('#contactUsSubmitBtn').hide()
                $('#contact-us-loader').show()
                $.ajax({
                    url: sendContactUsMailUrl,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'post',

                    dataType: 'json',
                    data: {
                        "name": name,
                        "email": email,
                        "message": message
                    },
                    success: function (response) {
                        $('#contactUsSubmitBtn').show()
                        $('#contact-us-loader').hide()
                        if (response.success == 1) {
                            $('#success').text("Contact request submitted successfully");
                            $('#contact_us_form')[0].reset();
                            $('#success').show();
                        } else {
                            $('#errors').text(response.message);
                            $('#errors').show();
                        }
                    },
                })
            }
            const validateEmail = (email) => {
                return email.match(
                    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
            };
        </script>
    </div>
    <div class="w-full overflow-x-hidden mx-auto">
        <script type="text/javascript" src="js/reward-modal.js"></script>
        <?php include("footer.php");?>
    </div>
</body>
</html>