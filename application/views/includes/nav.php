<div class="navbar navbar-default navbar-fixed-top" role="navigation">

    <?php
    require_once("banner.php");
    $menu='[{"Label":"Dashboard", "URL":"Dashboard", "Service":"", "access":2, "menu":""}, {"Label":"Compliance", "URL":"", "Service":"", "access":1, "menu":[{"Label":"Company Records", "URL":"CompanyRecords", "Service":"", "access":1, "menu":""}, {"Label":"Status Tracker", "URL":"STATUS_TEST", "Service":"4", "access":1, "menu":""}, {"Label":"Annual Reports and Tax Notices", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"asdad", "URL":"asdas", "Service":"", "access":1, "menu":""}, {"Label":"Assumed Names", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Documents", "URL":"", "Service":"3", "access":1, "menu":""}, {"Label":"Documents (restricted view)", "URL":"", "Service":"3", "access":1, "menu":""}, {"Label":"Owners", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Domain Names", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"FATCA", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Leases", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Board Portal", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Licenses and Permits", "URL":"", "Service":"6", "access":1, "menu":""}, {"Label":"Membership Ledger", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Minute Books", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Old Names", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Organizational Chart", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Stock Ledger", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Registered Offices", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"SEC 16", "URL":"", "Service":"5", "access":1, "menu":""}, {"Label":"Trademark List", "URL":"", "Service":"", "access":1, "menu":""}, {"Label":"Trademark watch", "URL":"", "Service":"7", "access":1, "menu":""}]}, {"Label":"Litigation", "URL":"", "Service":"", "access":2, "menu":[{"Label":"Service of Process", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"SOP (restricted view)", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Matters", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Garnishments", "URL":"", "Service":"", "access":2, "menu":""}]}, {"Label":"My Account", "URL":"", "Service":"", "access":2, "menu":[{"Label":"Annual Report Tracking", "URL":"", "Service":"1", "access":2, "menu":""}, {"Label":"Filing Evidence", "URL":"", "Service":"2", "access":2, "menu":""}, {"Label":"Mail Delivery", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Modification Log", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Orders Placed", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Password /Security", "URL":"User/GoListUser", "Service":"", "access":2, "menu":""}, {"Label":"Pay Invoices", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Renewal Orders Placed", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Submit Feedback", "URL":"", "Service":"", "access":2, "menu":""}]}, {"Label":"Governance", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"eBilling", "URL":"", "Service":"", "access":2, "menu":[{"Label":"Payments", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Vendors", "URL":"", "Service":"", "access":2, "menu":""}]}, {"Label":"Resources", "URL":"", "Service":"", "access":2, "menu":[{"Label":"Test", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"CourtLink Case Tracking", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Domain Name Registration", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Test Resources", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"How to Start a Florida Lawn Firm", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"MarkMonitor.com", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"NAIC", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"National Insurance Producer Register", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"USPTO Trademark Search", "URL":"", "Service":"", "access":2, "menu":""}]}, {"Label":"Tools", "URL":"", "Service":"", "access":2, "menu":[{"Label":"Calendar", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"CLiC", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Company Registers List by Nation", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Renewal Filing Fees", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"Renewal Penalties", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"States Chart", "URL":"", "Service":"", "access":2, "menu":""}, {"Label":"UCC eZFILE", "URL":"", "Service":"", "access":2, "menu":""}]}, {"Label":"Dividends", "URL":"", "Service":"", "access":0, "menu":""}] ';
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
                <li><a href="<?php echo CTR_URL;?>Main/Logout"><i class="entypo-logout"></i></a></li>
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
                            <a <?php if($value["URL"]!=''){?>onclick="LoadContent('<?= $value["URL"] ?>')"<?php }?> class="dropdown-toggle"
                               data-toggle="dropdown"><?= $value["Label"] ?><?
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
                                                <a <?php if($value1["URL"]!=''){?>onclick="LoadContent('<?= $value1["URL"] ?>')"<?php }?> <?
                                                if ($value1["menu"] != ''){
                                                ?>class="dropdown-toggle" data-toggle="dropdown"<?
                                                } ?>><?= $value1["Label"] ?></a>

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
                                                                    <a <?php if($value2["URL"]!=''){?>onclick="LoadContent('<?= $value2["URL"] ?>')"<?php }?> <?
                                                                    if ($value2["menu"] != ''){
                                                                    ?>class="dropdown-toggle" data-toggle="dropdown"<?
                                                                    } ?>><?= $value2["Label"] ?></a>

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
                                                                                        <a <?php if($value3["URL"]!=''){?>onclick="LoadContent('<?= $value3["URL"] ?>')"<?php }?>
                                                                                           <?
                                                                                           if ($value3["menu"] != ''){
                                                                                           ?>class="dropdown-toggle"
                                                                                           data-toggle="dropdown"<?
                                                                                        } ?>><?= $value3["Label"] ?></a>

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
                                                                                                            <a <?php if($value4["URL"]!=''){?>onclick="LoadContent('<?= $value4["URL"] ?>')"<?php }?>
                                                                                                               <?
                                                                                                               if ($value4["menu"] != ''){
                                                                                                               ?>class="dropdown-toggle"
                                                                                                               data-toggle="dropdown"<?
                                                                                                            } ?>><?= $value4["Label"] ?></a>

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
                                                                                                                                <a <?php if($value5["URL"]!=''){?>onclick="LoadContent('<?= $value5["URL"] ?>')"<?php }?>
                                                                                                                                   <?
                                                                                                                                   if ($value5["menu"] != ''){
                                                                                                                                   ?>class="dropdown-toggle"
                                                                                                                                   data-toggle="dropdown"<?
                                                                                                                                } ?>><?= $value5["Label"] ?></a>

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
                                                                                                                                                    <a <?php if($value6["URL"]!=''){?>onclick="LoadContent('<?= $value6["URL"] ?>')"<?php }?>
                                                                                                                                                       <?
                                                                                                                                                       if ($value6["menu"] != ''){
                                                                                                                                                       ?>class="dropdown-toggle"
                                                                                                                                                       data-toggle="dropdown"<?
                                                                                                                                                    } ?>><?= $value6["Label"] ?></a>

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