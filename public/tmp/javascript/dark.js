if (localStorage.getItem('theme') == 'dark') {
    dark_mode(true)
}

function dark_mode(isDark) {
    console.log(app_url_)
    if (isDark) {
        $('#bootstrap-style').attr("href", `${app_url_}/tmp/assets/css/bootstrap-dark.min.css`)
        $('#app-style').attr("href", `${app_url_}/tmp/assets/css/app-dark.min.css`)


        document.getElementById('btn-dark-mode').innerHTML = `<button class="btn btn-sm-success" onclick="dark_mode(false)"><i class="fas fa-sun"></i></button>`

        localStorage.setItem('theme', 'dark')
    } else {
        $('#bootstrap-style').attr("href", `${app_url_}/tmp/assets/css/bootstrap.min.css`)
        $('#app-style').attr("href", `${app_url_}/tmp/assets/css/app.min.css`)

        document.getElementById('btn-dark-mode').innerHTML = `<button class="btn btn-sm-success" onclick="dark_mode(true)"><i class="fas fa-moon"></i></button>`
        localStorage.removeItem('theme')
    }
}
