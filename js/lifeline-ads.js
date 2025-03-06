function showAds_lifelines(lifelineType) {
  console.log('showads lifeline function');
  console.log('lifeline:'+lifelineType);
  freezeTimer();
    window.googletag = window.googletag || { cmd: [] };

      let rewardedSlot;
      let rewardPayload;

      googletag.cmd.push(() => {
        rewardedSlot = googletag.defineOutOfPageSlot(
          "/98948493,22817566290/Crikey/adsparc_fq_h5_rewarded",
          googletag.enums.OutOfPageFormat.REWARDED,
        );

        if (rewardedSlot) {
          rewardedSlot.addService(googletag.pubads());

          googletag.pubads().addEventListener("rewardedSlotReady", handleRewardedSlotReady);
          googletag.pubads().addEventListener("rewardedSlotClosed", dismissRewardedAd);
          googletag.pubads().addEventListener("rewardedSlotGranted", handleRewardedSlotGranted);
          googletag.pubads().addEventListener("slotRenderEnded", handleSlotRenderEnded);
          
          function handleRewardedSlotReady(event) {
            googletag.pubads().removeEventListener("rewardedSlotReady", handleRewardedSlotReady);
            updateStatus("Rewarded ad slot is ready.");

              event.makeRewardedVisible();
              updateStatus("Rewarded ad is active.");
          }

          function handleRewardedSlotGranted(event) {
            googletag.pubads().removeEventListener("rewardedSlotGranted", handleRewardedSlotGranted);
            rewardPayload = event.payload;
            console.log('Before switch lifeline:'+lifelineType);
            switch (lifelineType) {
                case '5050':
                   console.log('In switch 5050'+lifelineType);
                    use5050Lifeline();
                    break;
                case 'FlipQuestion':
                  console.log('In switch flip'+lifelineType);
                    useFlipQuestionLifeline();
                    break;
                case 'AudiencePoll':
                  console.log('In switch audience'+lifelineType);
                    useAudiencePollLifeline();
                    break;
                case 'FreezeTimer':
                  console.log('In switch freezetimer'+lifelineType);
                    useFreezeLifeline();
                    break;
                case 'DoubleAds':
                    break;
                default:
                    console.error("Unhandled lifeline type:", lifelineType);
            }
        
            updateStatus("Reward granted.");
        }

        function handleSlotRenderEnded(event){
        googletag.pubads().removeEventListener("slotRenderEnded", handleSlotRenderEnded);
          if (event.slot === rewardedSlot && event.isEmpty) {
            console.log('failed ads before switch');
            switch (lifelineType) {
              case '5050':
                console.log('In switch failed ads 5050'+lifelineType);
                  use5050Lifeline();
                  break;
              case 'FlipQuestion':
                console.log('In switch failed ads flipQ'+lifelineType);
                  useFlipQuestionLifeline();
                  break;
              case 'AudiencePoll':
                console.log('In switch failed ads audiencePoll'+lifelineType);
                  useAudiencePollLifeline();
                  break;
              case 'FreezeTimer':
                console.log('In switch failed ads freezetimer'+lifelineType);
                  useFreezeLifeline();
                  break;
              case 'DoubleAds':
                  break;
              default:
                  console.error("Unhandled lifeline type:", lifelineType);
          }
            updateStatus("No ad returned for rewarded ad slot.");
          }
        }

          googletag.enableServices();
          googletag.display(rewardedSlot);
        } else {
          updateStatus("Rewarded ads are not supported on this page.");
        }
      });

      function dismissRewardedAd() {
        googletag.pubads().removeEventListener("rewardedSlotClosed", dismissRewardedAd);
        if(lifelineType === 'DoubleAds'){
          doubleCoins();
        }
        if (lifelineType === 'DoubleAds') {
          $('#timer').css('color', '');
        }else{
          resumeTimer();
        }
        if (rewardPayload) {
          rewardPayload = null;
        } else {
          console.log('>> Ad Dismissed, No reward collected');
        }

        updateStatus("Rewarded ad has been closed.");

        if (rewardedSlot) {
          googletag.destroySlots([rewardedSlot]);
        }
      }

      function updateStatus(message) {
        console.log(message);
      }

    $('#lifelinesList').addClass('hidden');
    // if (lifelineType === 'DoubleAds') {
    //   $('#timer').css('color', '');
    // }else{
    //   resumeTimer();
    // }
}