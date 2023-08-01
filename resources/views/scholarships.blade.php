@extends('layout.app')
@section('section')
<main>
        <form action="{{ route('scholarships') }}" method="GET">
                <input type="text" name="search" placeholder="Search">
                <div>
                        <span><i></i></span>
                </div>
        </form>

        <?php foreach ($scholarships as $scholarship) : ?> 
                <article class="scholarships">
                       <h1 class="scholarships-h1"> 
                                <a href="/scholarships/<?=$scholarship->id; ?>">
                                        <?= $scholarship->name; ?>
                                </a>
                        </h1>
<!-- if the scholarship's id matches a tag id on the scholarship-tag table, print the name of the tag that it matches.-->
                        <div>
                        @foreach ($scholarship->tags as $tag)
                        <button class="pill" type="button">
                        {{$tag->name}}
                        </button>
                        @endforeach
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
