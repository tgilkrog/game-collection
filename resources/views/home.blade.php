<div class="hero">
<x-layout>
    @php
        $ps1 = isset($platformTotals['PS1']) ? $platformTotals['PS1'] : 0;
        $ps2 = isset($platformTotals['PS2']) ? $platformTotals['PS2'] : 0;
        $ps3 = isset($platformTotals['PS3']) ? $platformTotals['PS3'] : 0;
        $ps4 = isset($platformTotals['PS4']) ? $platformTotals['PS4'] : 0;
        $ps5 = isset($platformTotals['PS5']) ? $platformTotals['PS5'] : 0;
    @endphp
    
<div class="panel">
  <div class="scan"></div>

  <div class="panel-header">COLLECTION OVERVIEW</div>

  <div class="panel-row total">
    <span>Total Games</span>
    <span class="value">6</span>
  </div>

  <div class="panel-row"><span>PS1</span><span class="value">1</span></div>
  <div class="panel-row"><span>PS2</span><span class="value">2</span></div>
  <div class="panel-row"><span>PS3</span><span class="value">2</span></div>
  <div class="panel-row"><span>PS4</span><span class="value">0</span></div>
  <div class="panel-row"><span>PS5</span><span class="value">1</span></div>
</div>
    <div style="margin-top: 400px;">
        <x-gameList :items="$newestCopies" title="Newly Added"></x-gameList>
    </div>

    <!--
    <div style="margin-top: 50px;">
        <x-gameList :items="$mostExpensiveCopies" title="Most expensive"></x-gameList>
    </div>-->
  
</x-layout>  
</div>