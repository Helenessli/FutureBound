@extends('layout.app')
@section('section')
<main>
        <?php foreach ($scholarships as $scholarship) : ?> 
                <article class="scholarships">
                       <h1 class="scholarships-h1"> 
                                <a href="/scholarships/<?=$scholarship->id; ?>">
                                        <?= $scholarship->name; ?>
                                </a>
                        </h1>
                        <div>
<!-- if the scholarship's id matches a tag id on the scholarship-tag table, print the name of the tag that it matches.-->
                        </div>
                        <div>
                                Amount: <?=$scholarship->amount; ?>
                        </div>
                        <div>
                                Deadline: <?=$scholarship->deadline; ?>
                        </div>
                        <div>
                                Criteria: <?=$scholarship->criteria; ?>
                        </div>
                        <br><a href="/scholarships/<?=$scholarship->id; ?>" class="btn">
                        Learn More
                        </a>
                </article>
        <?php endforeach; ?>
</main>
@endSection
