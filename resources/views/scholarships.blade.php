@extends('layout.app')
@section('section')
<main>
        <!-- display the search bar -->
        <form action="{{ route('scholarships') }}" method="GET">
                <div class="boxContainer">
                        <table class="elementsContainer">
                                <tr>
                                        <td class="td1">
                                                <input type="text" name="search" placeholder="Search Scholarships" value = "{{ request()->query('search') }}">
                                        </td>
                                        <td class="td2">
                                                <div class="material-icons">
                                                        search
                                                </div>
                                        </td>
                                </tr>
                        </table>
                </div>
        </form>
        <!-- display the tags filter -->
        <!-- tags list -->
        <form action="" method="GET">

<div class="container">       
        <div class="select-btn">
                <span class="btn-text">Filter by Tag</span>
                <span class="arrow-dwn">
                        <i class="fa-solid fa-chevron-down"></i>
                </span>
        </div>
        <div class = "card-body">
                <h6>Tags List</h6>
                <?php 
                        session_start();
                        $con = mysqli_connect("localhost", "root", "", "scholarships");
                        $tags_query = "SELECT * FROM tags";
                        $tags_query_run = mysqli_query($con, $tags_query);

                        // when the form is submitted via the tag filter, store the selected tags in the session
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['tags'])) {
                                $_SESSION["selected_tags"] = $_GET['tags'];
                        }

                        // retrieve the selected tags from the session
                        $selected_tags = isset($_SESSION["selected_tags"]) ? $_SESSION["selected_tags"] : array();

                        if (mysqli_num_rows($tags_query_run) > 0) {
                                foreach($tags_query_run as $tagslist){
                                        ?>
                                        <div>
                                                <input type="checkbox" name="tags[]" value="<?= $tagslist['id'] ?>"
                                                        <?php if (in_array($tagslist['id'], $selected_tags)) echo "checked"; ?>>
                                                <?= $tagslist['name']; ?>
                                        </div>
                                        <?php
                                }
                        }
                ?>
        </div>
</div> 
<button type ="submit">Search</button>
        </form>

        <!-- deadline range filter-->
        <form method="GET" action="/filterdeadline">
        <div>
                <label>Start Deadline:</label>
                <input type="date" name="start_deadline" class="form-control">
        </div>
        <div>
                <label>End Deadline:</label>
                <input type="date" name="end_deadline" class="form-control">
        </div>
        <div>
                <button type="submit" class="btn btn-primary">Filter By Deadline</button>
        </div>
        </form>
        <!-- print a message for the user if there are no posts that match search query -->
        @forelse($scholarships as $scholarship)
        @empty
        <p class="text-center">
                No results found for query <strong>{{ request()->query('search') }}</strong>
        </p>
        @endforelse

        <!-- tags scholarships-->
        <div>
                
                <!-- create a non-repetitive array to contain the $scholarship_tags_items['scholarship_id'] values-->
                <?php $noRepArray = array();
                $articleIndex = 0; // initialize the article index counter?>
                    <?php   if(isset($_GET['tags'])){
                                $tagchecked = [];
                                $tagchecked = $_GET['tags'];
                                foreach($tagchecked as $rowtag){
                                       // echo $rowbrand;
                                       $scholarship_tags = "SELECT * FROM scholarship_tags WHERE tag_id IN ($rowtag)";
                                        $scholarship_tags_run = mysqli_query($con, $scholarship_tags);
                                        if(mysqli_num_rows($scholarship_tags_run) >= 0){
                                        foreach($scholarship_tags_run as $scholarship_tags_items):
                                                ?>

                                                <div>
                                                <!-- display every scholarship with id = $scholarship_tags_items['scholarship_id']-->
                                                <?php 
                                                        foreach ($scholarships as $scholarship) : ?> 
                                                        
                                                        <?php 
                                                        if ($scholarship_tags_items['scholarship_id'] == $scholarship->id
                                                                && !in_array($scholarship_tags_items['scholarship_id'], $noRepArray)){ 
                                                                        $noRepArray[] = $scholarship_tags_items['scholarship_id'];
                                                                        $articleIndex++; // increment the article index with each iteration
                                                                        $isFirstArticle = ($articleIndex === 1); // check if it's the first article
                                                                        ?>
                                                                <article <?php if (!$isFirstArticle) echo 'class="scholarships"'; ?>>
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
                                                     <?php   } ?>
                                                <?php endforeach; ?>
                                                      
                
                                                </div>
                                                <?php
                                        endforeach;
                                        }
                                }

                        }
                        else{
                                /*print out the scholarship and the info associated with every scholarship */
                                 foreach ($scholarships as $scholarship) : ?> 
                                        <article>
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
                   <?php }?>
        </div>
        
</main>
@endSection
