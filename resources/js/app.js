import './bootstrap';
import gameSearch from './components/gameSearch';
import loginPopup from './components/loginPopup';
import gameCopy from './components/gameCopy';
import menu from './components/menu';
import counter from './utilities/counter';

document.addEventListener('DOMContentLoaded', () => {
    gameSearch();
    loginPopup();
    gameCopy();
    menu();

    // Utils
    counter();
});

document.querySelectorAll('.genre-filter input').forEach(input => {
    input.addEventListener('change', () => {
        input.closest('form').submit();
    });
});


const params = new URLSearchParams(window.location.search);
if (params) {
    const id = params.get('id');
    const name = params.get('name');

    if (id && name) {
        document.getElementById('game-search1').value = name;
        document.getElementById('game-id').value = id;
    }

    
}
