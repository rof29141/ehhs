<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

A PHP Error was encountered

Severity:    <?php print $severity, "\n"; ?>
Message:     <?php print $message, "\n"; ?>
Filename:    <?php print $filepath, "\n"; ?>
Line Number: <?php print $line; ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach (debug_backtrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php print $error['file'], "\n"; ?>
	Line: <?php print $error['line'], "\n"; ?>
	Function: <?php print $error['function'], "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
