<?php

require "../../lib/setting.php";

$setting = (new setting)->deleteSetting($_GET['id']);

helper::redirect("setting", 0);
