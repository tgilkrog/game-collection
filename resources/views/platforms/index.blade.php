<x-layout>
    <ul class="platform_list">
        <li class="PS1">
            <a href="{{ url('/platforms/1') }}">
                <img src="images/playstation1.jpg">
                <p>Playstation 1</p>
                <p class="amount">{{ isset($platformTotals['PS1']) ? $platformTotals['PS1'] : 0  }}</p>
            </a>
        </li>
        <li class="PS2">
            <a href="{{ url('/platforms/2') }}">
                <img src="images/playstation2.jpg">
                <p>Playstation 2</p>
                <p class="amount">{{ isset($platformTotals['PS2']) ? $platformTotals['PS2'] : 0  }}</p>
            </a>
        </li>
        <li class="PS5">
            <a href="{{ url('/platforms/5') }}">
                <img src="images/playstation5.jpg">
                <p>Playstation 5</p>
                <p class="amount">{{ isset($platformTotals['PS5']) ? $platformTotals['PS5'] : 0  }}</p>
            </a>
        </li>
        <li class="PS3">
            <a href="{{ url('/platforms/3') }}">
                <img src="images/playstation3.jpg">
                <p>Playstation 3</p>
                <p class="amount">{{ isset($platformTotals['PS3']) ? $platformTotals['PS3'] : 0  }}</p>
            </a>
        </li>
        <li class="PS4">
            <a href="{{ url('/platforms/4') }}">
                <img src="images/playstation4.jpg">
                <p>Playstation 4</p>
                <p class="amount">{{ isset($platformTotals['PS4']) ? $platformTotals['PS4'] : 0  }}</p>
            </a>
        </li>
    </ul>
</x-layout>