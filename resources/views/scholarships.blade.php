@extends('layout.app')
@section('section')

<div class="heading2">
   <p class="tiny">Scholarships</p>
   <h2>Scholarships</h2>
   <p class="description1">Find your next scholarship through our handpicked database designed for <span style="color: #652dcb; font-weight: 600;">high school</span> students in <span style="color: #652dcb; font-weight: 600;">Canada</span>.</p>
   <form action="{{ route('scholarships') }}" method="GET">

      <!-- Search box -->
      <div class="boxContainer">
         <div class="elementsContainer">
            <div class="material-icons">
               search
            </div>
            <input type="text" name="search" placeholder="Scholarship name or keyword" value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-search">Search</button>
         </div>
      </div>


      <!-- Tags  filter -->
      <div class="allfiltercontainer">
         <div class="tagsfiltercontainer">
            <div class="container">
               <div class="select-btn">
                  <span class="btn-text">Filter by Category</span>
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
               <input class="deadlineinputs" type="date" name="end_deadline" class="form-control" value={{request('end_deadline', '')}}>
            </div>
         </div>
      </div>
   </form>
</div>
<main>

   <div class="scholarships">
      <p class="numScholarships">{{$totalScholarships}} scholarships</p>
      <div class="scholarship-list">
      @forelse($scholarships as $scholarship)
      <article class="articlescholarships">
         <a href="/scholarships/{{$scholarship->id }}">
            <div class="cell">
               <h1 class="scholarships-h1">
                     {{ $scholarship->name }}
               </h1>

               <div class="scholarship-icons">
                  <div class="iconandinfo">
                     <span class="material-symbols-outlined">
                        event
                     </span>
                     <span class="scholarshiplistinfo1">{{$scholarship->deadline}}</span>
                  </div>

                  <div class="iconandinfo2">
                     <span class="material-symbols-outlined">
                        attach_money
                     </span>
                     <span class="scholarshiplistinfo">{{$scholarship->amount}}</span>
                  </div>
               </div>

               <div>
                  @foreach ($scholarship->tags as $tag)
                  <button class="pill" type="button">
                     <span class="tagname">{{$tag->name}}</span>
                  </button>
                  @endforeach
               </div>

               <br>

               <span class="btn2">
                  Learn More
               <span>
            </div>
         </a>
      </article>


      @empty
      <div class="empty">No scholarships found.</div>
      @endforelse
      </div>
   </div>
   <div class="pagination">
   {{$scholarships->links()}}
   </div>
   <!-- Javascript for tags filter-->
   <script src="{{ asset('script.js') }}"></script>
</main>
@endSection