@extends('layout.app')
@section('section')
<main>
        <article>
                <h1 class="scholarships-h1"><?= $scholarship->name; ?></h1>
                @foreach ($scholarship->tags as $tag)
                <button class="pill" type="button">
                        {{$tag->name}}
                </button>
                @endforeach
                <div class="scholarshipinfo">
                        <div>
                                Deadline:&nbsp; <?= $scholarship->deadline; ?>
                        </div>
                        <div>
                                Amount: &nbsp;$<?= $scholarship->amount; ?>
                        </div>
                        <div>
                                Criteria:&nbsp; <?= $scholarship->criteria; ?>
                        </div>
                </div>
                <br>
                <a href="<?= $scholarship->url; ?>" class="btn">
                        Apply
                </a>
                <br>
        </article>

</main>
@endSection