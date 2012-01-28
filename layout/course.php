<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}
if ($hasnavbar) {
    $bodyclasses[] = 'hasnavbar';
}
if (!empty($PAGE->theme->settings->topbar)) {
    $topbar = $PAGE->theme->settings-> topbar;
} else {
    $topbar = '<!-- There was no custom topbar set -->';
}
if (!empty($PAGE->theme->settings->footnote)) {
    $footnote = $PAGE->theme->settings->footnote;
} else {
    $footnote = '<!-- There was no custom footnote set -->';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
	<link href='http://fonts.googleapis.com/css?family= Droid+Sans' rel='stylesheet' type='text/css'>
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="topbar"><div id="topbar-wrapper"><div class="time"><?php print strftime('%A, %d %B %G');?></div><?php echo $topbar; ?></div></div>
<div id="page">
<?php if ($hasheading || $hasnavbar) { ?>
    <div id="page-header">
        <div class="headermenu">
		<?php if ($hascustommenu) { ?>
 			<div id="custommenu"><?php echo $custommenu; ?></div>
		<?php } ?>
		<?php
            echo $OUTPUT->login_info();
            if (!empty($PAGE->layout_options['langmenu'])) {
                echo $OUTPUT->lang_menu();
            }
            echo $PAGE->headingmenu
        ?></div><?php } ?>


        <div class="logo"></div>

        <div class="navbar clearfix">
    	    <?php if ($hasnavbar) { ?>
    	    <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
            <div class="navbutton"> <?php echo $PAGE->button; ?></div>
            <?php } ?>
      </div>
    </div>

<!-- END OF HEADER -->

     <div id="page-content-wrapper" class="wrapper clearfix">
            <div id="page-content">
                <div id="region-main-box">
                    <div id="region-post-box">

                        <div id="region-main-wrap">
                            <div id="region-main">
                                <div class="region-content">
									<h2 id="pageheading"><?php echo $PAGE->heading ?></h1>
                                    <?php echo $OUTPUT->main_content() ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($hassidepost) { ?>
                        <div id="region-post" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="myclear"></div>

        </div>

<!-- START OF FOOTER -->
    <?php if ($hasfooter) { ?>	
	
</div>
	<div id="footnote"><div id="topbar-wrapper"><?php echo $footnote; ?></div></div>

    <?php } ?>
  <div class="clearfix"></div>
</div>
        <?php echo $OUTPUT->standard_footer_html(); ?>


<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>