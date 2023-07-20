<!doctype html>

<title>Scholarships</title>
<link rel="stylesheet" href="/app.css">

<body>
        <article>
                <h1><?= $scholarship->name; ?></h1>

                <div>
                        <?= $scholarship->deadline; ?>
                </div>
        </article>

        <a href="/">Go Back</a>
</body>