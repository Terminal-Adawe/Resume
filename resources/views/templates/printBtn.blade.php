<div class="row_ mb-4">
      <form action="/print-sheet" method="POST" class="mx-auto">
        @csrf
        <input type="hidden" name="template" value="{{ $data['properties']->template }}">
        <button class="btn btn-danger" type="submit">Print</button>
      </form>
    </div>