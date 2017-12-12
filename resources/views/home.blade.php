@extends('base')

@section('content')
<div class="grid">
    <div class="row cells2">
        <div class="cell">
            <div class="carousel square-bullets" data-role="carousel" data-direction="right">
                <div class="slide"><img src="img/1.jpg" data-role="fitImage" data-format="fill"></div>
                <div class="slide"><img src="img/2.jpg" data-role="fitImage" data-format="fill"></div>
                <div class="slide"><img src="img/3.jpg" data-role="fitImage" data-format="fill"></div>
                <div class="slide"><img src="img/5.jpg" data-role="fitImage" data-format="fill"></div>
            </div>
        </div>
        <div class="cell">
		    <div>
				<h2>Bienvenido a <strong>TOLINPEL</strong><br><small>Mejora tu vida</small></h2>
				<br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt magni, excepturi necessitatibus rem numquam officiis temporibus voluptatem odio odit ratione perferendis quos! Soluta explicabo, repellat eius. Tempore, magni, a!</p><br>
				<p>Voluptatum tempora harum fugit quo sapiente eos, blanditiis tempore dolorem incidunt doloribus odio beatae est, saepe temporibus? Ea.</p>
			</div>
        </div>
    </div>
</div>
<div class="grid">
            <div class="row cells4">
                <div class="cell">
                    <h3  style=" color: #535050; font-family:sans-serif; border-bottom: 1px solid #E2E1E1">Destacados de hoy</h3>
                </div>
            </div>  
    <div class="grid" style="background-color:#eff4f7">
        <div class="tile tile-wide-x  tile-wide-y">
            <div class="tile-content slide-up">
                <div class="slide">
                   <div><img src="img/j2.jpg" alt=""></div>
                </div>
                <div class="slide-over">
                    Celular Samsung J2 Prime DS 4G Dorado
                </div>
            </div>
        </div>
        <div class="tile tile-wide-x  tile-wide-y">
            <div class="tile-content slide-up">
                <div class="slide">
                   <div><img src="img/81J.jpg" alt=""></div>
                </div>
                <div class="slide-over">
                    HP 7 Plus G2-1331 8 GB Tablet
                </div>
            </div>
        </div>
        <div class="tile tile-wide-x  tile-wide-y">
            <div class="tile-content slide-up">
                <div class="slide">
                   <div><img src="img/LGprime.jpg" alt=""></div>
                </div>
                <div class="slide-over">
                   Buen móvil Android con procesador de 1.3Ghz Quad-Core que proporciona un buen rendimiento y una buena fluidez del sistema operativo del LG L Prime Dual TV D337.
                </div>
            </div>
        </div>
        <div class="tile tile-wide-x  tile-wide-y">
            <div class="tile-content slide-up">
                <div class="slide">
                   <div><img src="img/Motoro.jpg" alt=""></div>
                </div>
                <div class="slide-over">
                   El Motorola Moto G 4G es una versión que no difiere a la original en lo que al aspecto de la carcasa se refiere. Mantiene una tapa de plástico que repele las gotas de agua.
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection