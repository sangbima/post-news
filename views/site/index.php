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
                    'items' => [
                        // the item contains only the image
                        '<div class="sliders"><div class="content content-left">
                            <h1>E-CryptoLAB</h1>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, alias exercitationem doloremque dolor beatae nemo itaque quaerat architecto repudiandae ipsam quidem, sint earum corporis animi aspernatur illo! Dolorem, voluptates nam.</p>
                            </div>
                            <div class="content content-right">
                                <img src="http://lorempixel.com/463/463/technics" alt="slider-1"/>
                            </div>
                        </div>',
                        '<div class="sliders">
                            <div class="content content-left">
                                <h1>WECO Coin ICO</h1>
                                <p>Aliquam vitae consectetur arcu, fringilla aliquet risus. Morbi et turpis dapibus, efficitur mi non, dapibus elit. Vivamus tempor sapien vel ullamcorper varius. Vivamus lobortis maximus velit. Pellentesque commodo felis aliquet magna lacinia, vitae consectetur turpis malesuada. Aliquam eu leo facilisis, tristique justo sed, aliquam nulla. Praesent venenatis bibendum ex, a convallis massa tempus eget. Nam euismod justo quis dolor tincidunt, ac suscipit sapien ultrices</p>
                            </div>
                            <div class="content content-right">
                                <img src="http://lorempixel.com/463/463/people" alt="slider-2"/>
                            </div>
                        </div>',
                        '<div class="sliders">
                            <div class="content content-left">
                                <h1>USDG Coin</h1>
                                <p>Aliquam molestie magna ut est rutrum rhoncus. Quisque sagittis ligula a eros dapibus rhoncus vel a massa. Cras ante justo, hendrerit eget gravida sed, maximus ut odio. Proin id vestibulum felis. Nam eu lobortis lacus, venenatis accumsan est. Integer et hendrerit felis. Mauris lobortis mattis velit in condimentum. Donec sit amet ullamcorper turpis. Etiam diam quam, volutpat vel commodo hendrerit, pellentesque nec arcu.</p>
                            </div>
                            <div class="content content-right">
                                <img src="http://lorempixel.com/463/463/city" alt="slider-3"/>
                            </div>
                        </div>'
                    ],
                    'controls' => [FAS::icon('caret-left'), FAS::icon('caret-right')],
                    'options' => [
                        'class' => 'slide'
                    ]
                ]);
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
        <h1 class="text-center heading-front">WHY Invest in WECO?</h1>
        <p>WECO is a cryptocurrency banking platform. It disrupts the traditional bank model by enabling low-cost and instant fund transfers across the globe using our native offchain technology and WECO token (WXP). 1.5 billion people worldwide don’t have both financial literacy skills, and an access to banking services, but they would like to.</p>
        <p>By purchasing WECO token (WXP) you invest in the future of global crypto and blockchain Education through WECO Crypto School. As a reward for contribution to World Education, WECO token (PXP) holders get the right to earn higher yields (15% annually) on a progressive scale on WECO Blockchain-based Bank with Checking and Savings Accounts. Furthermore, WECO token (WXP) holders are entitled to send instant payments within WECO products with lower commission as well as trade on WECO Crypto Exchange with reduced fees. Finally, WECO token (WXP) holders get an access to premium video tutorials with advanced trading strategies where we explain how to make money in the crypto market.</p>
        <p>Just one account for all the products! Join to WECO! Join the Family of Banking and Learning!</p>
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

const deadline = new Date(Date.parse(new Date()) + 30 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
JS;

$this->registerJs($script);

?>