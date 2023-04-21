<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Full page editing with Document Properties plugin</title>
{{--    <script src="https://cdn.ckeditor.com/4.21.0/standard-all/ckeditor.js"></script>--}}
    <script src="{{ asset('plugins/ckeditor.js') }}"></script>
</head>

<body>
  <textarea cols="80" id="editor1" name="editor1" rows="10"></textarea>
  <script>
      CKEDITOR.replace('editor1', {
          fullPage: true,
          extraPlugins: 'docprops',
          // Disable content filtering because if you use full page mode, you probably
          // want to  freely enter any HTML content in source mode without any limitations.
          allowedContent: true,
          height: 320,
          removeButtons: 'PasteFromWord'
      });
  </script>
</body>

</html>
