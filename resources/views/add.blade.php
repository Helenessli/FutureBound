@extends('layout.app')
@section('section')

<main>
<div class="scholarship form">
    <h3>Add a Scholarship</h3><br>
    <form method="POST">
    @csrf
        <div class="formBox">
            <div class="row50">
                <div class="inputBox">
                    <span>Name</span>
                    <input id= "name" name="name" type="text" placeholder="Fullbright Scholarship" required>
                </div>
                <div class="inputBox">
                    <span>Amount</span>
                    <input id= "amount" name="amount" type="text" placeholder="$1000" required>
                </div>
            </div>

            <div class="row50">
                <div class="inputBox">
                    <span>Deadline</span>
                    <input id= "deadline" name="deadline" type="text" placeholder="Jan 1, 2023" required>
                </div>
                <div class="inputBox">
                    <span>URL</span>
                    <input id= "url" name="url" type="text" placeholder="www.fullbright.com" required>
                </div>
            </div>

            <div class="row100">
                <div class="inputBox">
                    <span>Criteria</span>
                    <textarea placeholder="Elibigility, special requirements, etc..." id="criteria" name="criteria" required></textarea>
                </div>
            </div>

            <div class="row100">
                <div class="inputBox">
                    <input type="submit" value="Submit">
                </div>
                @if(session('flash'))
                <p><strong>{{ session('flash') }}</strong></p>
                @endif
            </div>
        </div>

           
    </form>
</div>
</main>
@endSection