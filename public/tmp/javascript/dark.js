if (localStorage.getItem('theme') == 'dark') {
    dark_mode(true)
}

function dark_mode(isDark) {
    if (isDark) {
        $('#bootstrap-style').attr("href", "http://localhost:8000/tmp/assets/css/bootstrap-dark.min.css")
        $('#app-style').attr("href", "http://localhost:8000/tmp/assets/css/app-dark.min.css")


        document.getElementById('btn-dark-mode').innerHTML = `<button class="btn btn-sm-success" onclick="dark_mode(false)"><i class="fas fa-sun"></i></button>`

        localStorage.setItem('theme', 'dark')
    } else {
        document.getElementById('dark').innerHTML = `<link href="http://localhost:8000/tmp/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="http://localhost:8000/tmp/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">`

        document.getElementById('btn-dark-mode').innerHTML = `<button class="btn btn-sm-success" onclick="dark_mode(true)"><i class="fas fa-moon"></i></button>`
        localStorage.removeItem('theme')
    }
}
