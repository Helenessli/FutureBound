@extends('layout.app')
@section('section')


<div class="heading3">
    <p class="tiny">Add</p>
    <h2>Add a Scholarship</h2>
    <p class="description2">Submit a scholarship for it to be added to our comprehensive list.   Please note that the reviewing process might take up to <span style="color: #652dcb; font-weight: 600;">three business days</span>.</p>


    <div class="scholarship form">
        <form method="POST">
            @csrf
            <div class="formBox">
                <div class="row50">
                    <div class="inputBox">
                        <span class="addheading">Name</span>
                        <input id="name" name="name" type="text" placeholder="Fullbright Scholarship" required>
                    </div>
                    <div class="inputBox">
                        <span class="addheading">Amount</span>
                        <input id="amount" name="amount" type="text" placeholder="$1000" required>
                    </div>
                </div>

                <div class="row50">
                    <div class="inputBox">
                        <span class="addheading">Deadline</span>
                        <input id="deadline" name="deadline" type="text" placeholder="Jan 1, 2023" required>
                    </div>
                    <div class="inputBox">
                        <span class="addheading">URL</span>
                        <input id="url" name="url" type="text" placeholder="www.fullbright.com" required>
                    </div>
                </div>

                <div class="row100">
                    <div class="inputBox">
                        <span class="addheading">Criteria</span>
                        <textarea placeholder="Elibigility, special requirements, etc..." id="criteria" name="criteria" required></textarea>
                    </div>
                </div>

                <div class="row100">
                    <div>
                        <button type="submit" class="btn">Submit</button>
                    </div>
                    @if(session('flash'))
                    <p class="flash">{{ session('flash') }}</p>
                    @endif
                </div>
            </div>


        </form>
    </div>
</div>
@endSection