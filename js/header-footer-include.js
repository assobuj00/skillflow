// Header Include
    fetch('header.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('header-component').innerHTML = data;
        });

    // Footer Include
    fetch('footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footer-component').innerHTML = data;
        });