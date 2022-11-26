<nav class="navbar navbar-dark bg-dark py-0">
    <a class="navbar-brand col-8" href="#">
        <span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: rgb(255, 255, 255); background-clip: text; -webkit-background-clip: text;
                text-shadow: 2px 2px 5px #9c73b8; font-size: xx-large;">Attractions</span> 
    </a>
    <?php echo $this->render('attraction_filter.html',NULL,get_defined_vars(),0); ?>
    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
        <li>
            <a href="#" class="nav-link text-secondary">
            Home
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-secondary">
            Contact
            </a>
        </li>
    </ul>
</nav>