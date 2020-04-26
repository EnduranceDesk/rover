{{-- @if(isset($dispatchables)) --}}
<li role="presentation" class="dropdown">
  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-shopping-cart"></i>
    <span class="badge bg-green">{{\App\Models\Dispatchable::where("user_id", Auth::user()->id)->count()}}</span>
  </a>
  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
    
    @foreach(\App\Models\Dispatchable::where("user_id", Auth::user()->id)->get() as $dispatchable)

      @if($dispatchable->dispatchable instanceof  \App\Models\Order)
        @include("layouts.partials.partials.dispatchables.small_strip_order", ['order' => $dispatchable->dispatchable])
      @endif
    @endforeach
    
    <li>
      <div class="text-center">
        <a href="{{ route("dispatch.all") }}">
          <strong>See All Entities</strong>
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </li>
  </ul>
</li>
{{-- @endif --}}