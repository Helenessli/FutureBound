@extends('layout.app')
@section('section')
<main>
        <article>
                <h1><?= $scholarship->name; ?></h1>

                <div>
                        Amount: <?=$scholarship->amount; ?>
                </div>
                <div>
                        Deadline: <?=$scholarship->deadline; ?>
                </div>
                <div>
                        Criteria: <?=$scholarship->criteria; ?>
                </div>
        </article>
        <br>
        <a href="<?=$scholarship->url; ?>">
                <button>Official Page</button>
        </a>
        <br>
</main>
@endSection