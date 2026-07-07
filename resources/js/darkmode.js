const btn = document.getElementById('darkModeBtn');

if(localStorage.getItem('darkMode') === 'enabled'){
    document.body.classList.add('dark-mode');
}

btn?.addEventListener('click', () => {

    document.body.classList.toggle('dark-mode');

    if(document.body.classList.contains('dark-mode')){
        localStorage.setItem('darkMode','enabled');
    }else{
        localStorage.setItem('darkMode','disabled');
    }

});