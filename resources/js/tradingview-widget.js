window.tradingViewScriptLoaded = false;

window.loadTradingViewScript = function(callback) {
    if (window.tradingViewScriptLoaded) {
        callback();
        return;
    }
    var script = document.createElement('script');
    script.src = 'https://s3.tradingview.com/tv.js';
    script.onload = function() {
        window.tradingViewScriptLoaded = true;
        callback();
    };
    document.head.appendChild(script);
}

window.getTheme = function() {
    return localStorage.getItem('theme') === 'light' ? 'light' : 'dark';
}

window.createTradingViewWidget = function(symbol) {
    var container = document.getElementById('tradingview-widget');
    if (!container) return;
    container.innerHTML = '';
    new TradingView.widget({
        "autosize": true,
        "symbol": symbol + "USD",
        "interval": "60",
        "timezone": "Etc/UTC",
        "theme": window.getTheme(),
        "style": "1",
        "locale": "en",
        "allow_symbol_change": true,
        "container_id": "tradingview-widget",
        "support_host": "https://www.tradingview.com"
    });
}
