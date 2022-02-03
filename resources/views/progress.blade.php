<div class="container" style="margin-top: 60px;">
    <div class="row">
      <div class="bar-space mx-auto">

        @foreach($data['progressPages'] as $page)
        <div class="dash">
          <div class="dash-b {{ $data['page'] == $page->name ? 'dash-a' : '' }}">
          </div>
        </div>
        <div class="checkpoint">
          <div class="checkpoint-b {{ $data['page'] == $page->name ? 'checkpoint-a' : '' }}">
            {{ $page->name }}
          </div>
        </div>
        <div class="dash">
          <div class="dash-b {{ $data['page'] == $page->name ? 'dash-a' : '' }}">
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
