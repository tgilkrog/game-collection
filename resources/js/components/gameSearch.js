export default function gameSearch() {
    const input = document.getElementById('game-search');
    const results = document.getElementById('search-results');

    let hasResults = false; // track if we have results

    input.addEventListener('input', function() {
        const query = this.value;

        if (query.length < 2) {
            results.innerHTML = '';
            results.style.display = "none";
            hasResults = false;
            return;
        }

        fetch(`/games/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                results.innerHTML = '';

                if (data.length === 0) {
                    results.style.display = "none";
                    hasResults = false;
                    return;
                }

                data.forEach(game => {
                    const li = document.createElement('li');
                    li.innerHTML = `<a href="/games/${game.id}"><img src="${game.cover_image}"></a>`;
                    results.appendChild(li);
                });

                results.style.display = "flex";
                hasResults = true;
            });
    });

    // ✅ Show results again when focusing input (if results exist)
    input.addEventListener('focus', function() {
        if (hasResults) {
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