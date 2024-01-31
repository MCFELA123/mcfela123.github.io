@JavascriptInterface
  public void hideOrRemoveSplashScreen() {
  objetcSplashScreen.doRemoveSplashScreen();    
  //...
}
$(function() {
  try{Android.hideOrRemoveSplashScreen()}catch(e){};
});