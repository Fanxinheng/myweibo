<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <script src="/homes/imageInput/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="/homes/imageInput/js/ssi-uploader.js"></script>
    <script src="/homes/layer/layer.js"></script>
    <link rel="stylesheet" type="text/css" href="/homes/imageInput/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/homes/imageInput/css/style.css">
    <link rel="stylesheet" href="/homes/imageInput/css/ssi-uploader.css"/>
</head>
<body>

<input type="file" name="pic" multiple id="ssi-upload7"/>

<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
        var imgNum=0;
        $('#ssi-upload7').ssi_uploader({

            //图片上传URL
            url: '/home/blog/pics',
            onUpload: function () {
               /*ssi_modal.notify('info', $.extend({}, notifyOptions, {
                   title: 'onUpload',
                   icon: false,
                   position: 'top center'
               }));*/

                //图片全部上传成功后判断是否继续
                layer.confirm('图片上传成功，是否需要继续上传？', {
                    btn: ['取消','继续'] //按钮
                }, function(){
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
                }, function(){
                    
                });

            },
            onEachUpload: function (fileInfo,xhr) {
                imgNum++;

                //循环把图片地址插入隐藏的文本框中
                var jsonData = $('#pic22', parent.document).val();

                $('#pic22', parent.document).val('');

                $('#pic22', parent.document).val(jsonData+xhr+'##');

               /*ssi_modal.notify('error', $.extend({}, notifyOptions, {
                   classSize: 'auto',
                   title: 'onEachUpload',
                   position: 'bottom center',
                   content: 'Status: ' + fileInfo.uploadStatus +
                   '<br>Response: ' + fileInfo.responseMsg +
                   '<br>name: ' + fileInfo.name +
                   '<br>size: ' + fileInfo.size +
                   '<br>type: ' + fileInfo.type
               }));*/
            }

        });
    });


</script>
</body>
</html>