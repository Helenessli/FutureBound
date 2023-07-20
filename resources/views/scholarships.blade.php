<!doctype html>

<title>Scholarships</title>
<link rel="stylesheet" href="/app.css">

<body>
        <?php foreach ($scholarships as $scholarship) : ?>
                <article>
                       <h1> 
                                <a href="/scholarships/<?=$scholarship->slug; ?>">
                                        <?= $scholarship->name; ?>
                                </a>
                        </h1>

                        <div>
                                <?= $scholarship->criteria; ?>
                        </div>
                </article>
        <?php endforeach; ?>


</body>