@extends('layout.app')
@section('section')
        <article>
                <h1><?= $scholarship->name; ?></h1>

                <div>
                        <?= $scholarship->deadline; ?>
                </div>
        </article>

        <a href="/">Go Back</a>
@endSection