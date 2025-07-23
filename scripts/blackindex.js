const chk = document.getElementById('chk')

chk.addEventListener('change', () => {
    document.body.classList.toggle('dark')
    document.querySelector('label').classList.toggle('dark')
    document.querySelector('.ball').classList.toggle('dark')
    document.querySelector('h2').classList.toggle('dark')
    document.querySelector('h6').classList.toggle('dark')
    document.querySelector('#btn-login').classList.toggle('dark')
    document.querySelector('i').classList.toggle('dark')
    document.querySelector('#btn-pergunta').classList.toggle('dark')
    document.querySelector('#span').classList.toggle('dark')
    document.querySelector('#btnp').classList.toggle('dark')
})
