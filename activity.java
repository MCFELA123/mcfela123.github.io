myWebView.addJavascriptInterface(new JavaScriptInterface(this, cookieManager),"Android");
container = findViewById(R.id.container);
splash = findViewById(R.id.splashimg);
myWebView.setWebChromeClient(new MyChrome()) {
[...]
    @Override
    public void onProgressChanged(WebView view, int newProgress) {
       if (newProgress == 100){
          container.removeView(splash);
       }
       super.onProgressChanged(view, newProgress);
    }
}