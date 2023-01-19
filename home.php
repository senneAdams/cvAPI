<?php

require_once 'classes/oAuth.php';
require_once 'classes/data.php';

$oAuth = new OAuth();
$oAuth->checkSessionCode();

$data   = new Data();
$cvData = $data->getData();

?>
<html>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

    <title><?php
        echo $cvData['profile']['profileName'] ?> | <?php
        echo $cvData['profile']['profileSubTitle'] ?> | senneadams.nl</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <link rel="stylesheet" type="text/css"
          href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/resume.css" media="all"/>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
</head>
<body>

<div id="doc2" class="yui-t7">
    <div id="inner">

        <div id="hd">
            <div class="yui-gc">
                <div class="yui-u first">
                    <h1><?php
                        echo $cvData['profile']['profileName'] ?></h1>
                    <h2><?php
                        echo $cvData['profile']['profileSubTitle'] ?></h2>
                </div>

                <div class="yui-u">
                    <div class="contact-info">
                        <h3><a href="mailto:name@yourdomain.com">sennedams.nl</a></h3>
                        <h3>06-11674946</h3>
                    </div><!--// .contact-info -->
                </div>
            </div><!--// .yui-gc -->
        </div><!--// hd -->

        <div id="bd">
            <div id="yui-main">
                <div class="yui-b">

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Profiel</h2>
                        </div>
                        <div class="yui-u">
                            <p class="enlarge">
                                <?php
                                echo $cvData['profile']['profileDescr'] ?>
                            </p>
                        </div>
                    </div><!--// .yui-gf -->

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Skills</h2>
                        </div>
                        <div class="yui-u">

                            <div class="talent">
                                <h2><?php
                                    echo $cvData['technical'][0]['technicalTitle'] ?></h2>
                                <p><?php
                                    echo $cvData['technical'][0]['technicalDescr'] ?> </p>
                            </div>

                            <div class="talent">
                                <h2><?php
                                    echo $cvData['technical'][1]['technicalTitle'] ?></h2>
                                <p><?php
                                    echo $cvData['technical'][1]['technicalDescr'] ?></p>
                            </div>

                            <div class="talent">
                                <h2><?php
                                    echo $cvData['technical'][2]['technicalTitle'] ?></h2>
                                <p><?php
                                    echo $cvData['technical'][2]['technicalDescr'] ?></p>
                            </div>
                        </div>
                    </div><!--// .yui-gf -->

                    <div class="yui-gf">
                        <div class="yui-u first">
                            <h2>Talen</h2>
                        </div>
                        <div class="yui-u">
                            <ul class="talent">
                                <li><?php
                                    echo $cvData['skills'][0]['skillDescr'] ?></li>
                                <li><?php
                                    echo $cvData['skills'][1]['skillDescr'] ?></li>
                                <li class="last"><?php
                                    echo $cvData['skills'][2]['skillDescr'] ?></li>
                            </ul>

                            <ul class="talent">
                                <li><?php
                                    echo $cvData['skills'][3]['skillDescr'] ?></li>
                                <li><?php
                                    echo $cvData['skills'][4]['skillDescr'] ?></li>
                                <li class="last"><?php
                                    echo $cvData['skills'][5]['skillDescr'] ?></li>
                            </ul>

                            <ul class="talent">
                                <li><?php
                                    echo $cvData['skills'][6]['skillDescr'] ?></li>
                                <li>x</li>
                                <li class="last">x</li>
                            </ul>
                        </div>
                    </div><!--// .yui-gf-->

                    <div class="yui-gf">

                        <div class="yui-u first">
                            <h2>Ervaring</h2>
                        </div><!--// .yui-u -->

                        <div class="yui-u">

                            <div class="job">
                                <h2><?php
                                    echo $cvData['experience'][2]['experienceName'] ?></h2>
                                <h3><?php
                                    echo $cvData['experience'][2]['experienceTitle'] ?></h3>
                                <h4><?php
                                    echo $cvData['experience'][2]['dateFromTo'] ?></h4>
                                <p><?php
                                    echo $cvData['experience'][2]['experienceDescr'] ?></p>
                            </div>

                            <div class="job">
                                <h2><?php
                                    echo $cvData['experience'][1]['experienceName'] ?></h2>
                                <h3><?php
                                    echo $cvData['experience'][1]['experienceTitle'] ?></h3>
                                <h4><?php
                                    echo $cvData['experience'][1]['dateFromTo'] ?></h4>
                                <p><?php
                                    echo $cvData['experience'][1]['experienceDescr'] ?></p>
                            </div>

                            <div class="job">
                                <h2><?php
                                    echo $cvData['experience'][0]['experienceName'] ?></h2>
                                <h3><?php
                                    echo $cvData['experience'][0]['experienceTitle'] ?></h3>
                                <h4><?php
                                    echo $cvData['experience'][0]['dateFromTo'] ?></h4>
                                <p><?php
                                    echo $cvData['experience'][0]['experienceDescr'] ?></p>
                            </div>

                        </div><!--// .yui-u -->
                    </div><!--// .yui-gf -->


                    <div class="yui-gf last">
                        <div class="yui-u first">
                            <h2>Educatie</h2>
                        </div>
                        <div class="yui-u">
                            <h2><?php
                                echo $cvData['education'][3]['educationTitle'] ?></h2>
                            <h3><?php
                                echo $cvData['education'][3]['educationSchool'] ?> &mdash; <strong><?php
                                    echo $cvData['education'][3]['dateFromTo'] ?></strong></h3>
                        </div>
                        <div class="yui-u">
                            <h2><?php
                                echo $cvData['education'][2]['educationTitle'] ?></h2>
                            <h3><?php
                                echo $cvData['education'][2]['educationSchool'] ?> &mdash; <strong><?php
                                    echo $cvData['education'][2]['dateFromTo'] ?></strong></h3>
                        </div>
                        <div class="yui-u">
                            <h2><?php
                                echo $cvData['education'][1]['educationTitle'] ?></h2>
                            <h3><?php
                                echo $cvData['education'][1]['educationSchool'] ?> &mdash; <strong><?php
                                    echo $cvData['education'][1]['dateFromTo'] ?></strong></h3>
                        </div>
                        <div class="yui-u">
                            <h2><?php
                                echo $cvData['education'][0]['educationTitle'] ?></h2>
                            <h3><?php
                                echo $cvData['education'][0]['educationSchool'] ?> &mdash; <strong><?php
                                    echo $cvData['education'][0]['dateFromTo'] ?></strong></h3>
                        </div>
                    </div><!--// .yui-gf -->


                </div><!--// .yui-b -->
            </div><!--// yui-main -->
        </div><!--// bd -->


    </div><!-- // inner -->


</div><!--// doc -->
</body>
<script>
console.log(<?php echo json_encode($cvData)  ?>)
</script>
</html>
