if ($('ol.breadcrumb')) {
    var here = location.href.replace(/(\?.*)$/, '').split('/').slice(3);

    var parts = [{
        "text": 'Home',
        "link": '/'
    }];

    for (var j = 2; j < here.length; j++) {
        var part = here[j];
        var pageName = part.toLowerCase();
        pageName = part.charAt(0).toUpperCase() + part.slice(1);
        var link = '/' + here.slice(0, j + 1).join('/');
        $('ol.breadcrumb').append('<li><a href="' + link + '">' + pageName.replace(/\.(htm[l]?|asp[x]?|php|jsp)$/, '') + '</a></li>');
        parts.push({
            "text": pageName,
            "link": link
        });
    }
}