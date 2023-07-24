@extends('layout.app')
@section('section')

<main>
    <div class="mx-auto max-w-7xl py-6 sm:pw-6 lg:px-8">
        <h1>Add a Scholarship</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <div>
                <textarea id="name" name="name"></textarea>
            </div>

            <label for="amount">Amount:</label>
            <div>
                <textarea id="amount" name="amount"></textarea>
            </div>

            <label for="criteria">Criteria:</label>
            <div>
                <textarea id="criteria" name="criteria"></textarea>
            </div>

            <label for="deadline">Deadline:</label>
            <div>
                <textarea id="deadline" name="deadline"></textarea>
            </div>

            <label for="url">URL:</label>
            <div>
                <textarea id="url" name="url"></textarea>
            </div>

            <p>
                <button type="submit">Submit</button>
            </p>
        </form>
    </div>
</main>
@endSection