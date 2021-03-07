<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="float-left mb-5">
            <nav class="text-black font-bold my-3" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('search') }}?q={{ request()->q }}">{{ request()->q }} arama sonuçları listeleniyor.</a>
                    </li>
                </ol>
            </nav>
        </div>
        <livewire:document.show :documents="$searchResults" />
    </div>
</div>

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>
<script>
$(function() {
    var arrClasses = [];
    $("div[class*='document-item-']").each(function() {
        var className = this.className.match(/(?<=document-item-).*/);
        
        if (className) {
            arrClasses.push(className[0]);
        }
    });

    arrClasses.forEach(element => {
        $.contextMenu({
            selector: `.document-item-${element}`,
            build: function($triggerElement, e) {
                return {
                    callback: function() {

                    },
                    items: $.contextMenu.fromMenu(`#html5menu-${element}`)
                }
            }
        });
    });
});

let deleteFiles = (id, title, csrfToken) => {
        if (confirm(`${title} dokümanı silinecektir. Onaylıyor musunuz?`)) {
            $.ajax(`http://127.0.0.1:8000/document/${id}/delete`, {
            type: 'GET',
            data: {
                '_token': csrfToken
            },
            success: function(data, status, xhr) {
                console.log('status: ' + status + ', data: ' + data);
                window.location.reload(true);
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
            }
        })
        }
    }
</script>
@endsection