document.querySelectorAll('.btn-hide-article').forEach(button => {
    button.addEventListener('click', function() {
        const article = this.closest('.articles').querySelector('.text');
        const icon = this.querySelector('i');  //

        if (article) {
            if (article.style.display === 'none') {
                article.style.display = ''; //
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                article.style.display = 'none';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    });
});
