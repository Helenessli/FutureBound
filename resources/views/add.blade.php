@extends('layout.app')
@section('section')

<main>
<div class="scholarship form">
    @if(session('flash'))
    <p>{{ session('flash') }}</p>
    @endif
    <h3>Add a Scholarship</h3><br>
    <form method="POST">
    @csrf
        <div class="formBox">
            <div class="row50">
                <div class="inputBox">
                    <span>Name</span>
                    <input id= "name" name="name" type="text" placeholder="Fullbright Scholarship">
                </div>
                <div class="inputBox">
                    <span>Amount</span>
                    <input id= "amount" name="amount" type="text" placeholder="$1000">
                </div>
            </div>

            <div class="row50">
                <div class="inputBox">
                    <span>Deadline</span>
                    <input id= "deadline" name="deadline" type="text" placeholder="Jan 1, 2023">
                </div>
                <div class="inputBox">
                    <span>URL</span>
                    <input id= "url" name="url" type="text" placeholder="www.fullbright.com">
                </div>
            </div>

            <div class="row100">
                <div class="inputBox">
                    <span>Criteria</span>
                    <textarea placeholder="Elibigility, special requirements, etc..." id="criteria" name="criteria"></textarea>
                </div>
            </div>

            <div class="row100">
                <div class="inputBox">
                    <input type="submit" value="Send">
                </div>
            </div>
        </div>

           
    </form>
</div>
</main>
@endSection