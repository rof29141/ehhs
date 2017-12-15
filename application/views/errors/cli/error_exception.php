<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

An uncaught Exception was encountered

Type:        <?php print get_class($exception), "\n"; ?>
Message:     <?php print $message, "\n"; ?>
Filename:    <?php print $exception->getFile(), "\n"; ?>
Line Number: <?php print $exception->getLine(); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach ($exception->getTrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php print $error['file'], "\n"; ?>
	Line: <?php print $error['line'], "\n"; ?>
	Function: <?php print $error['function'], "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
