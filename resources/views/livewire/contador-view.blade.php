<div>
    <div class="container">
        <h1 class="text"></h1>
        <div class="contador">
            <div class="contador-container">
                <h2 class="text"> {{ $contador->contadorA }} </h2>
                <div class="one">
                    <p class="pts"> {{$contador->contadA}} </p>
                </div>
                <div class="two">
                    <button id="minus" wire:click="decrementA(1)">-1</button>
                    <button id="plus" wire:click="incrementA(1)">+1</button>
                    <button id="pluss" wire:click="incrementA(2)">+2</button>
                </div>
            </div>
            <div class="contador-container">
                <h2 class="text"> {{ $contador->contadorB }} </h2>
                <div class="one">
                    <p class="pts"> {{$contador->contadB}} </p>
                </div>
                <div class="two">
                    <button id="minus" wire:click="decrementB(1)">-1</button>
                    <button id="plus" wire:click="incrementB(1)">+1</button>
                    <button id="pluss" wire:click="incrementB(2)">+2</button>
                </div>
            </div>
        </div>
        <button class="btn btn-primary"> <a href="{{ route('home') }}" >Ini</a></button>
        <button class="btn btn-primary"> <a href="{{ route('Contadores') }}" ><----</a></button>
    </div>
</div>
