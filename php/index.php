<?php
    $title = 'Handog';
    $page = 'index';
    include_once('header.php');
?>

<!-- Hero Section Start -->

<div class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Magbahagi</h1>
            <p>Find communities to help, start a donation drive now or donate to one.</p>
            <button class="button" name="create" onclick="window.location.href='create.php'">Create a Drive</button> or
            <button class="button" name="donate" onclick="window.location.href='mainfeed.php'">Donate</button>
            
        </div>
    </div>
</div>

<!-- Hero Section End -->

<section id="about">

    <div class="landing">
        <h1>About Handog</h1>
        <p>Handog is a Philippine-based fundraising platform that allows Filipinos to raise money by creating a digital donation drive that allows anyone in the world to donate. This platform aims to centralize donation drives in the country and make this act of service easier for Filipinos to initiate donation drives and donate. </p>

        <h1>Vision</h1>
        <p>To instill every Filipino with the value of BAYANIHAN. To spark the innate genorosity and hospitality of Filipinos. To allow anyone to start a change in communities small or big. </p>
    </div>

    </section>

<?php include_once('footer.php')?>