<div class="navbar navbar-default navbar-fixed-top" role="navigation">

    <?php
    require_once("banner.php");
    $menu='[{"Label":"My Appointments", "URL":"Appointment", "Service":"", "access":2, "menu":""},
    {"Label":"New Appointment", "URL":"Dashboard", "Service":"", "access":2, "menu":""},
    {"Label":"History", "URL":"Appointment/History", "Service":"", "access":2, "menu":""},
    {"Label":"Survey", "URL":"Survey", "Service":"", "access":2, "menu":""}
    ] ';
    $BEACONAccess='';
    $array_BEACONAccess = explode("|", $BEACONAccess);

    $mynav= json_decode($menu, true);
    //echo json_encode($mynav);

    ?>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo CTR_URL;?>Main/Logout">Logout <i class="entypo-logout"></i></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <?php
                foreach ($mynav as $key => $value)
                {
                    if($value["Service"]!='')
                    {
                        if(in_array($value["Service"], $array_BEACONAccess))
                        {
                            $access=$value["access"];
                        }
                        else
                            $access='0';
                    }
                    else
                    {
                        $access=$value["access"];
                    }

                    if($access!='0') {
                        ?>

                        <li class="dropdown-submenu-top">
                            <a <?php if($value["URL"]!=''){?>onclick="LoadContent('<?php echo $value["URL"] ?>')"<?php }?> class="dropdown-toggle"
                               data-toggle="dropdown"><?php echo $value["Label"] ?><?
                                if ($value["menu"] != '') {
                                    ?><b class="caret"></b><?
                                } ?></a>

                            <?
                            if ($value["menu"] != '') {
                                ?>
                                <ul class="dropdown-menu multi-level">
                                    <?php
                                    foreach ($value["menu"] as $key => $value1)
                                    {
                                        if($value1["Service"]!='')
                                        {
                                            if(in_array($value1["Service"], $array_BEACONAccess))
                                            {
                                                $access1=$value1["access"];
                                            }
                                            else
                                                $access1='0';
                                        }
                                        else
                                        {
                                            $access1=$value1["access"];
                                        }

                                        if($access1!='0') {
                                            ?>
                                            <li <?
                                                if ($value1["menu"] != ''){
                                                ?>class="dropdown-submenu"<?
                                            } ?>>
                                                <a <?php if($value1["URL"]!=''){?>onclick="LoadContent('<?php echo $value1["URL"] ?>')"<?php }?> <?
                                                if ($value1["menu"] != ''){
                                                ?>class="dropdown-toggle" data-toggle="dropdown"<?
                                                } ?>><?php echo $value1["Label"] ?></a>

                                                <?
                                                if ($value1["menu"] != '') {
                                                    ?>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        foreach ($value1["menu"] as $key => $value2)
                                                        {
                                                            if($value2["Service"]!='')
                                                            {
                                                                if(in_array($value2["Service"], $array_BEACONAccess))
                                                                {
                                                                    $access2=$value2["access"];
                                                                }
                                                                else
                                                                    $access2='0';
                                                            }
                                                            else
                                                            {
                                                                $access2=$value2["access"];
                                                            }

                                                            if($access2!='0') {
                                                                ?>
                                                                <li <?
                                                                    if ($value2["menu"] != ''){
                                                                    ?>class="dropdown-submenu"<?
                                                                } ?>>
                                                                    <a <?php if($value2["URL"]!=''){?>onclick="LoadContent('<?php echo $value2["URL"] ?>')"<?php }?> <?
                                                                    if ($value2["menu"] != ''){
                                                                    ?>class="dropdown-toggle" data-toggle="dropdown"<?
                                                                    } ?>><?php echo $value2["Label"] ?></a>

                                                                    <?
                                                                    if ($value2["menu"] != '') {
                                                                        ?>
                                                                        <ul class="dropdown-menu">
                                                                            <?php
                                                                            foreach ($value2["menu"] as $key => $value3)
                                                                            {
                                                                                if($value3["Service"]!='')
                                                                                {
                                                                                    if(in_array($value3["Service"], $array_BEACONAccess))
                                                                                    {
                                                                                        $access3=$value3["access"];
                                                                                    }
                                                                                    else
                                                                                        $access3='0';
                                                                                }
                                                                                else
                                                                                {
                                                                                    $access3=$value3["access"];
                                                                                }

                                                                                if($access3!='0') {
                                                                                    ?>
                                                                                    <li <?
                                                                                        if ($value3["menu"] != ''){
                                                                                        ?>class="dropdown-submenu"<?
                                                                                    } ?>>
                                                                                        <a <?php if($value3["URL"]!=''){?>onclick="LoadContent('<?php echo $value3["URL"] ?>')"<?php }?>
                                                                                           <?
                                                                                           if ($value3["menu"] != ''){
                                                                                           ?>class="dropdown-toggle"
                                                                                           data-toggle="dropdown"<?
                                                                                        } ?>><?php echo $value3["Label"] ?></a>

                                                                                        <?
                                                                                        if ($value3["menu"] != '') {
                                                                                            ?>
                                                                                            <ul class="dropdown-menu">
                                                                                                <?php
                                                                                                foreach ($value3["menu"] as $key => $value4)
                                                                                                {
                                                                                                    if($value4["Service"]!='')
                                                                                                    {
                                                                                                        if(in_array($value4["Service"], $array_BEACONAccess))
                                                                                                        {
                                                                                                            $access4=$value4["access"];
                                                                                                        }
                                                                                                        else
                                                                                                            $access4='0';
                                                                                                    }
                                                                                                    else
                                                                                                    {
                                                                                                        $access4=$value4["access"];
                                                                                                    }

                                                                                                    if($access4!='0') {
                                                                                                        ?>
                                                                                                        <li <?
                                                                                                            if ($value4["menu"] != ''){
                                                                                                            ?>class="dropdown-submenu"<?
                                                                                                        } ?>>
                                                                                                            <a <?php if($value4["URL"]!=''){?>onclick="LoadContent('<?php echo $value4["URL"] ?>')"<?php }?>
                                                                                                               <?
                                                                                                               if ($value4["menu"] != ''){
                                                                                                               ?>class="dropdown-toggle"
                                                                                                               data-toggle="dropdown"<?
                                                                                                            } ?>><?php echo $value4["Label"] ?></a>

                                                                                                            <?
                                                                                                            if ($value4["menu"] != '') {
                                                                                                                ?>
                                                                                                                <ul class="dropdown-menu">
                                                                                                                    <?php
                                                                                                                    foreach ($value4["menu"] as $key => $value5)
                                                                                                                    {
                                                                                                                        if($value5["Service"]!='')
                                                                                                                        {
                                                                                                                            if(in_array($value5["Service"], $array_BEACONAccess))
                                                                                                                            {
                                                                                                                                $access5=$value5["access"];
                                                                                                                            }
                                                                                                                            else
                                                                                                                                $access5='0';
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            $access5=$value5["access"];
                                                                                                                        }

                                                                                                                        if($access5!='0') {
                                                                                                                            ?>
                                                                                                                            <li <?
                                                                                                                                if ($value5["menu"] != ''){
                                                                                                                                ?>class="dropdown-submenu"<?
                                                                                                                            } ?>>
                                                                                                                                <a <?php if($value5["URL"]!=''){?>onclick="LoadContent('<?php echo $value5["URL"] ?>')"<?php }?>
                                                                                                                                   <?
                                                                                                                                   if ($value5["menu"] != ''){
                                                                                                                                   ?>class="dropdown-toggle"
                                                                                                                                   data-toggle="dropdown"<?
                                                                                                                                } ?>><?php echo $value5["Label"] ?></a>

                                                                                                                                <?
                                                                                                                                if ($value5["menu"] != '') {
                                                                                                                                    ?>
                                                                                                                                    <ul class="dropdown-menu">
                                                                                                                                        <?php
                                                                                                                                        foreach ($value5["menu"] as $key => $value6) {
                                                                                                                                            if($value6["Service"]!='')
                                                                                                                                            {
                                                                                                                                                if(in_array($value6["Service"], $array_BEACONAccess))
                                                                                                                                                {
                                                                                                                                                    $access6=$value6["access"];
                                                                                                                                                }
                                                                                                                                                else
                                                                                                                                                    $access6='0';
                                                                                                                                            }
                                                                                                                                            else
                                                                                                                                            {
                                                                                                                                                $access6=$value6["access"];
                                                                                                                                            }

                                                                                                                                            if($access6!='0') {
                                                                                                                                                ?>
                                                                                                                                                <li <?
                                                                                                                                                    if ($value6["menu"] != ''){
                                                                                                                                                    ?>class="dropdown-submenu"<?
                                                                                                                                                } ?>>
                                                                                                                                                    <a <?php if($value6["URL"]!=''){?>onclick="LoadContent('<?php echo $value6["URL"] ?>')"<?php }?>
                                                                                                                                                       <?
                                                                                                                                                       if ($value6["menu"] != ''){
                                                                                                                                                       ?>class="dropdown-toggle"
                                                                                                                                                       data-toggle="dropdown"<?
                                                                                                                                                    } ?>><?php echo $value6["Label"] ?></a>

                                                                                                                                                </li>
                                                                                                                                                <li class="divider"></li>
                                                                                                                                                <?php
                                                                                                                                            }//if from access
                                                                                                                                        }//for
                                                                                                                                        ?>
                                                                                                                                    </ul>
                                                                                                                                    <?php
                                                                                                                                }//if
                                                                                                                                ?>
                                                                                                                            </li>
                                                                                                                            <?php if ($value5 != end($value4["menu"])) { ?>
                                                                                                                                <li class="divider"></li><?php
                                                                                                                            } ?>
                                                                                                                            <?php
                                                                                                                        }//if from access
                                                                                                                    }//for
                                                                                                                    ?>
                                                                                                                </ul>
                                                                                                                <?php
                                                                                                            }//if
                                                                                                            ?>
                                                                                                        </li>
                                                                                                        <?php if ($value4 != end($value3["menu"])) { ?>
                                                                                                            <li class="divider"></li><?php
                                                                                                        } ?>
                                                                                                <?php
                                                                                                    }//if from access
                                                                                                }//for
                                                                                                ?>
                                                                                            </ul>
                                                                                        <?php
                                                                                        }//if
                                                                                        ?>
                                                                                    </li>
                                                                                    <?php if ($value3 != end($value2["menu"])) { ?>
                                                                                        <li class="divider"></li><?php
                                                                                    } ?>
                                                                            <?php
                                                                                }//if from access
                                                                            }//for
                                                                            ?>
                                                                        </ul>
                                                                    <?php
                                                                    }//if
                                                                    ?>
                                                                </li>
                                                                <?php if ($value2 != end($value1["menu"])) { ?>
                                                                    <li class="divider"></li><?php
                                                                } ?>
                                                        <?php
                                                            }//if from access
                                                        }//for
                                                        ?>
                                                    </ul>
                                                <?php
                                                }//if
                                                ?>
                                            </li>
                                            <?php if ($value1 != end($value["menu"])) { ?>
                                                <li class="divider"></li><?php
                                            } ?>
                                    <?php
                                        }//if from access
                                    }//for
                                    ?>
                                </ul>
                            <?php
                            }//if
                            ?>
                        </li>

                <?php
                    }//if from access
                }//for
                ?>
            </ul>
        </div>
    </div>
</div>