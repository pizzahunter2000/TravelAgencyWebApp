<nav class="navbar navbar-dark bg-dark py-0">
    <a class="navbar-brand" href="#">
        <span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: rgb(255, 255, 255); background-clip: text; -webkit-background-clip: text;
                text-shadow: 2px 2px 5px #9c73b8; font-size: xx-large;">Attractions</span> 
    </a>
    
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
        <li>
            <?php echo $this->render('attraction_filter.html',NULL,get_defined_vars(),0); ?>
        </li>
    </ul>
</nav>