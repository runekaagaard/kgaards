<?php
$products = array(
    array(
        'title' => 'Boxy pendel',
        'data' => array(
            'Type' => 'Pendel',
            'Materiale' => 'Stål pulverlakeret',
            'Lyskilde' => 'E27 Max 40 W.',
            'Anbefalet pære' => 'Osram Duluxstar Mini Twist 8W/827',
            'Design' => 'Thorbjørn Ravn Kaagaard',
        ),
        'description' => '
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        ',
        'productSheet' => 'produktblad_boxy_pendel.jpg',
        'image' => 'boxy_pendel.png',
    ),
);
$products[1] = $products[2] = $products[0];
?>
<div id="products">
    <?foreach($products as $product):?>
        <div class="product">
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
                <a href="/images/<?=$product['productSheet']?>" title="Læs mere" target="_blank">Læs Mere</a>
            </div>

            <div id="columnRight" class="column">
                <img src="/images/<?=$product['image']?>" title="<?=$product['title']?>" alt="<?=$product['title']?>"/>
            </div>
        </div>
    <?endforeach?>
</div>