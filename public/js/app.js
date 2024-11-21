
document.getElementById('user-icon').addEventListener('click', function (event) {
    event.preventDefault();

    fetch('/check-auth')
        .then(response => response.json())
        .then(data => {
            if (data.isLoggedIn) {
                window.location.href = '/profile';
            } else {
                window.location.href = '/login';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});
