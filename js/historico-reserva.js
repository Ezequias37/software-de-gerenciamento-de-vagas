document.querySelectorAll('.grid-container2').forEach(item => {
    item.addEventListener('click', () => {
        const url = item.getAttribute('data-url');
        if (url) {
            window.location.href = url;
        }
    });
});
