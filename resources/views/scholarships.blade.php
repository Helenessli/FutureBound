@extends('layout.app')
@section('section')
<main>
   <!-- display the search bar -->
   <form action="{{ route('scholarships') }}" method="GET">

      <!-- Search box -->
      <div class="boxContainer">
         <table class="elementsContainer">
            <tr>
               <td class="td1">
                  <input type="text" name="search" placeholder="Search Scholarships" value="{{ request()->query('search') }}">
               </td>
               <td class="td2">
                  <div class="material-icons">
                     search
                  </div>
               </td>
            </tr>
         </table>
      </div>


      <!-- Tags  filter -->
      <div class="container">
         <div class="select-btn">
            <span class="btn-text">Filter by Tag</span>
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

      <!-- deadline filter-->
      <div>
         <label>Start Deadline:</label>
         <input type="date" name="start_deadline" class="form-control" value={{request('start_deadline', '')}}>
      </div>

      <div>
         <label>End Deadline:</label>
         <input type="date" name="end_deadline" class="form-control">
      </div>

      <div>
         <button type="submit" class="btn btn-primary">Filter By Deadline</button>
      </div>
   </form>

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