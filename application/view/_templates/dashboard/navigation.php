<?php
/**
 * Created by Nathan Healea.
 * Project: MineDash
 * File: navigation.php
 * Date: 7/14/16
 * Time: 9:08 AM
 */
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo URL; ?>home/index"><?php echo APP_NAME; ?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="<?php echo URL;?>home/logout">Login</a>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>dashboard/course">Courses</a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>dashboard/classroom">Classroom</a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>match/index">Match Records</a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>dashboard/section">Sections</a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>dashboard/session">Sessions</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
