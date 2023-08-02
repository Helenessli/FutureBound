@extends('layout.app')
@section('section')
<main>

        <!-- display the search bar -->
        <form action="{{ route('scholarships') }}" method="GET">
                <div class="boxContainer">
                        <table class="elementsContainer">
                                <tr>
                                        <td>
                                                <input type="text" name="search" placeholder="Search Scholarships" value = "{{ request()->query('search') }}">
                                        </td>
                                        <td>
                                                <span class="material-icons">
                                                        search
                                                </span>
                                        </td>
                                </tr>
                        </table>
                </div>
        </form>

        <!-- print a message for the user if there are no posts that match search query -->
        @forelse($scholarships as $scholarship)
        @empty
        <p class="text-center">
                No results found for query <strong>{{ request()->query('search') }}</strong>
        </p>
        @endforelse

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
