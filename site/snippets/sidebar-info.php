<nav class="sidebar-info" style="background-color:<?= $site->sidebarcolor() ?>">
  
    Current
    <br />
    <br />
    <?php  
        forEach($current as $c){
            echo $c->title() . '<br />';
            echo $c->datestart()->toDate('Y-m-d'). '<br /> <br />';
        } 
    ?>
    <br />
    Upcoming
    <br />
    <br />
    <?php  
        forEach($upcoming as $u){
            echo $u->title() . '<br />';
            echo $u->datestart()->toDate('Y-m-d'). '<br /> <br />';
        } 
    ?>    
    <br />    
    <br />
</nav>