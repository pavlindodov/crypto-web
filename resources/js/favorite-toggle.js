document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.favorite-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            let cryptoId = this.getAttribute('data-crypto');
            let star = document.getElementById('star-' + cryptoId);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/favorites/toggle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({crypto_id: cryptoId})
            })
            .then(response => response.json())
            .then(data => {
                if (data.isFavorite) {
                    star.setAttribute('fill', '#facc15');
                } else {
                    star.setAttribute('fill', '#d1d5db');
                }
            });
        });
    });
});
