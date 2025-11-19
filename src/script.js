    function mostrarCampos(tipo) {
        if (tipo === 'industrial') {
            document.getElementById('campos_industrial').style.display = 'block';
            document.getElementById('campos_textil').style.display = 'none';
        } else if (tipo === 'textil') {
            document.getElementById('campos_industrial').style.display = 'none';
            document.getElementById('campos_textil').style.display = 'block';
        }
    }

    const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});