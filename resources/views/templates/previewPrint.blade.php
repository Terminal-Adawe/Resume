<div class="row my-4">
      <form action="{{ url('/previewresume') }}" method="get" class="mx-auto">
        @csrf
        <input type="hidden" value="0" id="hiddencheck" name='hiddencheck'>
        <input type="hidden" name="template" value="{{ $data['templateproperties']->template_name }}">
        <input type="hidden" name="templateid" value="{{ $data['templateproperties']->template_id }}">
        <input type="hidden" name="themeColor" class="theme-color-form" value="$data['properties']->color1">
        <button class="btn btn-info" type="submit">Preview and Print</button>
      </form>
      
    </div>