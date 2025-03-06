function initializeAds() {
  return new Promise((resolve) => {
    if (window.afg) {
      if (window.afg.ready) {
        resolve(true)
      } else {
        resolve(false)
      }
      return;
    }

    window.adsbygoogle = window.adsbygoogle || [];
    var afg = {};

    afg.adBreak = window.adConfig = function (o) {
      adsbygoogle.push(o);
    };
    afg.ready = false;
    window.afg = afg;
    const onAdsReady = () => {
      window.afg.ready = true
      resolve(true)
    }
    try{
      if (!window.adConfigCalled) {
        window.adConfigCalled = true;
        adConfig({
          preloadAdBreaks: 'on',
          onReady: onAdsReady,
        });
      } else {
          console.log('Already set.');
          onAdsReady();
      }
    }catch(e){
      console.log('>> Ad config already initilized')
      resolve(false);
    }
  })
}