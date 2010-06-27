<?php

$products = array(
    array(
        'title' => 'Boxy pendel',
        'data' => array(
            'Type' => 'Pendel',
            'Materiale' => 'Stål pulverlakeret',
            'Lyskilde' => 'E27 Max 40 W.',
            'Anbefalet lyskilde' => 'Osram Duluxstar Mini Twist 8W/827',
            'Design' => 'Thorbjørn Ravn Kaagaard',
        ),
        'description' => '
            <p>Boxy pendel tager udgangspunkt i
            en idé om at skabe en firkantet lampe
            hvor lysets reflektionpå sidefladerne
            giver liv og undestreger det enkle
            formsprog.</p>
            <p>Med farvefiltrene “Boxy Color Sticks”
            kan lyset på sidefladerne ændres og
            give den stemning der passer til
            humøret, lejligheden eller den øvrige
            indretning.</p>
        ',
        'productSheet' => 'boxy-pendel',
        'image' => 'boxy_pendel.png',
    ),
    array(
        'title' => 'Boxy Color Sticks',
        'data' => array(
            'Type' => 'Farve filtre til Boxy pendel',
            'Materiale' => 'Akryl',
        ),
        'description' => '
            <p>Boxy Color Sticks er farvede akrylfiltre der kan farve lyset på
            sidefladerne af Boxy Pendel lampen.</p>
            <p>Boxy Color Sticks fåes i farverne:
            Rød, Violet, Gul og Blå</p>
        ',
        'productSheet' => 'boxy-color-sticks',
        'image' => 'boxy_color_sticks.png',
    ),
    array(
        'title' => 'Point Lampeophæng',
        'data' => array(
            'Type' => ' Lampeophæng til loft',
            'Materiale' => 'Aluminum og POM',
        ),
        'description' => '
            <p>En flot lampe fortjener et flot ophæng.
            Point Lampeophæng er drejet ud af
            masivt aluminium og den blanke overflade
            giver et elegant ophæng der tager sig godt
            ud mod loftet.</p>
            <p>Point Lampeophæng monteres let med
            en skrue i loftet, hvorefter ledningen føres
            igennem og låses, inden endedækslet
            til sidst skrues på</p>
        ',
        'productSheet' => 'lampeophaeng',
        'image' => 'lampeophaeng.png',
    ),
);
?>
<div id="products">
    <?$i=0;$count=count($products)?>
    <?foreach($products as $product): ++$i?>
        <div class="product clearfix">
            <div id="columnLeft" class="column">
                <h1><?=$product['title']?></h1>
                <dl>
                <?foreach($product['data'] as $dt => $dd):?>
                    <dt><?=$dt?>:</dt><dd><?=$dd?></dd>
                <?endforeach?>
                </dl>
            </div>

            <div id="columnMiddle" class="column">
                <?=$product['description']?>
                <a href="/produkter/<?=$product['productSheet']?>" title="Læs mere" target="_blank">Læs Mere</a>
            </div>

            <div id="columnRight" class="column">
                <img src="/images/<?=$product['image']?>" title="<?=$product['title']?>" alt="<?=$product['title']?>"/>
            </div>
        </div>
        <?if($i!=$count):?>
            <hr />
        <?endif?>
    <?endforeach?>
</div>