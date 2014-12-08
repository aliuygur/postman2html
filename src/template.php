<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Documentation</title>

    <!-- Css -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css"/>
    <style>
        #affix-nav .nav li:not(.active) .nav {
            display: none;
        }

        pre {
            border: inherit;
            border-radius: inherit;
            background-color: inherit;
            padding: inherit;
        }
    </style>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/monokai.min.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Prefetch DNS -->
    <link rel="dns-prefetch" href="cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="fonts.googleapis.com">
</head>
<body data-spy="scroll" data-target="#affix-nav">
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <nav id="affix-nav" data-spy="affix" data-offset-top="10">
                <h4 class="text-info">Endpoints</h4>
                <ul class="nav">
                    <?php foreach ($collection->folders() as $folder): ?>
                        <li>
                            <a href="#<?= $folder->id ?>"><?= $folder->name ?></a>
                            <ul class="nav">
                                <?php foreach ($folder->requests() as $request): ?>
                                    <li>
                                        <a href="#<?= $request->id ?>"><kbd><?= $request->method ?></kbd> <?= $request->name ?>
                                        </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>
        </div>
        <div class="col-sm-9">
            <?= $collection->markdown('description'); ?>

            <?php foreach ($collection->folders() as $folder): ?>
                <div>
                    <h3 class="page-header" id="<?= $folder->id ?>"><?= $folder->name ?></h3>
                    <?= $folder->markdown('description') ?>

                    <?php foreach ($folder->requests() as $request): ?>
                        <h4 id="<?= $request->id() ?>" class="page-header">
                            <kbd><?= $request->method() ?></kbd> <?= $request->name() ?>
                            <small><?= $request->url() ?></small>
                        </h4>
                        <?= $request->markdown('description') ?>
                        <pre><code class="http"><?= $request->rawRequest() ?></code></pre>
                    <?php endforeach; ?>
                </div>
            <?php endforeach ?>
        </div>
        <hr/>
    </div>
</div>

<!-- JS -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/languages/http.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>