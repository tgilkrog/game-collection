export default function gameCopy () {
    const input = document.getElementById('game-search1');
    const results = document.getElementById('search-results1');
    const hidden = document.getElementById('game-id');

    if (!input || !results || !hidden) return;

    let timeout;

    input.addEventListener('input', () => {
        clearTimeout(timeout);

        timeout = setTimeout(async () => {
            const query = input.value;

            if (query.length < 2) {
                results.innerHTML = '';
                return;
            }

            const res = await fetch(`/games/search?query=${query}`);
            const games = await res.json();

            results.innerHTML = games.map(game => `
                <div class="result-item" data-id="${game.id}" data-title="${game.title}">
                    <img width="100" src="${game.cover_image}">
                </div>
            `).join('');
        }, 300);
    });

    results.addEventListener('click', e => {
        const item = e.target.closest('.result-item');
        if (!item) return;

        input.value = item.dataset.title;
        hidden.value = item.dataset.id;

        results.innerHTML = '';
    });


    input.addEventListener('focus', function() {
        if (results) {
            results.style.display = "block";
        }
    });

    // ✅ Hide when clicking outside
    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !results.contains(e.target)) {
            results.style.display = "none";
        }
    });
}