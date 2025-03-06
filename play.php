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
    $cat_res4=mysqli_query($con,"select * from meta_data where page='playgame'");
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
    <link rel="stylesheet" href="https://game.reapbucks.com/cdnpage/css/flowbite.min.css" />
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/style.css">
    <link rel="preload" as="style" href="https://game.reapbucks.com/build/assets/app-e0ebea9b.css" />
    <link rel="stylesheet" href="https://game.reapbucks.com/build/assets/app-e0ebea9b.css" />
    <link rel="modulepreload" href="https://game.reapbucks.com/build/assets/app-1da0cd6f.js" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/style.css">
    <link href="https://game.reapbucks.com/cdnpage/css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://game.reapbucks.com/css/style.css">
    
    <!--script js-->
    <script type="text/javascript" src="https://game.reapbucks.com/js/ads-init.js"></script>
    <script type="text/javascript" src="https://game.reapbucks.com/js/lifeline-ads.js"></script>
    <script type="module" src="https://game.reapbucks.com/build/assets/app-1da0cd6f.js"></script>
    <script type="text/javascript" src="https://game.reapbucks.com/js/blockadblock.js"></script>
    <script type="text/javascript" src="https://game.reapbucks.com/js/ads.js"></script>
    <script src="https://game.reapbucks.com/cdnpage/js/jquery.min.js"></script>
    <script src="https://game.reapbucks.com/cdnpage/js/flowbite.min.js"></script>
    <script src="https://game.reapbucks.com/cdnpage/js/jquery-3.6.0.min.js"></script>
    <script src="https://game.reapbucks.com/cdnpage/js/lottie.min.js"></script>
                  
</head>
<style>
    body {
        min-width: 280px;
    }
    .quiz_content {
        height: calc(100% - 100px) !important;
    }
</style>

<?php if($_REQUEST['game_id']!=''){
   $game_ids=$_REQUEST['game_id'];
   }else{
   header("https://game.reapbucks.com");
   } ?>
   
 <?php 
   $game_id = str_replace('-',' ', $game_ids);
   $games = $con->query("SELECT * FROM games WHERE name='$game_id'");

   if ($games->num_rows > 0) {
        $game = $games->fetch_assoc();
        $images =$game['image'];
        $name = $game['name'];
        $game_id_quick = $game['id'];
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
                                        <a href="https://game.reapbucks.com/" class=""><i class="fa-solid fa-house"
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
                            <img src="https://game.reapbucks.com/images/games/<?php echo $images?>"
                                alt="Game Logo" class="h-[150px] w-[150px] mb-4 mx-auto" />
                            <h2 class="text-md font-semibold mb-4 text-center">Invite your friends to play this game!
                            </h2>
                            <input type="text" id="shareLink" value="https://game.reapbucks.com/view-game/<?php echo $game_ids;?>" readonly
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
                        <div class="py-1 fixed sm:max-w-[700px] w-full px-4">
                            <div class="flex justify-between items-center text-white px-6 py-4 w-full mx-auto">
                                <div
                                    class="flex items-center w-30 bg-[#19191B] text-white px-4 py-2 rounded-full border-[#424243] space-x-2 shadow-md w-fit">
                                    <div class="text-md">
                                        <img src="https://game.reapbucks.com/images/quiz_points_crown.png" alt="Crown"
                                            class="h-[20px] object-contain" />
                                    </div>
                                    <span id="score" class="text-md font-bold text-white w-15">0</span>
                                </div>
                                <div class="text-center">
                                    <span class="block text-md font-bold uppercase text-white">Question</span>
                                    <span class="block text-md font-bold" id="question-number"></span>
                                </div>

                                <div
                                    class="flex items-center w-30 bg-[#19191B] text-white px-4 py-2 rounded-full border-[#424243] space-x-2 shadow-md w-fit">
                                    <div class="text-md">
                                        <img src="https://game.reapbucks.com/images/quiz_timer.png" alt="timer" class="h-[20px] object-contain" />
                                    </div>
                                    <span id="timer" class="text-md font-bold text-white w-10"></span>
                                </div>
                            </div>
                        </div>
                        <div class="h-24"></div>
                        <div id="quiz-container"
                            class="mt-2 quiz_content overflow-y-auto overflow-x-hidden custom-scrollbar"
                            style="height: calc(100% - 103px)">
                            <div class="mx-6 mt-2">
                                <div id="question" class="text-[18px] text-white font-bold text-center mx-4 my-4">
                                </div>
                                <div id="image-container" class="mb-4 px-4"></div>
                                <div id="options" class="grid grid-cols-2 gap-4 mx-4 my-4">
                                </div>
                            </div>

                            <div id="audiencePollValues"
                                class="fixed top-0 left-0 w-full h-full flex justify-center items-center hidden z-20 shadow-md">
                                <div class="fixed inset-0 bg-gray-800 bg-opacity-50 backdrop-blur-[2px]"></div>
                                <div
                                    class="bg-[#111827] rounded-lg p-7 relative z-10 mx-4 flex flex-col w-[320px] items-center right-0 border border-white">
                                    <button id="closePollValues"
                                        class="absolute top-2 right-3 text-white text-3xl rounded-full cursor-pointers">
                                        &times;
                                    </button>
                                    <div
                                        class="grid grid-cols-2 grid-rows-2 gap-2 p-2 rounded-lg bg-[#111827] mx-auto w-full">
                                        <div id="a_option"
                                            class="flex items-center justify-center p-3 text-white rounded-md">A - 100
                                        </div>
                                        <div id="b_option"
                                            class="flex items-center justify-center p-3 text-white rounded-md">B - 100
                                        </div>
                                        <div id="c_option"
                                            class="flex items-center justify-center p-3 text-white rounded-md">C - 100
                                        </div>
                                        <div id="d_option"
                                            class="flex items-center justify-center p-3 text-white rounded-md">D - 100
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="w-full" id="static-ad-1">-->
                            <!--    <script>-->
                            <!--        googletag.cmd.push(function () {-->
                            <!--            googletag.display('static-ad-1');-->
                            <!--        });-->
                            <!--    </script>-->
                            <!--</div>-->
                            
                            
                        </div>
                        <script>
                                    let gameId = <?php echo $game_id_quick?>; // Set game_id dynamically
                                    let currentQuestionIndex = 0;
                                    let correctAnswersCount = 0;
                                    let totalQuestions = 0;
                                    let timeLeft = 200; // Timer set to 200 seconds
                                    let timerInterval;
                                    
                                    function startTimer() {
                                        let timerDisplay = document.getElementById('timer');
                                        
                                        timerInterval = setInterval(() => {
                                            timeLeft--;
                                            timerDisplay.innerText = `${timeLeft}`;
                                    
                                            if (timeLeft <= 0) {
                                                clearInterval(timerInterval);
                                                showFinalResult();
                                            }
                                        }, 1000);
                                    }
                                    
                                    function fetchQuestion(gameId, questionIndex) {
                                        fetch('https://game.reapbucks.com/cqstsapi.php', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded'
                                            },
                                            body: `game_id=${gameId}&question_index=${questionIndex}`
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status === 'success') {
                                                totalQuestions = data.total_questions;
                                    
                                                document.getElementById('question-number').innerText = 
                                                    `Question ${questionIndex + 1} of ${totalQuestions}`;
                                    
                                                document.getElementById('question').innerHTML = data.question;
                                    
                                                let optionsContainer = document.getElementById('options');
                                                optionsContainer.innerHTML = '';
                                    
                                                data.answers.forEach((answer, index) => {
                                                    let option = document.createElement('div');
                                                    option.classList.add('option', 'text-white', 'p-4', 'rounded-md', 'cursor-pointer', 'border', 'border-white', 'text-center');
                                                    option.innerHTML = `(${String.fromCharCode(65 + index)}) ${answer.answer}`;
                                                    option.dataset.id = answer.id;
                                                    option.dataset.correct = answer.is_correct;
                                    
                                                    option.addEventListener('click', function () {
                                                        handleAnswerSelection(option, answer.is_correct);
                                                    });
                                    
                                                    optionsContainer.appendChild(option);
                                                });
                                    
                                            } else {
                                                document.getElementById('question').innerHTML = 'No questions available.';
                                            }
                                        })
                                        .catch(error => console.error('Error fetching question:', error));
                                    }
                                    
                                   function handleAnswerSelection(option, isCorrect) {
                                            let optionsContainer = document.getElementById('options');
                                            let allOptions = optionsContainer.querySelectorAll('.option');
                                        
                                            // Disable all options after one is selected
                                            allOptions.forEach(opt => opt.style.pointerEvents = 'none');
                                        
                                            // Get current score from cookie
                                            let currentScore = getCookie('correct_answers') ? parseInt(getCookie('correct_answers')) : 0;
                                        
                                            if (isCorrect == 1) {
                                                option.style.backgroundColor = 'green';
                                                correctAnswersCount++; 
                                                let updatedScore = currentScore + 1; // Increment by 1 only
                                                document.cookie = "correct_answers=" + updatedScore + "; path=/; max-age=" + (60 * 60 * 24 * 30); // Store for 30 days
                                                updateScoreDisplay(updatedScore);
                                            } else {
                                                option.style.backgroundColor = 'red';
                                                updateScoreDisplay(currentScore); // Keep the same score on incorrect answer
                                            }
                                        
                                            document.getElementById('score').innerText = correctAnswersCount;
                                        
                                            setTimeout(() => {
                                                currentQuestionIndex++;
                                                if (currentQuestionIndex < totalQuestions) {
                                                    fetchQuestion(gameId, currentQuestionIndex);
                                                } else {
                                                    showFinalResult();
                                                }
                                            }, 2000);
                                        }
                                        
                                        // 🔄 Update Score Display
                                        function updateScoreDisplay(score) {
                                            let pointsDisplay = document.getElementById('points-display');
                                            if (pointsDisplay) {
                                                pointsDisplay.innerText = score + ' Pt.';
                                                pointsDisplay.classList.toggle('positive', score > 0);
                                                pointsDisplay.classList.toggle('negative', score === 0);
                                            }
                                        }
                                        
                                        // 🍪 Get Cookie Value
                                        function getCookie(name) {
                                            var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                                            return match ? match[2] : null;
                                        }
                                        
                                        function showFinalResult() {
                                            clearInterval(timerInterval);
                                            let finalScore = getCookie('correct_answers') ? parseInt(getCookie('correct_answers')) : 0;
                                        
                                            let resultHTML = `<div class="mx-6">
                                                <div class="bg-[#232325] text-white flex flex-col justify-center items-center mx-auto">
                                                    <h1 class="text-[30px] font-semibold text-center text-white">${finalScore === 0 ? "Better Luck Next Time!" : "Well Played!"}</h1>
                                                    <div class="flex items-center justify-center">
                                                        <img src="https://game.reapbucks.com/images/${finalScore === 0 ? 'sad.gif' : 'well_played.gif'}" alt="Result Image" class="h-28 object-contain mr-2 my-2">
                                                    </div>
                                                    <div class="flex flex-row space-x-4 w-full p-2">
                                                        <div class="bg-[#19191B] border-[#424243] rounded-lg flex-1 p-4">
                                                            <p class="text-2xl font-semibold text-center text-[#F5C154]" id="quiz_score">${finalScore}</p>
                                                            <p class="text-md text-white text-center">Your Score</p>
                                                        </div>
                                                        <div class="bg-[#19191B] border-[#424243] rounded-lg flex-1 p-4">
                                                            <p class="text-2xl font-semibold text-center text-[#F5C154]" id="quiz_coins">${totalQuestions}</p>
                                                            <p class="text-md text-white text-center">Total Question</p>
                                                        </div>
                                                    </div>
                                                    <a href="https://game.reapbucks.com" id="playGameBtn" class="animatedPlayBtn bg-[#19191B] text-xl flex justify-center items-center rounded-full w-48 p-3 my-3 border border-[#424243] text-center mx-auto">
                                                        <div class="flex justify-center items-center text-white shrink-0">
                                                            <div class="h-[20px] mr-1"><i class="fa-solid fa-home"></i></div>
                                                            <span class="font-bold text-white uppercase text-md ml-1">Home</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>`;
                                        
                                            document.getElementById('quiz-container').innerHTML = resultHTML;
                                        }

                                    
                                    // UI elements
                                    let quizContainer = document.getElementById('quiz-container');
                                    
                                    let questionNumberDisplay = document.createElement('div');
                                    questionNumberDisplay.id = 'question-number';
                                    questionNumberDisplay.classList.add('text-white', 'text-lg', 'font-bold', 'text-center', 'mt-2');
                                    quizContainer.prepend(questionNumberDisplay);
                                    
                                    // Start quiz
                                    startTimer();
                                    fetchQuestion(gameId, currentQuestionIndex);

                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>