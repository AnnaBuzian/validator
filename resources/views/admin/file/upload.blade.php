@extends('admin.layouts.admin')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
    <link href="{{ mix('css/fileUpload.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="text-center col-">
        <form id="upload" action="{{route('file.upload')}}" enctype="multipart/form-data" method="POST" class="form-horizontal col-md-8 col-md-offset-2">
            <div class="form-row">

                <div class="form-group row">
                    <label for="category" class="col-sm-4 col-form-label">{{trans('admin.email')}}</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">{{trans('admin.selectAnswer')}}</label>
                    <div class="col-sm-8">
                        <div class="form-check text-left">
                            @foreach($answers as $answer)
                                <div class="checkbox-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$answer->id}}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{$answer->answer}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group row pull-left" >
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="file" name="image" />
                    </div>
                </div>

                {{ csrf_field() }}

                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">{{trans('admin.save')}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ mix('js/fileUpload.js') }}"></script>

    <script>
        var upload = (function () {
            var onReady = function() {
                $('#upload').fileupload({

                // This function is called when a file is added to the queue
                add: function (e, data) {
                    //This area will contain file list and progress information.
                    var tpl = $('<li class="working">'+
                        '<input type="text" value="0" data-width="48" data-height="48" data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" />'+
                        '<p></p><span></span></li>' );

                    // Append the file name and file size
                    tpl.find('p').text(data.files[0].name)
                        .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

                    // Add the HTML to the UL element
                    data.context = tpl.appendTo(ul);

                    // Initialize the knob plugin. This part can be ignored, if you are showing progress in some other way.
                    tpl.find('input').knob();

                    // Listen for clicks on the cancel icon
                    tpl.find('span').click(function(){
                        if(tpl.hasClass('working')){
                            jqXHR.abort();
                        }
                        tpl.fadeOut(function(){
                            tpl.remove();
                        });
                    });

                    // Automatically upload the file once it is added to the queue
                    var jqXHR = data.submit();
                },
                progress: function(e, data){

                    // Calculate the completion percentage of the upload
                    var progress = parseInt(data.loaded / data.total * 100, 10);

                    // Update the hidden input field and trigger a change
                    // so that the jQuery knob plugin knows to update the dial
                    data.context.find('input').val(progress).change();

                    if(progress == 100){
                        data.context.removeClass('working');
                    }
                },

            return {
                onReady: onReady
            }
        })();

        $(document).ready(upload.init);

        //Helper function for calculation of progress
        function formatFileSize(bytes) {
            if (typeof bytes !== 'number') {
                return '';
            }

            if (bytes >= 1000000000) {
                return (bytes / 1000000000).toFixed(2) + ' GB';
            }

            if (bytes >= 1000000) {
                return (bytes / 1000000).toFixed(2) + ' MB';
            }
            return (bytes / 1000).toFixed(2) + ' KB';
        }
    </script>
@endsection