<?php

use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">
    <section id="slide-wrap">
        <div class="container">
            <?php
                echo Carousel::widget([
                    'items' => $items,
                    'controls' => [FAS::icon('caret-left'), FAS::icon('caret-right')],
                    'options' => [
                        'class' => 'slide'
                    ]
                ]); 
                // echo Carousel::widget([
                //     'items' => [
                //         // the item contains only the image
                //         '<div class="sliders">
                //             <div class="content content-left">
                //                 <h1>USDG Coin</h1>
                //                 <p>Aliquam molestie magna ut est rutrum rhoncus. Quisque sagittis ligula a eros dapibus rhoncus vel a massa. Cras ante justo, hendrerit eget gravida sed, maximus ut odio. Proin id vestibulum felis. Nam eu lobortis lacus, venenatis accumsan est. Integer et hendrerit felis. Mauris lobortis mattis velit in condimentum. Donec sit amet ullamcorper turpis. Etiam diam quam, volutpat vel commodo hendrerit, pellentesque nec arcu.</p>
                //                 <a class="btn btn-link btn-transparent" href="#">Readmore ...</a>
                //             </div>
                //             <div class="content content-right">
                //                 <img src="http://lorempixel.com/463/463/city" alt="slider-3"/>
                //             </div>
                //         </div>'
                //     ],
                //     'controls' => [FAS::icon('caret-left'), FAS::icon('caret-right')],
                //     'options' => [
                //         'class' => 'slide'
                //     ]
                // ]);
            ?>
        </div>
    </section>
    <section class="container mt">
        <div class="grid-layout">
            <div class="item-grid">
                <a href="#" class="btn btn-link btn-paper"><?=FAS::icon('file-pdf')?> White Paper WECO</a>
            </div>
            <div class="item-grid">
                <a href="#" class="btn btn-link btn-paper"><?=FAS::icon('file-pdf')?> White Paper USDG</a>
            </div>
            <div class="item-grid">
                <a href="#" class="btn btn-link btn-paper"><?=FAS::icon('file-pdf')?> Ecosystem</a>
            </div>
        </div>
    </section>
    <section class="container mt">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default color-orange">
                    <div class="panel-title text-center" id="ico-stage">
                        ICO Stage 8 will end
                    </div>
                    <div id="clockdiv">
                        <div>
                            <span class="days"></span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div style="position: relative; top: 13px">:</div>
                        <div>
                            <span class="hours"></span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div style="position: relative; top: 13px">:</div>
                        <div>
                            <span class="minutes"></span>
                            <div class="smalltext">Minutes</div>
                        </div>
                        <div style="position: relative; top: 13px">:</div>
                        <div>
                            <span class="seconds"></span>
                            <div class="smalltext">Seconds</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="heading-h4">Start</h4>
                <p>July 01, 2020 (00:00 AM GMT)</p>
                <h4 class="heading-h4">Accepted Currencies</h4>
                <p class="capitalize">ETHEREUM, BITCOIN, USDG, IDRG</p>
                <h4 class="heading-h4">Token Rate</h4>
                <p>X.XXXXXX USDG</p>
            </div>
            <div class="col-md-3">
                <h4 class="heading-h4">End</h4>
                <p>August 31, 2020 (00:00 AM GMT)</p>
                <h4 class="heading-h4">Available WeCo ICO</h4>
                <p>20,000,000 WeCo</p>
                <h4 class="heading-h4">Purchase</h4>
                <p>MIN 100 WeCo <br/>MAX 10,000 WeCo</p>
            </div>
        </div>
    </section>
    <section class="container">
        <h1 class="text-center heading-front"><?=$main->title?></h1>
        <?=$main->content?>
    </section>
    <section class="container text-center">
        <h2 class="text-center capitalize">Our Partners</h2>
        <img class="partners" src="/images/bitcoin.svg" alt="Bitcoin" />
        <img class="partners" src="/images/bitwyre.svg" alt="Bitwyre" />
        <img class="partners" src="/images/ethereum.svg" alt="Ethereum" />
    </section>
</div>

<?php 

$script = <<<JS
function getTimeRemaining(endtime) {
  const total = Date.parse(endtime) - Date.parse(new Date());
  const seconds = Math.floor((total / 1000) % 60);
  const minutes = Math.floor((total / 1000 / 60) % 60);
  const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
  const days = Math.floor(total / (1000 * 60 * 60 * 24));
  
  return {
    total,
    days,
    hours,
    minutes,
    seconds
  };
}

function initializeClock(id, endtime) {
  const clock = document.getElementById(id);
  const daysSpan = clock.querySelector('.days');
  const hoursSpan = clock.querySelector('.hours');
  const minutesSpan = clock.querySelector('.minutes');
  const secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    const t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  const timeinterval = setInterval(updateClock, 1000);
}

const deadline = new Date(Date.parse(new Date()) + {$deadline} * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
JS;

$this->registerJs($script);

?>