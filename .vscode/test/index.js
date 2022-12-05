const open = require('open');

// Opens the image in the default image viewer
(async () => {
    // await open("D:\\wamp64\\www\\image-charts\\chart.png", {wait: true});
    // console.log('The image viewer app closed');

    // Opens the url in the default browser
    await open('http://localhost/jpgraph/index.php?output=html');

    // Specify the app to open in
    // await open('https://sindresorhus.com', {app: 'firefox'});

    // Specify app arguments
    // await open('https://sindresorhus.com', {app: ['google chrome', '--incognito']});
})();