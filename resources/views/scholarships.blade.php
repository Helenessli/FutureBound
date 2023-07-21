@extends('layout.app')
@section('section')
        <?php foreach ($scholarships as $scholarship) : ?> 
                <article>
                       <h1> 
                                <a href="/scholarships/<?=$scholarship->id; ?>">
                                        <?= $scholarship->name; ?>
                                </a>
                        </h1>
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
        <?php endforeach; ?>
@endSection
