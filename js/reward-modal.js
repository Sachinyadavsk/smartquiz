$(document).ready(function () {
  window.googletag = window.googletag || { cmd: [] };
  let rewardedSlot;
  let rewardPayload;

  function dismissRewardedAd() {
    afterAd_function();
    if (rewardPayload) {
      rewardPayload = null;
    } else {
      console.log('>> Ad Dismissed, No reward collected');
    }
    
    updateStatus("Rewarded ad has been closed.");
    
    if (rewardedSlot) {
      console.log("Destroying slots");
      googletag.destroySlots([rewardedSlot]);
      rewardedSlot = null;
    }
  }

  if(document.getElementById("watchAdBtn")){
    document.getElementById("watchAdBtn").onclick = () => {
      $('#collectRewardModal').addClass('hidden'); 
      initializeRewardedAd();             
      updateStatus("Rewarded ad is active.");
    };
  }
 
  if(document.getElementById("watchAdBtn_1")){
    document.getElementById("watchAdBtn_1").onclick = () => {
        initializeRewardedAd();
        updateStatus("Rewarded ad is active.");
    };
  }

function initializeRewardedAd() {
  if (rewardedSlot) {
    console.log("Rewarded ad slot already initialized. Destroying and reinitializing...");
    googletag.destroySlots([rewardedSlot]);
    rewardedSlot = null;
  }
    googletag.cmd.push(() => {
      rewardedSlot = googletag.defineOutOfPageSlot(
                  "/98948493,22817566290/Crikey/adsparc_fq_h5_rewarded",
                  googletag.enums.OutOfPageFormat.REWARDED,
                );

        if (rewardedSlot) {
            rewardedSlot.addService(googletag.pubads());

            googletag.pubads().addEventListener("rewardedSlotReady", (event) => {
                updateStatus("Rewarded ad slot is ready.");
                event.makeRewardedVisible();
            });

            googletag.pubads().addEventListener("rewardedSlotClosed", dismissRewardedAd);

            googletag.pubads().addEventListener("rewardedSlotGranted", handleRewardAds);

            function handleRewardAds(event){
              rewardPayload = event.payload;
              updateStatus("Reward granted.");
          }

            googletag.pubads().addEventListener("slotRenderEnded", (event) => {
                if (event.slot === rewardedSlot && event.isEmpty) {
                    updateStatus("No ad returned for rewarded ad slot.");
                }
            });

            googletag.enableServices();
            googletag.display(rewardedSlot);
        } else {
            updateStatus("Rewarded ads are not supported on this page.");
        }
    });
}

  
function updateStatus(message) {
  console.log(message);
}

    $('#toast-danger').find('#error-message').text(" ");
    $('#gift_web').on('click', function () {
        $('#collectRewardModal').removeClass('hidden');
    });

    $('#gift_mv').on('click', function () {
        $('#collectRewardModal').removeClass('hidden');
    });

    $('#closeRewardModal').on('click', function () {
        $('#collectRewardModal').addClass('hidden');
    });

    let initialCoins = parseInt(localStorage.getItem('COINS')) || 0;
    $('#goldAmount').text(initialCoins);
    $('#goldAmount_mv').text(initialCoins);
});

function afterAd_function() {
    console.log("Ad has completed, executing afterAd function.");
    let COINS = parseInt(localStorage.getItem('COINS')) || 0;
    COINS += AD_COINS_COUNT;
    playCoinAudio();
    popUpCoins();
    localStorage.setItem('COINS', COINS);
    $('#goldAmount').text(COINS);
    $('#goldAmount_mv').text(COINS);
}

function showLoader(){
    $('#loader').removeClass('hidden');
}

function playCoinAudio() {
    var audio = new Audio('/coin_audio.mp3');
    audio.play();
}

function popUpCoins() {
    const animationContainer = document.createElement('div');
    animationContainer.id = 'coinAnimation';
    animationContainer.style.position = 'fixed';
    animationContainer.style.bottom = '0';
    animationContainer.style.left = '0';
    animationContainer.style.right = '0';
    animationContainer.style.margin = '0 auto';
    animationContainer.style.maxHeight = '100dvh';
    animationContainer.style.overflow = 'hidden';
    animationContainer.style.zIndex = 1000;
    animationContainer.style.width = '100%';

    function responsiveAnimation() {
        if (window.matchMedia('(max-width: 640px)').matches) {
            animationContainer.style.width = '100%';
        } else {
            animationContainer.style.width = '400px';
        }
    }
    responsiveAnimation();
    window.addEventListener('resize', responsiveAnimation);
    document.body.appendChild(animationContainer);

    const animation = bodymovin.loadAnimation({
        container: animationContainer,
        path: '/js/animations.json',
        renderer: 'svg',
        loop: false,
        autoplay: true,
    });

    animation.addEventListener('complete', function () {
        document.body.removeChild(animationContainer);
    });
}