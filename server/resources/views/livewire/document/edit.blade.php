<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <livewire:breadcrumb :folderId="$folderId" :documentId="$document->id" />

        <div class="w-full float-left">
            <div class="row">
                <div class="document-editor__toolbar shadow rounded mb-5"></div>
            </div>
            <div class="row row-editor shadow" style="max-height: 68vh">
                <div class="editor">
                    {{ $document->content }}
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<style>
    h1,h2,h3,h4{font-weight:600;margin-bottom:10px}
    h1 {
        font-size: 24px;
    }
    h2 {
        font-size: 22px;
    }
    h3 {
        font-size: 20px;
    }
    h4 {
        font-size: 18px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
    var connection_string = `?joining_key={{$joining_key}}&doc={{$document->id}}&uid={{auth()->user()->id}}`
    var socket = io("http://localhost:3000/" + connection_string);
    var editor = watchdog.editor;

    socket.on("message", function(data) {
        editor.setData(data)
    });

    editor.editing.view.document.on("keyup", (evt, data) => {
        socket.emit("message", editor.getData());
        socket.emit("cursor position", {position: editor.model.document.selection.getFirstPosition().path, user: "{{auth()->user()->name}}"})
    });

    socket.on("cursor position", function(data) {

    });
</script>
@endsection
