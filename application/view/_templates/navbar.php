<?php
/**
 * Created by Nathan Healea.
 * Project: MineDash
 * File: header.php
 * Date: 7/9/16
 * Time: 4:46 PM
 */

?>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo URL;?>home"><?php echo APP_NAME; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo URL;?>home">Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="modal" role="button"  data-target="#loginModal" aria-haspopup="true" aria-expanded="false">Login</a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
