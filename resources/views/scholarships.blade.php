@extends('layout.app')
@section('section')

<!-- display the search bar -->
<div class="heading2">
   <p class="tiny">Scholarships</p>
   <h2>Scholarships</h2>
   <p class="description1">Find your next scholarship through our handpicked database to fund your <span style="color: #652dcb; font-weight: 600;">high school</span> and <span style="color: #652dcb; font-weight: 600;">post-secondary</span> journey.</p>
   <form action="{{ route('scholarships') }}" method="GET">

      <!-- Search box -->
      <div class="boxContainer">
         <div class="elementsContainer">
            <div class="material-icons">
               search
            </div>
            <input type="text" name="search" placeholder="Scholarship title or keyword" value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-search">Search</button>
         </div>
      </div>


      <!-- Tags  filter -->
      <div class="allfiltercontainer">
         <div class="tagsfiltercontainer">
            <div class="container">
               <div class="select-btn">
                  <span class="btn-text">Tags</span>
                  <span class="arrow-dwn">
                     <i class="fa-solid fa-chevron-down"></i>
                  </span>
               </div>
               <ul class="list-items">
                  @foreach($tags as $tag)
                  <li class="item">
                     <input class="checkbox" type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, request('tags', [])))>
                     <span class="item-text">{{ $tag->name }} </span>
                  </li>
                  @endforeach
               </ul>

            </div>
         </div>

         <!-- deadline filter-->
         <div class="deadlinefiltercontainer">
            <div>
               <label class="deadlinelabel">Deadline:</label>
               <input class="deadlineinputs" type="date" name="start_deadline" class="form-control" value={{request('start_deadline', '')}}>
            </div>

            <div>
               <label class="deadlinelabel">to</label>
               <input class="deadlineinputs" type="date" name="end_deadline" class="form-control" value={{request('start_deadline', '')}}>
            </div>
         </div>
      </div>
   </form>
</div>
<main>

   <div>

      @forelse($scholarships as $scholarship)

      <article>
         <h1 class="scholarships-h1">
            <a href="/scholarships/{{$scholarship->id }}">
               {{ $scholarship->name }}
            </a>
         </h1>

         <div>
            @foreach ($scholarship->tags as $tag)
            <button class="pill" type="button">
               {{$tag->name}}
            </button>
            @endforeach
         </div>

         <div>
            Amount: {{$scholarship->amount}}
         </div>

         <div>
            Deadline:{{$scholarship->deadline}}
         </div>

         <br>

         <a href="/scholarships/{{$scholarship->id}}" class="btn">
            Learn More
         </a>
      </article>

      @empty
      <div>No scholarships found.</div>
      @endforelse

   </div>



   <!-- Javascript for tags filter-->
   <script src="{{ asset('script.js') }}"></script>
</main>
@endSection