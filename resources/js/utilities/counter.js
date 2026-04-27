export default function counter () {
    document.querySelectorAll('.games-overview .amount').forEach(el => {
        let count = 0;
        const target = parseInt(el.dataset.amount) || 0;

        const step = Math.ceil(target / 500); // speed control

        const interval = setInterval(() => {
            count += step;

            if (count >= target) {
                el.textContent = target;
                clearInterval(interval);
            } else {
                el.textContent = count;
            }
        }, 20);
    });
}